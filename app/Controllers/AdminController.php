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
        return view('AdminPage/dashboard');
    }
    
}
