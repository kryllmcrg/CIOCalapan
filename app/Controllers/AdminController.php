<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UsersModel;
use App\Models\CategoryModel;
use App\Models\NewsModel;

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
    
}
