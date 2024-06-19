<?php

namespace App\Controllers;
use CodeIgniter\HTTP\Exceptions\HTTPException;
use App\Models\UserLikeLogsModel;
use App\Models\UsersModel;
use App\Models\CategoryModel;
use App\Models\NewsModel;
use App\Models\LikeModel;
use App\Models\CommentModel;
use App\Models\RatingModel;
use Dompdf\Dompdf;

class UserController extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }
    public function new_design()
    {
        return view('news_design');
    }
    // In your controller file (e.g., News.php)
    public function news_read($news_id)
    {
        $newsModel = new NewsModel();
        $likesModel = new LikeModel();
        $categoryModel = new CategoryModel();
        $commentModel = new CommentModel();
        $newsRatingModel = new RatingModel();

        // Fetch article details by news_id
        $article = $newsModel->find($news_id);

        // Fetch category name using the category_id
        $category = $categoryModel->find($article['category_id']);
        $category_name = $category ? $category['category_name'] : '';

        // Fetch latest three news articles
        $latestNews = $newsModel->orderBy('publication_date', 'DESC')->findAll(3);

        // Fetch most liked posts
        $mostLikedPosts = $newsModel->select('title, images')
                                    ->join('likes', 'likes.news_id = news.news_id')
                                    ->where('likes.likes_count > likes.dislikes_count') // Filter out dislikes
                                    ->orderBy('likes.likes_count', 'DESC')
                                    ->findAll(3);

        // Fetch comments
        $comments = $commentModel->where('news_id', $news_id)
                                ->where('comment_status', 'approved')
                                ->findAll();

        // Fetch all categories
        $categories = $categoryModel->findAll();

        // Fetch the average rating
        $averageRating = $newsRatingModel->where('news_id', $news_id)->selectAvg('rating')->first();

        // Fetch the count of each rating
        $ratingCounts = [];
        for ($i = 1; $i <= 5; $i++) {
            $ratingCounts[$i] = $newsRatingModel->where('news_id', $news_id)->where('rating', $i)->countAllResults();
        }

        // Assume you have a way to get the logged-in user's ID, here it is just a placeholder
        $user_id = 1; // Replace with actual user ID retrieval logic

        // Pass data to view
        $data = [
            'article' => $article,
            'category_name' => $category_name,
            'latestNews' => $latestNews,
            'mostLikedPosts' => $mostLikedPosts,
            'comments' => $comments,
            'categories' => $categories,
            'news_id' => $news_id,
            'user_id' => $user_id,
            'average_rating' => $averageRating['rating'],
            'rating_counts' => $ratingCounts
        ];

        return view('UserPage/news_read', $data);
    }
    public function home()
    {
        try {
            // Load the news model
            $newsModel = new NewsModel();
            $userLikeLogsModel = new UserLikeLogsModel();
    
            // Fetch only approved news articles with a limit of 10
            $approvedNews = $newsModel->select('
                news.news_id,
                news.title,
                news.content,
                news.images,
                likes.like_id,
                likes.likes_count,
                likes.dislikes_count
            ')
                ->join('likes', 'likes.news_id = news.news_id')
                ->where('news.news_status', 'Approved')
                ->where(['news.archived' => 0])
                ->orderBy('news.publication_date', 'DESC') // Order by publication date to get the latest news first
                ->limit(11)
                ->findAll();
    
            // Check if the count of approved news is already at the maximum limit
            $newsCount = count($approvedNews);
            if ($newsCount > 10) {
                // Archive the oldest news article
                $oldestNews = $approvedNews[$newsCount - 1]; // Get the last news article
                $newsModel->update($oldestNews['news_id'], ['archived' => 1]); // Archive the oldest news
            }
    
            $userId = session()->get('user_id');
            if (isset($userId)) {
                foreach ($approvedNews as &$news) {
                    $likeStatus = $userLikeLogsModel->select('action')->where('news_id', $news['news_id'])->first();
    
                    if ($likeStatus) {
                        $news['like_status'] = $likeStatus['action'];
                    } else {
                        $news['like_status'] = '';
                    }
                }
            }
    
            // Load the category model
            $categoryModel = new CategoryModel();
    
            // Fetch all categories
            $categories = $categoryModel->findAll();
    
            // Pass the approved news data and categories to the view
            return view('UserPage/home', ['newsData' => $approvedNews, 'categories' => $categories, 'userId' => $userId]);
        } catch (\Throwable $th) {
            // Handle any errors
            return $this->response->setJSON(['error' => $th->getMessage()]);
        }
    }

    public function about()
    {
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->findAll();

        $data['categories'] = $categories;
        try {
            // Load the users model
            $usersModel = new UsersModel();

            // Fetch all users
            $users = $usersModel->findAll();

            // Filter users with roles "Admin" and "Staff"
            $filteredUsers = array_filter($users, function ($user) {
                return in_array($user['role'], ['Admin', 'Staff']);
            });

            // Load the category model
            $categoryModel = new CategoryModel();
            $categories = $categoryModel->findAll();

            $data['users'] = $filteredUsers; // Use filtered users
            $data['categories'] = $categories;

            return view('UserPage/about', $data);
        } catch (\Throwable $th) {
            // Handle any errors
            return $this->response->setJSON(['error' => $th->getMessage()]);
        }
    }

    public function like($newsId)
{
    try {
        // Check if the user is logged in
        if (!session()->has('user_id')) {
            return redirect()->to(base_url('login'));
        }

        // Get POST data
        $likeId = $this->request->getPost('likeId');
        $likeCount = $this->request->getPost('likeCount');
        $dislikeCount = $this->request->getPost('dislikeCount');
        $action = $this->request->getPost('action');

        // Get the user ID from the session
        $userId = session()->get('user_id');

        // Load models
        $likeModel = new LikeModel();
        $userLikeLogsModel = new UserLikeLogsModel();

        // Check if the user has already liked/disliked the news
        $existingLike = $userLikeLogsModel->where('news_id', $newsId)->where('user_id', $userId)->first();

        // Update or insert user like/dislike log
        if ($existingLike) {
            $existingLike['action'] = $action;
            $userLikeLogsModel->update($existingLike['id'], $existingLike);
        } else {
            $userLikeLogsModel->insert([
                'news_id' => $newsId,
                'user_id' => $userId,
                'action' => $action
            ]);
        }

        // Update the like/dislike counts in the news
        $likeModel->update($likeId, [
            'likes_count' => $likeCount,
            'dislikes_count' => $dislikeCount
        ]);

        return json_encode(['result' => true]);
    } catch (\Throwable $th) {
        return $th->getMessage();
    }
}

    public function filterNews($categoryName = null)
    {
        try {
            // Load the news model
            $newsModel = new NewsModel();

            // If no specific category is selected, fetch all approved news articles
            if ($categoryName === null || $categoryName === 'all') {
                $newsData = $newsModel->where(['archived' => 0, 'news_status' => 'Approved'])->findAll();
            } else {
                // Fetch approved news articles filtered by the selected category name
                $newsData = $newsModel->select('news.*, images')
                    ->join('category', 'category.category_id = news.category_id')
                    ->where('category.category_name', $categoryName)
                    ->where(['archived' => 0, 'news_status' => 'Approved'])
                    ->findAll();
            }

            // Decode the JSON string in the images column
            foreach ($newsData as &$article) {
                $article['images'] = json_decode($article['images'], true);
            }

            // Pass the news data to the view
            return $this->response->setJSON(['newsData' => $newsData]);
        } catch (\Throwable $th) {
            // Handle any errors
            return $this->response->setJSON(['error' => $th->getMessage()]);
        }
    }

    public function contact()
    {
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->findAll();

        // Retrieve the automatic reply message from the database or any other source
        $autoReplyMessage = "Thank you for your comments and suggestions. God bless you!";

        $data = [
            'categories' => $categories,
            'autoReplyMessage' => $autoReplyMessage,
        ];

        return view('UserPage/contact', $data);
    }

    public function news($news_id)
    {
        // Assuming $news_id is passed as a parameter to the method
    
        $newsModel = new NewsModel();
    
        // Fetch article details by news_id
        $article = $newsModel->find($news_id);
    
        if (!$article) {
            // Handle case where article with given ID is not found
            // For example, redirect to an error page or show a 404 error
            return redirect()->to('error_page'); // Example
        }
    
        // Fetch category name using the category_id
        $categoryModel = new CategoryModel();
        $category = $categoryModel->find($article['category_id']);
        $category_name = $category ? $category['category_name'] : '';
    
        // Pass data to view
        $data = [
            'article' => $article,
            'category_name' => $category_name,
        ];
    
        // Fetch comments with status 'approved'
        $commentModel = new CommentModel();
        $data['comments'] = $commentModel->where('news_id', $news_id)
            ->where('comment_status', 'approved')
            ->findAll();
    
        return view('UserPage/news', $data);
    }    

    public function searchNews()
    {
        // Get the search query from the request
        $searchQuery = $this->request->getPost('searchQuery');

        try {
            // Load the news model
            $newsModel = new NewsModel();

            // Perform the search based on the title or content columns
            $searchResults = $newsModel->like('title', 'publication_date', $searchQuery)
                ->orLike('content', $searchQuery)
                ->findAll();

            // Pass the search results to the view
            return view('UserPage/search_results', ['searchResults' => $searchResults]);
        } catch (\Throwable $th) {
            // Handle any errors
            return $this->response->setJSON(['error' => $th->getMessage()]);
        }
    }

    public function submitRating()
{
    $newsRatingModel = new RatingModel();

    try {
        $news_id = $this->request->getPost('news_id');
        $user_id = $this->request->getPost('user_id');
        $rating = $this->request->getPost('rating');

        log_message('debug', 'Received data: news_id=' . $news_id . ', user_id=' . $user_id . ', rating=' . $rating);

        if (is_null($news_id) || is_null($user_id) || is_null($rating)) {
            return $this->response->setJSON(['error' => 'Invalid input data.'])->setStatusCode(400);
        }

        $existingRating = $newsRatingModel->where('news_id', $news_id)->where('user_id', $user_id)->first();

        if ($existingRating) {
            $newsRatingModel->update($existingRating['rate_id'], ['rating' => $rating]);
            log_message('debug', 'Updated existing rating: rate_id=' . $existingRating['rate_id']);
        } else {
            $newsRatingModel->insert([
                'news_id' => $news_id,
                'user_id' => $user_id,
                'rating' => $rating
            ]);
            log_message('debug', 'Inserted new rating');
        }

        $averageRating = $newsRatingModel->where('news_id', $news_id)->selectAvg('rating')->first();
        log_message('debug', 'Calculated average rating: ' . $averageRating['rating']);

        return $this->response->setJSON(['average_rating' => $averageRating['rating']]);
    } catch (\Exception $e) {
        log_message('error', 'Error in submitRating: ' . $e->getMessage());
        return $this->response->setJSON(['error' => 'An error occurred while processing your request.'])->setStatusCode(500);
    }
}

    public function generatePdf($id)
    {
        // Load the news article data from the NewsModel
        $newsModel = new NewsModel();
        $article = $newsModel->find($id);

        if (!$article) {
            return redirect()->back()->with('error', 'News article not found.');
        }

        // Pass the article data to the view
        $data['article'] = $article;

        // Load the HTML content from the news_design.php file and pass data to it
        $html = view('UserPage/news_design', $data);

        // Remove unwanted content (empty paragraphs and images) from the HTML
        $html = preg_replace('/<p><br><\/p>|<p><img[^>]+><br><\/p>/', '', $html);

        // Generate the PDF
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF (stream or save to file)
        $output = $dompdf->output();

        // Return the PDF content
        return $output;
    }

    public function fetch_news()
{
    try {
        $newsId = $this->request->getPost('news_id');

        // Validate news_id
        if (!is_numeric($newsId)) {
            throw new HTTPException('Invalid news ID', 400);
        }

        // Load the news model
        $newsModel = new NewsModel();
        
        // Fetch the news article based on the news_id
        $article = $newsModel->find($newsId);

        // Check if article is null
        if ($article === null) {
            throw new HTTPException('Article not found', 404);
        }

        // Extract article data
        $title = $article['title'];
        $author = $article['author'];
        $publication_date = $article['publication_date'];
        $content = $article['content'];
        $images = json_decode($article['images'], true); // Assuming images are stored as JSON array

        // Load the template and replace placeholders
        ob_start();
        include APPPATH . 'Views/UserPage/news_preview.php';
        $htmlContent = ob_get_clean();

        // Return the HTML content as a JSON response
        return $this->response->setJSON(['status' => 'success', 'html' => $htmlContent]);
    } catch (HTTPException $e) {
        // Log the error
        log_message('error', 'Error fetching news article: ' . $e->getMessage());

        // Return a JSON response indicating the error
        return $this->response->setJSON(['status' => 'error', 'error' => $e->getMessage()])->setStatusCode($e->getCode());
    }
}



}
