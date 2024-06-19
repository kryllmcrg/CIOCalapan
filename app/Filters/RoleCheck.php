<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleCheck implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Check if user is logged in and their role
        $session = session();
        if ($session->get('logged_in')) {
            $role = $session->get('role');
            // Redirect based on user role
            switch ($role) {
                case 'Admin':
                    return redirect()->to('/dashboard');
                case 'Staff':
                    return redirect()->to('/dashboard');
                // Add more cases for other roles if needed
            }
        }
        return $request;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // We don't need anything here for now
    }
}