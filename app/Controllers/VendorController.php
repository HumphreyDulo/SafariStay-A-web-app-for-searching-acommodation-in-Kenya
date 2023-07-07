<?php

namespace App\Controllers;

use App\Models\AdminModel;

class AdminLoginController extends BaseController
{
    public function index()
    {
        $data = [];
        helper(['form']);

        $rules = [
            'admin_name' => 'required',
            'password' => 'required'
        ];

        if ($this->validate($rules)) {
            $adminname = $this->request->getPost('admin_name');
            $password = $this->request->getPost('password');

            // Load the AdminModel
            $adminModel = new AdminModel();

            // Check if the entered username and password match the admin credentials
            $admin = $adminModel->where('admin_name', $adminname)
                                ->first();

            if ($admin && password_verify($password, $admin['password'])) {
                // Valid admin credentials

                // Set session data or any other authentication logic here
                // Set session data
                $sessionData = [
                    'admin_id' => $admin['admin_id'], // Assuming 'id' is the column name for the admin ID in the database table
                    'admin_name' => $admin['admin_name'],
                    'isLoggedIn' => true,
                    // Add more session data as needed
                ];
                session()->set($sessionData);

                // Redirect to admin dashboard or any other page
                return redirect()->to('admin_dashboard');
            } else {
                // Invalid admin credentials
                $data['login_error'] = 'Invalid username or password';
                return view('adminlogin', $data);
            }
        } else {
            $data['validation'] = $this->validator;
            return view('adminlogin', $data);
        }
    }
}