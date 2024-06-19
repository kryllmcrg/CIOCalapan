<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UsersModel;
use App\Models\CategoryModel;
use App\Models\NewsModel;
use App\Models\ContactModel;


class ChatController extends BaseController
{
    public function dashboard()
    {
        return view('AdminPage/dashboard');
    }

    public function chats()
    {
        // Load the ContactModel
        $contactModel = new ContactModel();
        
        // Fetch contact data from the database
        $contacts = $contactModel->findAll(); // Assuming findAll() fetches all contact items
        
        // Load the view file with the contact data
        return view('AdminPage/chats', ['contacts' => $contacts]);
    }

    public function chatStaff()
    {
        // Load the ContactModel
        $contactModel = new ContactModel();
        
        // Fetch contact data from the database
        $contacts = $contactModel->findAll(); // Assuming findAll() fetches all contact items
        
        // Load the view file with the contact data
        return view('AdminPage/chats', ['contacts' => $contacts]);
    }
}
