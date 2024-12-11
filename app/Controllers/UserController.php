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
use App\Models\TestimonialModel;
use Dompdf\Dompdf;
use Dompdf\Options;

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
        $activePage = 'news_read'; 
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

        foreach ($latestNews as &$lNews) {
            // Assuming the 'image' field is a JSON array
            if (!empty($lNews['images'])) {
                // Decode the JSON array if it's stored as JSON
                $imageArray = json_decode($lNews['images'], true);
        
                // Ensure the decoding was successful and it's an array
                if (is_array($imageArray) && count($imageArray) > 0) {
                    // Set only the first image
                    $lNews['image'] = $imageArray[0];
                } else {
                    // If not an array, handle it as a string (single URL or error)
                    $lNews['image'] = $lNews['image'];
                }
            } else {
                // Set a default image if no image is available
                $lNews['image'] = 'path/to/default-image.jpg';
            }
        }

        // Fetch most liked posts
        $mostLikedPosts = $newsModel->select('title, images')
            ->join('likes', 'likes.news_id = news.news_id')
            ->where('likes.likes_count > likes.dislikes_count')
            ->orderBy('likes.likes_count', 'DESC')
            ->findAll(3);

        foreach ($mostLikedPosts as &$mlPost) {
            // Assuming the 'image' field is a JSON array
            if (!empty($mlPost['images'])) {
                // Decode the JSON array if it's stored as JSON
                $imageArray = json_decode($mlPost['images'], true);

                // Ensure the decoding was successful and it's an array
                if (is_array($imageArray) && count($imageArray) > 0) {
                    // Set only the first image
                    $mlPost['image'] = $imageArray[0];
                } else {
                    // If not an array, handle it as a string (single URL or error)
                    $mlPost['image'] = $mlPost['image'];
                }
            } else {
                // Set a default image if no image is available
                $mlPost['image'] = 'path/to/default-image.jpg';
            }
        }

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
            'rating_counts' => $ratingCounts,
            'activePage' => $activePage
        ];

        return view('UserPage/news_read', $data);
    }
    public function home()
    {
        try {
            $activePage = 'home'; 
            // Load the news model
            $newsModel = new NewsModel();
            $userLikeLogsModel = new UserLikeLogsModel();

            $latestNews = $newsModel->getLatestPublishedNews();
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
                ->limit(7)
                ->findAll();

            // Check if the count of approved news is already at the maximum limit
            $newsCount = count($approvedNews);
            if ($newsCount > 6) {
                // Archive the oldest news article
                $oldestNews = $approvedNews[$newsCount - 1]; // Get the last news article
                $newsModel->update($oldestNews['news_id'], ['archived' => 1]); // Archive the oldest news
            }

            $userId = session()->get('user_id');
            if (isset($userId)) {
                foreach ($approvedNews as &$news) {
                    $likeStatus = $userLikeLogsModel->select('action')->where(['news_id' => $news['news_id'], 'user_id' => $userId])->first();

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
            return view('UserPage/home', ['newsData' => $approvedNews == [] ? null : $approvedNews, 'categories' => $categories, 'userId' => $userId, 'latestNews' => $latestNews, 'activePage' => $activePage]);
            // return $this->response->setJSON(['newsData' => $approvedNews == [] ? null : $approvedNews, 'categories' => $categories, 'userId' => $userId]);
        } catch (\Throwable $th) {
            // Handle any errors
            return $this->response->setJSON(['error' => $th->getMessage()]);
        }
    }

    public function about()
    {
        $activePage = 'about'; 
        $data['activePage'] = $activePage;

        try {
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
            $likeStatus = $this->request->getPost('likeStatus');

            // Get the user ID from the session
            $userId = session()->get('user_id');

            // Load models
            $likeModel = new LikeModel();
            $userLikeLogsModel = new UserLikeLogsModel();

            // Check if the user has already liked/disliked the news
            $existingLike = $userLikeLogsModel->where(['news_id' => $newsId, 'user_id' => $userId])->first();

            // Update or insert user like/dislike log
            if ($existingLike) {
                $existingLike['action'] = isset($likeStatus) ? $likeStatus : '';
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

            return $this->response->setBody(json_encode(['result' => true]));
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
                $newsData = $newsModel->select('
                news.news_id,
                news.title,
                news.content,
                news.images,
                likes.like_id,
                likes.likes_count,
                likes.dislikes_count
            ')
                    ->join('likes', 'likes.news_id = news.news_id')
                    ->where(['archived' => 0, 'news_status' => 'Approved'])
                    ->findAll();
            } else {
                // Fetch approved news articles filtered by the selected category name
                $newsData = $newsModel->select('
                    news.*, 
                    likes.like_id,
                    likes.likes_count,
                    likes.dislikes_count
                ')
                    ->join('likes', 'likes.news_id = news.news_id')
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
        $activePage = 'contact';
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->findAll();

        // Retrieve the automatic reply message from the database or any other source
        $autoReplyMessage = "Thank you for your comments and suggestions. God bless you!";

        $data = [
            'categories' => $categories,
            'autoReplyMessage' => $autoReplyMessage,
            'activePage' => $activePage,
        ];

        return view('UserPage/contact', $data);
    }

    public function searchNews()
    {
        $activePage = 'searchNews'; 
        $newsModel = new NewsModel();
        
        // Get the search query from the request using getGet() instead of getPost()
        $searchQuery = $this->request->getGet('searchQuery');
    
        $latestNews = $newsModel->getLatestPublishedNews();
    
        try {
            // Load the news model
            $newsModel = new NewsModel();
    
            // Perform the search based on the title or content columns
            $searchResults = $newsModel->like('title', $searchQuery)
                ->orLike('content', $searchQuery)
                ->findAll();
    
            // Pass the search results to the view
            return view('UserPage/search_results', [
                'searchResults' => $searchResults, 
                'latestNews' => $latestNews, 
                'activePage' => $activePage
            ]);
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

        // Fetch latest three news articles
        $latestNews = $newsModel->orderBy('publication_date', 'DESC')->findAll(3);

        foreach ($latestNews as &$lNews) {
            // Assuming the 'images' field is a JSON array
            if (!empty($lNews['images'])) {
                // Decode the JSON array if it's stored as JSON
                $imageArray = json_decode($lNews['images'], true);
        
                // Ensure the decoding was successful and it's an array
                if (is_array($imageArray) && count($imageArray) > 0) {
                    // Set only the first image
                    $lNews['image'] = $imageArray[0];
                } else {
                    // If not an array, handle it as a string (single URL or error)
                    $lNews['image'] = $lNews['image'];
                }
            } else {
                // Set a default image if no image is available
                $lNews['image'] = 'path/to/default-image.jpg';
            }
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
public function testimonial()
{
    // Fetch testimonials from the database
    $testimonialModel = new TestimonialModel();
    $testimonials = $testimonialModel->findAll();
    $activePage = 'testimonial';

    // Count sentiment occurrences
    $sentimentCounts = [
        'positive' => 0,
        'neutral' => 0,
        'negative' => 0
    ];

    foreach ($testimonials as $testimonial) {
        if (isset($testimonial['sentiment']) && in_array($testimonial['sentiment'], ['positive', 'neutral', 'negative'])) {
            $sentimentCounts[$testimonial['sentiment']]++;
        } else {
            $sentimentCounts['neutral']++; // Default to 'neutral' for invalid/missing sentiment
        }
    }

    // Calculate the total number of testimonials
    $totalTestimonials = array_sum($sentimentCounts);

    // Calculate percentages for each sentiment
    $sentimentPercentages = [
        'positive' => $totalTestimonials > 0 ? ($sentimentCounts['positive'] / $totalTestimonials) * 100 : 0,
        'neutral' => $totalTestimonials > 0 ? ($sentimentCounts['neutral'] / $totalTestimonials) * 100 : 0,
        'negative' => $totalTestimonials > 0 ? ($sentimentCounts['negative'] / $totalTestimonials) * 100 : 0
    ];

    // Pass data to the view
    return view('UserPage/testimonial', [
        'testimonials' => $testimonials,
        'sentimentCounts' => $sentimentCounts,
        'sentimentPercentages' => $sentimentPercentages,
        'activePage' => $activePage
    ]);
}
    
public function addTestimonial()
{
    if ($this->request->getMethod() === 'post') {
        // Get the data from the form
        $fullName = $this->request->getPost('full_name');
        $comment = $this->request->getPost('comment');
        $rating = $this->request->getPost('rating');
        $userId = $this->request->getPost('user_id');
        
        // Analyze sentiment
        $sentiment = $this->analyzeSentiment($comment); // Ensure this returns a valid sentiment value
        
        // Ensure valid sentiment
        if (!in_array($sentiment, ['positive', 'neutral', 'negative'])) {
            $sentiment = 'neutral'; // Default to 'neutral' if invalid sentiment
        }
        
        // Save the testimonial with the sentiment value
        $testimonialModel = new TestimonialModel();
        $testimonialModel->save([
            'full_name' => $fullName,
            'comment' => $comment,
            'rating' => $rating,
            'user_id' => $userId,
            'sentiment' => $sentiment, // Store sentiment value
        ]);
        
        // Redirect or return success
        return redirect()->to('UserPage/testimonial')->with('success', 'Testimonial added successfully!');
    }
}

public function analyzeSentiment($text)
{
    $positivePhrases = [
        'love', 'happy', 'satisfied', 'great', 'amazing', 'fantastic',
        'efficient', 'easy to use', 'helpful', 'informative', 
        'excellent design', 'user-friendly', 'time-saving', 
        'reliable updates', 'accurate news', 'great resource',
        'keeps me informed', 'useful features', 'well-organized', 
        'impressive performance'
    ];
    
    $negativePhrases = [
        'hate', 'frustrated', 'angry', 'awful', 'terrible', 'worst',
        'hard to navigate', 'slow loading', 'frequent crashes', 
        'outdated information', 'confusing layout', 'inaccurate news', 
        'limited functionality', 'not user-friendly', 
        'poor performance', 'difficult to use', 
        'no notifications', 'hard to find articles'
    ];
    
    $neutralPhrases = [
        'okay', 'fine', 'normal', 'average', 
        'works as expected', 'does the job', 'nothing special', 
        'basic design', 'mediocre experience', 'could be better',
        'serves its purpose', 'acceptable performance',
        'standard functionality', 'neither bad nor good',
        'just okay', 'not bad', 'needs improvement'
    ];    

    // Normalize input (convert to lowercase and check sentence structure)
    $sentences = explode('.', $text); // Split text into sentences

    $positiveScore = 0;
    $negativeScore = 0;
    $neutralScore = 0;

    // Iterate over sentences and check for sentiment
    foreach ($sentences as $sentence) {
        $sentence = trim(strtolower($sentence));

        // Check for positive phrases
        foreach ($positivePhrases as $phrase) {
            if (strpos($sentence, $phrase) !== false) {
                $positiveScore++;
                break;
            }
        }

        // Check for negative phrases
        foreach ($negativePhrases as $phrase) {
            if (strpos($sentence, $phrase) !== false) {
                $negativeScore++;
                break;
            }
        }

        // Check for neutral phrases
        foreach ($neutralPhrases as $phrase) {
            if (strpos($sentence, $phrase) !== false) {
                $neutralScore++;
                break;
            }
        }
    }

    // Determine overall sentiment based on the highest score
    if ($positiveScore > $negativeScore && $positiveScore > $neutralScore) {
        return 'positive';
    } elseif ($negativeScore > $positiveScore && $negativeScore > $neutralScore) {
        return 'negative';
    } else {
        return 'neutral';
    }
}
    public function forgotPassword()
    {
        try {

            // Include form helper
            helper(['form']);

            // Set rules for form validation
            $rules = [
                'email' => 'required|valid_email'
            ];

            if (!$this->validate($rules)) {
                return $this->response->setJSON(['message' => 'Email is not valid.', 'status' => 'error']);
            }
            //code...
            $email = $this->request->getVar('email');

            $userModel = new UsersModel();

            $user = $userModel->select('
                    user_id,
                    email,
                    CONCAT(firstname, " ", lastname) as fullname,
                ')->where('email', $email)
                ->first();

            if (!$user) {
                return $this->response->setJSON(['message' => 'Email not found.', 'status' => 'error']);
            }

            $resetToken = bin2hex(random_bytes(32));

            $userModel->update($user['user_id'], (object) ['reset_token' => $resetToken]);

            $resetLink = base_url("/password-reset?token=$resetToken");

            $res = $this->sendResetEmail($user['fullname'], $user['email'], $resetLink);
            if (!$res) {
                throw new \Exception("Failed to send reset email.");
            }
            return $this->response->setJSON(['status' => 'success', 'message' => 'Password reset email sent.']);

        } catch (\Throwable $th) {
            //throw $th;
            log_message('error', $th->getMessage());
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to send reset email.']);
        }
    }

    private function sendResetEmail($name, $email, $resetLink)
    {
        try {
            $subject = 'KALAP Ejournal Password Reset';
            $message = "
                <html>
                <head>
                    <title>KALAP Ejournal Password Reset</title>
                </head>
                <body>
                    <p>Dear " . htmlspecialchars($name) . ",</p>
                    <p>You've requested to reset your password for your KALAP Ejournal account. To proceed, please click the link below:</p>
                    <p><a href='" . htmlspecialchars($resetLink) . "' style='background-color: #4CAF50; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Reset Your Password</a></p>
                    <p>If you didn't initiate this request, please disregard this email.</p>
                    <p>For assistance, contact the Calapan City Information Office.</p>
                    <p>Sincerely,<br>KALAP Ejournal Team</p>
                </body>
                </html>
            ";

            // Use your email sending library or service here
            $emailService = \Config\Services::email();
            $emailService->setTo($email);
            $emailService->setFrom('evaroventurina03@gmail.com', 'Baron');
            $emailService->setSubject($subject);
            $emailService->setMessage($message);
            $emailService->setMailType('html'); // Set the email format to HTML

            if (!$emailService->send()) {
                log_message('error', $emailService->printDebugger(['headers', 'subject', 'body']));
                return false;
            }

            return true;
        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
            return false;
        }
    }

    public function passwordResetPage()
    {
        $resetToken = $this->request->getGet('token');

        if (!$resetToken) {
            return view('errors/html/error_404');
        }

        $userModel = new UsersModel();
        $user = $userModel->select(['user_id', 'reset_token'])->where('reset_token', $resetToken)->first();

        if (!$user || $user['reset_token'] != $resetToken) {
            return view('errors/html/error_404');
        }
        return view('UserPage/newpassword', ['user_id' => $user['user_id']]);
    }

    public function checkPasswordReset()
    {
        try {
            $user_id = $this->request->getVar('user_id');
            $password = $this->request->getVar('password');
            $reset_token = $this->request->getVar('token');

            if (!$user_id || !$password || !$reset_token) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid request. !$user_id || !$password || !$reset_toke']);
            }

            $userModel = new UsersModel();
            $user = $userModel->select(['user_id', 'email', 'reset_token'])->where(['user_id' => $user_id, 'reset_token' => $reset_token])->first();

            if (!$user || $user['reset_token'] != $reset_token) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid request. !$user || $user[reset_token] != $reset_token']);
            }

            // Generate and send OTP
            $otp = rand(100000, 999999); // Generate a 6-digit OTP
            // Store OTP in session for verification later
            session()->set('otp', $otp);

            $this->sendOtp($user['email'], $otp);

            return $this->response->setJSON(['status' => 'success', 'message' => 'OTP sent to your email.']);
        } catch (\Throwable $th) {
            //throw $th;
            log_message('error', $th->getMessage());
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to send OTP.']);
        }
    }

    private function sendOtp($email, $otp)
    {
        $emailService = \Config\Services::email();
        $emailService->setTo($email);
        $emailService->setFrom('evaroventurina03@gmail.com', 'Baron');
        $emailService->setSubject('Your OTP Code');
        $emailService->setMessage("Your OTP code is: $otp");
        return $emailService->send();
    }

    public function confirmPasswordReset()
    {
        try {
            $inputOtp = $this->request->getVar('otp');
            $sessionOtp = session()->get('otp'); // Assume you stored the OTP in session

            $user_id = $this->request->getVar('user_id');
            $password = $this->request->getVar('password');
            $reset_token = $this->request->getVar('token');

            if (!$user_id || !$password || !$reset_token || !$sessionOtp || !$inputOtp) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid request.']);
            }

            if ($sessionOtp != $inputOtp) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid OTP.']);
            }

            $userModel = new UsersModel();

            $user = $userModel->select(['user_id', 'reset_token'])->where(['user_id' => $user_id, 'reset_token' => $reset_token])->first();

            if (!$user || $user['reset_token'] != $reset_token) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid request.']);
            }

            $data = [
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'reset_token' => null,
            ];

            $userModel->update($user_id, $data);

            return $this->response->setJSON(['status' => 'success', 'message' => 'Password reset successfully.']);
        } catch (\Throwable $th) {
            //throw $th;
            log_message('error', $th->getMessage());
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to reset password.']);
        }
    }

}
