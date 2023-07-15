<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class Adminlogin extends BaseController
{
    public function adminregisterform()
    {
        return view('admin/adminregister');
    }
    
    public function adminloginform()
    {
        return view('admin/adminlogin');
    }
    

    public function index()
{
    helper(['form']);

    $rules = [
        'admin_name' => 'required',
        'password' => 'required'
    ];

    if ($this->validate($rules)) {
        $adminName = $this->request->getPost('admin_name');
        $password = $this->request->getPost('password');

        // Load the AdminModel
        $adminModel = new \App\Models\AdminModel();

        // Check if the entered admin_name and password match the admin credentials
        $admin = $adminModel->where('admin_name', $adminName)
                            ->first();

        if ($admin && password_verify($password, $admin['password'])) {
            // Valid admin credentials

            // Set session data
            $sessionData = [
                'admin_id' => $admin['admin_name'], // Set the admin ID or any identifier for the admin user
                'isLoggedIn' => true,
                // Add more session data as needed
            ];
            session()->set($sessionData);

            // Redirect to admin dashboard or any other page
            return redirect()->to('admin/dashboard');
        } else {
            // Invalid admin credentials
            $data['login_error'] = 'Invalid username or password';
            return view('admin/login', $data);
        }
    } else {
        $data['validation'] = $this->validator;
        return view('admin/login', $data);
    }
}

    public function logout()
    {
        // Destroy the admin session and redirect to the login page
        session()->destroy();
        return redirect()->to('admin/login');
    }


    public function registerAdmin(){
        helper('form');
    $validation =  \Config\Services::validation();

    // Set the validation rules for the admin registration form
    $validation->setRules([
        'admin_name' => ['rules' => 'required|min_length[1]|max_length[255]|is_unique[tbl_admins.admin_name]'],
        'password' => [
            'rules' => 'required|min_length[8]|max_length[255]|regex_match[/^(?=.*[A-Z])(?=.*\d).+$/]',
            'errors' => [
                'regex_match' => 'The password must contain at least one capital letter and one number.',
            ],
        ],
        'confirm_password' => ['label' => 'confirm password', 'rules' => 'matches[password]']
    ]);

    if ($this->request->getMethod() === 'post' && $validation->withRequest($this->request)->run()) {
        // Valid form submission

        // Get the username and password from the form
        $admin_name = $this->request->getPost('admin_name');
        $password = $this->request->getPost('password');

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Save the admin data to the database
                $adminModel = new AdminModel();
                $adminData = [
                    'admin_name' => $admin_name,
                    'password' => $hashedPassword,
                ];
                $adminModel->insert($adminData);
        
                // Redirect or show success message
                return redirect()->to('admin/login')->with('success', 'Admin registered successfully.');
            }
        
            // Display the admin registration form
            return view('admin/adminregister');
        
    }
}
