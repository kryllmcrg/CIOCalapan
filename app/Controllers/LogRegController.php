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
        'firstname' => 'required|regex_match[/^[a-zA-Z]+$/]|min_length[2]', // Allow only letters
        'lastname' => 'required|regex_match[/^[a-zA-Z]+$/]|min_length[2]', // Allow only letters
        'email' => 'required|valid_email',
        'password' => 'required|min_length[8]|regex_match[/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/]', // At least one letter, one number, and one special character
        'gender' => 'required',
        'contact_number' => 'required|regex_match[/^\d{11}$/]', // Must be exactly 11 digits
        'image' => 'uploaded[image]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/gif,image/png]',
        'terms' => 'required'
    ];

    // Store input values
    $data = $this->request->getPost();

    if ($this->validate($rules)) {
        // Handle image upload
        $image = $this->request->getFile('image');
        if ($image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move('uploads', $newName);
        } else {
            session()->setFlashdata('fail', 'Failed to upload image.');
            return redirect()->to(base_url('register'))->withInput();
        }

        // Hash password
        $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);

        // Prepare data for insertion
        $insertData = [
            'firstname'      => $data['firstname'],
            'lastname'       => $data['lastname'],
            'email'          => $data['email'],
            'password'       => $hashedPassword,
            'address'        => $data['address'],
            'gender'         => $data['gender'],
            'contact_number' => $data['contact_number'],
            'image'          => $image->getName(),
            'role'           => 'User'
        ];

        // Insert data into database
        $usersModel = new UsersModel();
        $usersModel->insert($insertData);

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
                'password' => 'required|min_length[8]|regex_match[/^(?=.*[A-Za-z])(?=.*\d)(?=.*[\W_]).+$/]'
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
                        // Generate and send OTP
                        $otp = rand(100000, 999999); // Generate a 6-digit OTP
                        // Store OTP in session for verification later
                        session()->set('otp', $otp);
                        session()->set('role', $data['role']);
                        // Optionally, send OTP to user's email (implement sendOtp method)
                        $this->sendOtp($email, $otp);
    
                        // Show OTP form (use AJAX to show OTP input without redirect)
                        return $this->response->setJSON(['status' => 'success', 'message' => 'OTP sent to your email.']);
                    } else {
                        session()->setFlashdata('fail', 'Incorrect password');
                        return redirect()->to('/login')->withInput();
                    }
                } else {
                    session()->setFlashdata('fail', 'Email not found');
                    return redirect()->to('/login')->withInput();
                }
            } else {
                // Validation failed, show validation errors
                $data['validation'] = $this->validator;
                echo view('login', $data);
            }
        }
    
        private function sendOtp($email, $otp)
        {
            // Implement your email sending logic here
            // You can use CodeIgniter's email library to send the OTP to the user's email
            // For example:
            $emailService = \Config\Services::email();
            $emailService->setTo($email);
            $emailService->setFrom('evaroventurina03@gmail.com', 'Baron');
            $emailService->setSubject('Your OTP Code');
            $emailService->setMessage("Your OTP code is: $otp");
            return $emailService->send();
        }
    
    
        public function verifyOtp()
        {
            if ($this->request->getMethod() == 'post') {
                $inputOtp = $this->request->getVar('otp');
                $sessionOtp = session()->get('otp'); // Assume you stored the OTP in session
        
                // Check if the OTP is valid
                if ($inputOtp == $sessionOtp) {
                    // OTP is valid, log in the user
                    session()->set('loggedIn', true); // Set session data
                    return redirect()->to(base_url('dashboard')); // Redirect to dashboard
                } else {
                    // OTP is invalid
                    session()->setFlashdata('error', 'Invalid OTP. Please try again.');
                    return redirect()->to(base_url('login')); // Redirect back to login
                }
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