<?php

namespace App\Controllers;
use App\Models\UsersModel;
use App\Libraries\Hash;

class LogRegController extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function home()
    {
        return view('UserPage/home');
    }

    public function login()
    {
        return view('UserPage/login');
    }
   
    public function register()
    {
        return view('UserPage/register');
    }

    public function save()
    {
        // Include form helper
        helper(['form']);

        // Set rules for form validation
        $rules = [
            'firstname'      => 'required|min_length[2]|max_length[50]',
            'lastname'       => 'required|min_length[2]|max_length[50]',
            'email'          => 'required|valid_email|is_unique[users.email]',
            'password'       => 'required|min_length[6]|max_length[255]',
            'gender'         => 'required|in_list[Male,Female,Rather not say]',
            'contact_number' => 'required|min_length[10]|max_length[15]',
            'image'          => 'uploaded[image]|max_size[image,2048]|is_image[image]'
        ];

        if ($this->validate($rules)) {
            // Retrieve form input
            $firstname = $this->request->getVar('firstname');
            $lastname = $this->request->getVar('lastname');
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');
            $address = $this->request->getVar('address');
            $gender = $this->request->getVar('gender');
            $contact_number = $this->request->getVar('contact_number');
            $image = $this->request->getFile('image');

            // Handle image upload
            if ($image->isValid() && !$image->hasMoved()) {
                $newName = $image->getRandomName();
                $image->move('uploads', $newName);
            } else {
                session()->setFlashdata('fail', 'Failed to upload image.');
                return redirect()->to(base_url('register'))->withInput();
            }

            // Hash password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Prepare data for insertion
            $data = [
                'firstname' => $firstname,
                'lastname' => $lastname,
                'email' => $email,
                'password' => $hashedPassword,
                'address' => $address,
                'gender' => $gender,
                'contact_number' => $contact_number,
                'image' => $image->getName(),
                'role' => 'User' 
            ];
            // Insert data into database
            $usersModel = new UsersModel();
            $usersModel->insert($data);

            session()->setFlashdata('success', 'Registration successful. You can now login.');
            return redirect()->to(base_url('login'));
        } else {
            // Validation failed, show validation errors
            $data['validation'] = $this->validator;
            return view('UserPage/register', $data);
        }
    }

        public function auth()
        {
            $session = session();
            $model = new UsersModel();
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');
            $data = $model->where('email', $email)->first();
            if ($data) {
                $pass = $data['password'];
                $verify_pass = password_verify($password, $pass);
                if ($verify_pass) {
                    // Set user data in session
                    $session->set([
                        'user_id' => $data['user_id'],
                        'email' => $data['email'],
                        'role' => $data['role'],
                        'image' => $data['image'],
                        'fullname' => $data['firstname'].' '. $data['lastname'],
                        'logged_in' => true
                    ]);

                    // Update login status to 'Logged In'
                    $loginData = [
                        'log_status' => 'Logged In'
                    ];
                    $model->update($data['user_id'], $loginData);

                    // Redirect based on user's role
                    if ($data['role'] == 'Admin' || $data['role'] == 'Staff') {
                        return redirect()->to('/dashboard');
                     } else{
                        // Redirect to another page for users with different roles
                        return redirect()->to('/');
                    }
                } else {
                    $session->setFlashdata('msg', 'Incorrect password');
                    return redirect()->to('/login');
                }
            } else {
                $session->setFlashdata('msg', 'Email not found');
                return redirect()->to('/login');
            }
        }

        public function check()
    {
        // Include form helper
        helper(['form']);

        // Set rules for form validation
        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]|max_length[255]'
        ];

        if ($this->validate($rules)) {
            $model = new UsersModel();
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');
            $data = $model->where('email', $email)->first();
            if ($data) {
                $pass = $data['password'];
                $verify_pass = password_verify($password, $pass);
                if ($verify_pass) {
                    $session = session();
                    var_dump($session->get('user_id'));

                    $session->set([
                        'staff_id' => $data['staff_id'],
                        'user_id' => $data['user_id'],
                        'email' => $data['email'],
                        'role' => $data['role'],
                        'image' => $data['image'],
                        'fullname' => $data['firstname'].' '. $data['lastname'],
                        'logged_in' => true
                    ]);

                    // Update login status to 'Logged In'
                    $loginData = [
                        'log_status' => 'Logged In'
                    ];
                    $model->update($data['user_id'], $loginData);

                    if ($data['role'] == 'Admin') {
                        return redirect()->to('/dashboard');
                    } elseif ( $data['role'] == 'Staff'){
                        return redirect()->to('/dashboard');
                    }{
                        return redirect()->to('/');
                    }
                } else {
                    $session = session();
                    $session->setFlashdata('fail', 'Incorrect password');
                    return redirect()->to('/login')->withInput();
                }
            } else {
                $session = session();
                $session->setFlashdata('fail', 'Email not found');
                return redirect()->to('/login')->withInput();
            }
        } else {
            // Validation failed, show validation errors
            $data['validation'] = $this->validator;
            echo view('login', $data);
        }
    }

    public function logout()
    {
        $session = session();
        $model = new UsersModel();

        // Get user id from session
        $userId = $session->get('user_id');

        // Update login status to 'Logged Out'
        $logoutData = [
            'log_status' => 'Logged Out'
        ];
        $model->update($userId, $logoutData);

        // Destroy session
        $session->destroy();

        // Redirect to login page
        return redirect()->to('/login');
    }

    public function filtercheck()
    {
        $session = session();
        $role = $session->get('role');
        // Only allow admin and staff to access the dashboard
        if ($role !== 'Admin' && $role !== 'Staff') {
            return redirect()->to('/login');
        }
        // Proceed with displaying the dashboard
        return view('dashboard');
    }
}