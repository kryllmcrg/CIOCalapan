<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LikeModel;
use App\Models\UsersModel;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\NewsModel;
use App\Models\CommentModel;
use App\Models\CategoryModel;
use App\Models\ContactModel;
use App\Models\UserAuditModel;
use App\Models\RatingModel;
use Dompdf\Dompdf;

class NewsController extends BaseController
{

    public function dashboard()
{
    // Load the UsersModel and NewsModel
    $usersModel = new UsersModel();
    $newsModel = new NewsModel();

    // Fetch count of users with role 'User'
    $userCount = $usersModel->where('role', 'User')->countAllResults();

    // Fetch count of users with role 'Staff'
    $staffCount = $usersModel->where('role', 'Staff')->countAllResults();

    // Fetch count of news by Admin
    $newsByAdmin = $newsModel->where('created_by_role', 'Admin')->countAllResults();

    // Fetch count of news by Staff
    $newsByStaff = $newsModel->where('created_by_role', 'Staff')->countAllResults();

    // Pass the counts to the view
    return view('dashboard', [
        'userCount' => $userCount,
        'staffCount' => $staffCount,
        'newsByAdmin' => $newsByAdmin,
        'newsByStaff' => $newsByStaff
    ]);
}
    public function viewnews($id)
    {
        $newsModel = new NewsModel();

        $news = $newsModel->find($id);

        return view('AdminPage/viewnews');
    }
    
    public function editnews($id)
    {
        $newsModel = new NewsModel();
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->findAll();

        $news = $newsModel->find($id);

        return view('AdminPage/editnews', ['categories' => $categories, 'news' => $news]);
    }

    public function updateNews()
    {
        // Retrieve the submitted form data
        $newsId = $this->request->getPost('news_id');
        $title = $this->request->getPost('title');
        $author = $this->request->getPost('author');
        $categoryId = $this->request->getPost('category_id');
        $content = $this->request->getPost('content');
        $remarks = $this->request->getPost('remarks');

        // Load the NewsModel
        $newsModel = new NewsModel();

        // Check if the news with the given ID exists
        $news = $newsModel->find($newsId);
        if (!$news) {
            return "News not found"; // Handle error appropriately
        }

        // Check if the provided category ID exists
        $categoryModel = new CategoryModel();
        $category = $categoryModel->find($categoryId);
        if (!$category) {
            return "Category not found"; // Handle error appropriately
        }

        // Update the news data
        $data = [
            'title' => $title,
            'author' => $author,
            'category_id' => $categoryId,
            'content' => $content,
            'remarks' => $remarks,
        ];

        $userAudit = new UserAuditModel();
        $users = new UsersModel();
        $staffId = session()->get('staff_id');

        $user = $users->select('user_id')->where(['staff_id' => $staffId])->first();

        // Perform the update operation
        $updated = $newsModel->update($newsId, $data);
        $userAuditRes = $userAudit->addUserAuditLog($user['user_id'], $newsId, 'Edit', "Edit $title News", $remarks);

        // Check if the update was successful
        if ($updated) {
            // Redirect back to the editnews page with the news ID
            return redirect()->to("/editNews/$newsId");
        } else {
            return "Failed to update news"; // Handle error appropriately
        }
    }
    public function addnews()
    {
        $categories = new CategoryModel();

        $data = [
            'categories' => $categories->select('category_id,category_name')->findAll(),
        ];

        return view('AdminPage/addnews', $data);
    }

    public function addNewsSubmit()
    {
        try {
            $userAudit = new UserAuditModel();
            $newsModel = new NewsModel();
            $users = new UsersModel(); // Instantiate the UsersModel
    
            $title = $this->request->getPost('title');
            $content = $this->request->getPost('content');
            $category_id = $this->request->getPost('category_id');
            $author = $this->request->getPost('author');
            $staffId = session()->get('staff_id');
            $uploadedImages = [];
            if ($this->request->getFiles('files')) {
                $images = $this->request->getFiles('files');
                foreach ($images as $file) {
                    foreach ($file as $uploadedFile) {
                        if ($uploadedFile->isValid() && !$uploadedFile->hasMoved()) {
                            $newName = $uploadedFile->getRandomName();
                            $uploadedFile->move('./uploads/', $newName);
                            $imageUrl = base_url('uploads/' . $newName);
                            $uploadedImages[] = $imageUrl;
                        } else {
                            $uploadedImages[] = ['error' => 'Invalid file'];
                        }
                    }
                }
            }
            // Save data to the database
            $data = [
                'title' => $title,
                'content' => $content,
                'category_id' => $category_id,
                'author' => $author,
                'images' => json_encode($uploadedImages),
                'staff_id' => $staffId,
                'news_status' => 'Pending',
                'publication_status' => 'Draft'
            ];

            $uploadedVideo = [];
            if ($this->request->getFile('video')) {
                // The file has been uploaded and can be accessed here
                $videoFile = $this->request->getFile('video');
                if ($videoFile->isValid() && !$videoFile->hasMoved()) {
                    $newName = $videoFile->getRandomName();
                    $videoFile->move('./uploads/', $newName);
                    $videoUrl = base_url('uploads/' . $newName);
                    $uploadedVideo[] = $videoUrl;
                } else {
                    $uploadedVideo[] = ['error' => 'Invalid file'];
                }
                // Perform operations with the uploaded file
                // For example, you can check the file type, size, or move the file to a desired location
                $data['videos'] = json_encode($uploadedVideo);
            }

            // Validate data
            if (empty($title) || empty($content) || empty($category_id) || empty($author) || empty($uploadedImages)) {
                return $this->response->setStatusCode(400)->setJSON(["error" => "Error: Required data is missing.", "data" => $data]);
            }

            $result = $newsModel->insert($data);
    
            // Log the action
            $user = $users->select('user_id')->where(['staff_id' => $staffId])->first();
            $userAuditRes = $userAudit->addUserAuditLog($user['user_id'], $result, 'Add', "Add $title News", '');
    
            // Send response indicating success
            return $this->response->setJSON(["success" => true, "message" => "News successfully added"]);
        } catch (\Throwable $th) {
            // Handle errors
            return $this->response->setStatusCode(500)->setJSON(['error' => $th->getMessage()]);
        }
    }
    

    public function __construct()
    {
        $this->NewsModel = new NewsModel();
    }

    public function deleteNews($id)
{
    try {
        $userAudit = new UserAuditModel();
        $users = new UsersModel();
        
        $newsModel = new NewsModel();
        $likeModel = new LikeModel();

        // Begin a transaction
        $db = db_connect();
        $db->transStart();

        // Check if there are related records in the 'likes' table
        $relatedLikes = $likeModel->where('news_id', $id)->findAll();

        // Delete related records from the 'likes' table
        foreach ($relatedLikes as $like) {
            $likeModel->delete($like['like_id']);
        }

        // Update the 'archived' column of the news item to indicate it is archived
        $updated = $newsModel->where('news_id', $id)->set(['archived' => 1])->update();

        // Commit the transaction
        $db->transCommit();

        if ($updated) {
            // Return success message if update was successful
            return redirect()->to('managenews')->with('success', 'News item archived successfully.');
        } else {
            // Return error message if update failed
            return redirect()->to('managenews')->with('error', 'Failed to archive the news item.');
        }
        
    } catch (\Throwable $th) {
        // Rollback the transaction if an error occurred
        $db->transRollback();

        // Return error message if an exception occurred during the update
        return redirect()->to('managenews')->with('error', 'An error occurred during deletion: ' . $th->getMessage());
    }
}
    public function managenews()
    {
        try {
            // Load the NewsModel
            $newsModel = new NewsModel();

            // Fetch news data from the database, limiting to 10 items and excluding archived ones
            $data['newsData'] = $newsModel->where(['archived' => 0])->orderBy('publication_date', 'DESC')->limit(10)->findAll();

            // Load the view file and pass the news data to it
            return view('AdminPage/managenews', $data); // Pass the $data array to the view
        } catch (\Throwable $th) {
            // Handle any errors
            return $this->response->setJSON(['error' => $th->getMessage()]);
        }
    }
    public function changeNewStatus()
    {
        try {
            // Set the default time zone to Philippines time
            date_default_timezone_set('Asia/Manila');

            $newsID = $this->request->getVar('news_id');
            $newsStatus = $this->request->getVar('news_status');

            // Prepare data to update news status
            $data = [
                'news_status' => $newsStatus
            ];

            // Update news status in the database
            $model = new NewsModel();
            $model->where('news_id', $newsID)->set($data)->update();

            // Update publication status based on news status
            $publicationStatus = '';

            switch ($newsStatus) {
                case 'Approved':
                    $publicationStatus = 'Published';
                    // Update publication date and time to current date and time if the news is approved and published
                    $currentDateTime = date('Y-m-d H:i:s');
                    $data['date_approved'] = $currentDateTime;
                    $data['publication_date'] = $currentDateTime;
                    $this->insertNewsLikesRecord($newsID);
                    break;
                case 'Decline':
                    $publicationStatus = 'Unpublished';
                    break;
                case 'Reject':
                    $publicationStatus = 'Draft';
                    break;
                default:
                    break;
            }

            // If publication status is determined, update the publication status in the database
            if ($publicationStatus !== '') {
                $data['publication_status'] = $publicationStatus;
                $model->where('news_id', $newsID)->set($data)->update();
            }

            return $this->response->setJSON(['success' => true, 'message' => 'Status updated successfully.']);
        } catch (\Throwable $th) {
            return $this->response->setJSON(['success' => false, 'message' => 'Error: ' . $th->getMessage()]);
        }
    }

    public function insertNewsLikesRecord($newsID)
    {
        $model = new LikeModel();

        $newsLikeExist = $model->where('news_id', $newsID)->first();
        if (!$newsLikeExist) {
            $data = [
                'news_id' => $newsID
            ];
            return $model->insert($data);
        }
        return null;
    }

    public function changePubStatus()
    {
        try {
            // Set the default time zone to Philippines time
            date_default_timezone_set('Asia/Manila');

            $newsID = $this->request->getVar('news_id');
            $publicationStatus = $this->request->getVar('publication_status'); // Get publication_status from request

            $data = [];
            if ($publicationStatus !== null) {
                $data['publication_status'] = $publicationStatus;
                if ($publicationStatus === 'Published') {
                    // Update publication date and time to current date and time if publication status is "Published"
                    $data['publication_date'] = date('Y-m-d H:i:s');
                }
            }

            if (empty($data)) {
                throw new \Exception('No status to update.');
            }

            $model = new NewsModel();
            $model->where('news_id', $newsID)->set($data)->update();

            return $this->response->setJSON(['success' => true, 'message' => 'Publication status updated successfully.']);
        } catch (\Throwable $th) {
            return $this->response->setJSON(['success' => false, 'message' => 'Error: ' . $th->getMessage()]);
        }
    }
    public function archive()
    {
        // Load the NewsModel
        $newsModel = new NewsModel();

        // Fetch news data from the database including only the specified columns
        $newsData = $newsModel->select('title, author,created_at, updated_at, publication_date, news_id')->where(['archived' => 1])->findAll();

        // Pass the data to the view
        return view('AdminPage/archive', ['newsData' => $newsData]);
    }

    public function restoreNews($id)
    {
        try {
            $newsModel = new NewsModel();

            // Update the 'archived' column of the news item to indicate it is no longer archived
            $updated = $newsModel->where('news_id', $id)->set('archived', 0)->update();
            
            if ($updated) {
                // Return success message if update was successful
                return redirect()->to('managenews')->with('success', 'News item restored successfully.');
            } else {
                // Return error message if update failed
                return redirect()->to('managenews')->with('error', 'Failed to restore the news item.');
            }
        } catch (\Throwable $th) {
            // Return error message if an exception occurred during the update
            return redirect()->to('managenews')->with('error', 'An error occurred during restoration.');
        }
    }

    public function newsDelete($id)
    {
        try {
            $newsModel = new NewsModel();

            // Delete the news item from the database
            $deleted = $newsModel->delete($id);

            if ($deleted) {
                // Return success message if deletion was successful
                return redirect()->to('archive')->with('success', 'News item deleted successfully.');
            } else {
                // Return error message if deletion failed
                return redirect()->to('archive')->with('error', 'Failed to delete the news item.');
            }
        } catch (\Throwable $th) {
            // Return error message if an exception occurred during deletion
            return redirect()->to('managearchive')->with('error', 'An error occurred during deletion.');
        }
    }

    public function submitContactForm()
    {
        $contactModel = new ContactModel();

        // Validate form input
        $validationRules = [
            'name' => 'required',
            'email' => 'required|valid_email',
            'subject' => 'required',
            'message' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            // Validation failed
            return redirect()->back()->withInput()->with('validationErrors', $this->validator->getErrors());
        }

        // Form data is valid, proceed with insertion
        $formData = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'subject' => $this->request->getPost('subject'),
            'message' => $this->request->getPost('message'),
        ];

        // Insert data into the database
        if ($contactModel->insert($formData)) {
            // Contact form submission successful
            // Retrieve the inserted contact's ID
            $contactId = $contactModel->getInsertID();

            // Define the automatic reply message
            $autoReplyMessage = "Thank you for your comments and suggestions. God bless you!";

            // Update the admin_reply field in the database for the inserted contact
            $contactModel->update($contactId, ['admin_reply' => $autoReplyMessage]);

            // You can add additional logic here, such as sending an email notification to the admin
            // Redirect with success message
            return redirect()->to('/contact?success=true')->with('success', 'Your message has been sent successfully.');
        } else {
            // Contact form submission failed
            // Handle the error accordingly
            // For example, you can display an error message and redirect the user back to the contact form
            return redirect()->back()->with('error', 'Failed to submit the contact form. Please try again.');
        }
    }

    public function newsAudit()
{
    // Load the UserAuditModel
    $userAuditModel = new UserAuditModel();

    // Fetch audit trail data from the database
    $auditTrailData = $userAuditModel->paginate(10); // Adjust the number of items per page as needed

    // Pass the audit trail data and pager to the view
    $data['auditTrailData'] = $auditTrailData;
    $data['pager'] = $userAuditModel->pager;

    // Load the view file and pass the data to it
    return view('AdminPage/NewsAudit', $data);
}



    public function genreport()
{
    $month = $this->request->getGet('month');
    $orientation = $this->request->getGet('orientation');

    if ($month && $orientation) {
        // Increase the maximum execution time
        set_time_limit(120); // Set to 120 seconds

        // Fetch data based on the selected month
        $newsModel = new NewsModel();
        $newsData = $newsModel->select('title, content, publication_date, author')
                              ->where('MONTH(publication_date)', $month)
                              ->findAll();

        if (empty($newsData)) {
            return redirect()->back()->with('error', 'No news found for the selected month.');
        }

        // Pass the data to the view and generate the PDF
        $data = [
            'newsData' => $newsData,
            'month' => date('F', mktime(0, 0, 0, $month, 1)),
            'orientation' => $orientation
        ];

        // Load the view and convert it to PDF
        $html = view('AdminPage/report_template', $data);
        $this->generatePDF($html, 'Report_' . $data['month'] . '.pdf', $orientation);
    } else {
        return redirect()->back()->with('error', 'Please select a month and orientation.');
    }
}

private function generatePDF($html, $filename, $orientation)
{
    // Load Dompdf library
    $dompdf = new Dompdf();

    // Load HTML content
    $dompdf->loadHtml($html);

    // Set paper size and orientation
    $dompdf->setPaper('A4', $orientation);

    // Render PDF
    $dompdf->render();

    // Output PDF
    $dompdf->stream($filename, ["Attachment" => 0]);
}
}
