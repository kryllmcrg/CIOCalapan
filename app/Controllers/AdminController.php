<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TestimonialModel;
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
        // Load the models
        $usersModel = new UsersModel();
        $newsModel = new NewsModel();
        $testimonialModel = new TestimonialModel();
    
        // Fetch counts
        $userCount = $usersModel->where('role', 'User')->countAllResults();
        $staffCount = $usersModel->where('role', 'Staff')->countAllResults();
        $newsByAdmin = $newsModel->where('created_by', 'Admin')->countAllResults();
        $newsByStaff = $newsModel->where('created_by', 'Staff')->countAllResults();
        $newsStatusCounts = $newsModel->getNewsStatusCounts();
        $publicationStatusCounts = $newsModel->getPublicationStatusCounts();
        $sentimentCounts = $testimonialModel->getSentimentCounts();


        // Pass data to the view
        return view('AdminPage/dashboard', [
            'userCount' => $userCount,
            'staffCount' => $staffCount,
            'newsByAdmin' => $newsByAdmin,
            'newsByStaff' => $newsByStaff,
            'newsModel' => $newsModel,
            'newsStatusCounts' => $newsStatusCounts,
            'publicationStatusCounts' => $publicationStatusCounts,
            'sentimentCounts' => $sentimentCounts,
        ]);
    }
}
