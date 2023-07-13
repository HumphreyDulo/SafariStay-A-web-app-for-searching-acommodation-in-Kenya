<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PayChoice extends BaseController
{
    public function index()
    {
        // Get session data
        $session = session();
        $userId = $session->get('user_id');
        // Add any other session data you want to pass to the view

        // Load the view and pass session data
        return view('paychoice', [
            'userId' => $userId,
            // Pass any other session data as needed
        ]);
    }

}