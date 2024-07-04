<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UsersModel;
use App\Models\CategoryModel;
use App\Models\NewsModel;
use App\Models\LikeModel;
use App\Models\RatingModel;
use App\Models\CommentModel;

class AdminController extends BaseController
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
        $newsByAdmin = $newsModel->where('created_by', 'Admin')->countAllResults();
    
        // Fetch count of news by Staff
        $newsByStaff = $newsModel->where('created_by', 'Staff')->countAllResults();
    
        // Get the news status counts
        $newsStatusCounts = $newsModel->getNewsStatusCounts();

        $publicationStatusCounts = $newsModel->getPublicationStatusCounts();
    
        // Pass the counts to the view
        return view('AdminPage/dashboard', [
            'userCount' => $userCount,
            'staffCount' => $staffCount,
            'newsByAdmin' => $newsByAdmin,
            'newsByStaff' => $newsByStaff,
            'newsModel' => $newsModel, // Pass the NewsModel instance to the view with the correct key
            'newsStatusCounts' => $newsStatusCounts, // Pass the news status counts to the view
            'publicationStatusCounts' => $publicationStatusCounts
        ]);
        
    }


    public function news($news_id)
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

        return view('UserPage/news', $data);
    }
    
}
