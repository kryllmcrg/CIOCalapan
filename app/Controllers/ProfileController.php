<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UsersModel;

class ProfileController extends BaseController
{
    public function dashboard()
    {
        return view('AdminPage/dashboard');
    }

    public function manageusers()
    {
        // Load the UserModel
        $usersModel = new UsersModel();

        // Select specific fields from the database, including 'user_id', and filter by role 'User'
        $userData = $usersModel->select('user_id, firstname, lastname, address, email, contact_number, image, role, gender, log_status')
            ->where('role', 'User') // Filter by role 'User'
            ->findAll();

        // Pass $userData to your view
        return view('AdminPage/manageusers', ['userData' => $userData]);
    }

    // In your controller
    public function manageProfile()
    {
        $usersModel = new UsersModel();
        // Select specific fields from the database, including 'user_id'
        $userData = $usersModel->select('user_id, staff_id, firstname, lastname, address, email, contact_number, image, role, gender, log_status')
            ->whereIn('role', ['Admin', 'Staff'])
            ->findAll();

        // Pass $userData to your view
        return view('AdminPage/manageprofile', ['userData' => $userData]);
    }


    public function update()
    {
        // Load the UserModel
        $usersModel = new UsersModel();

        // Get the user_id from the form
        $userId = $this->request->getPost('user_id');

        // Prepare the data to update
        $data = [
            'staff_id' => $this->request->getPost('staff_id'),
            'firstname' => $this->request->getPost('firstname'),
            'lastname' => $this->request->getPost('lastname'),
            'address' => $this->request->getPost('address'),
            'email' => $this->request->getPost('email'),
            'contact_number' => $this->request->getPost('contact_number'),
            'role' => $this->request->getPost('role'),
            'gender' => $this->request->getPost('gender'),
            // Add more fields as needed
        ];

        // Update the user record
        $usersModel->update($userId, $data);

        // Redirect to the manageProfile method or any other appropriate route
        return redirect()->to('/manageprofile');
    }

    public function deleted()
    {
        try {
            $id = $this->request->getPost('id'); // Get the user ID from POST data
            $userModel = new UsersModel(); // Ensure UsersModel is properly loaded

            // Check if the user exists before attempting to delete
            if (!$userModel->find($id)) {
                return redirect()->to('/manage_profile')->with('error', 'User not found.');
            }

            // Attempt to delete the user by ID
            if ($userModel->delete($id)) {
                // Successfully deleted, redirect with success message
                return redirect()->to('/manage_profile')->with('message', 'User deleted successfully.');
            } else {
                // Deletion failed, redirect with error message
                return redirect()->to('/manage_profile')->with('error', 'Error deleting user.');
            }
        } catch (\Throwable $th) {
            //throw $th;
            log_message('error', $th->getMessage() . ": " . $th->getLine());
            log_message('error', json_encode($th->getTrace()));
            return redirect()->to('/manage_profile')->with('error', 'Error deleting user.');
        }
    }


    public function delete()
    {
        $userModel = new UsersModel();
        $id = $this->request->getPost('id'); // Get the user ID from POST data

        // Check if user exists
        $user = $userModel->find($id);

        if ($user) {
            // Attempt to delete the user
            if ($userModel->delete($id)) {
                // Deletion successful
                return redirect()->to('manageusers')->with('message', 'User deleted successfully.');
            } else {
                // Error occurred while deleting
                return redirect()->to('manageusers')->with('error', 'Error deleting user.');
            }
        } else {
            // User not found
            return redirect()->to('manageusers')->with('error', 'User not found.');
        }
    }


}
