<?php

namespace App\Controllers;

use App\Models\NotificationModel;
use App\Models\VendorModel;
use App\Models\AdminModel;
use App\Models\Users;
use App\Models\Products;
use CodeIgniter\Config\Services;

class Admin extends BaseController
{


    public function notifications()
    {
        // Load the necessary models
        $notificationModel = new NotificationModel();

        // Get notifications by vendor_id
        $vendorId = $this->request->getVar('vendor_id');
        $notifications = $notificationModel->where('vendor_id', $vendorId)->findAll();

        // Pass the notifications to the view
        return view('admin/notifications', compact('notifications'));
    }

    public function handleRegistration($notificationId, $status)
    {
        // Load the necessary models
        $notificationModel = new NotificationModel();

        // Find the notification by ID
        $notification = $notificationModel->find($notificationId);

        if (!$notification) {
            // Notification not found, handle the error accordingly
            return redirect()->back()->with('error', 'Notification not found');
        }

        // Update the status of the notification
        $notificationModel->update($notificationId, ['status' => $status]);

        // Redirect back to the notifications page
        return redirect()->back()->with('success', 'Notification status updated successfully');
    }

    public function index()
    {
        // Load the necessary models
        $notificationModel = new NotificationModel();
    
        // Get all notifications
        $notifications = $notificationModel->findAll();
    
        // Count the number of pending notifications
        $notificationCount = $notificationModel->where('status','pending')->countAllResults();

        $data['notificationCount'] = $notificationCount;
    
        // Pass the notifications and count to the view
        return view('admin', [
            'notifications' => $notifications,
            'notificationCount' => $notificationCount
        ]);

        
    }
    
    public function accept()
{
    // Load the necessary models
    $notificationModel = new NotificationModel();
    $vendorModel = new VendorModel();

    // Find the notification with the status 'pending'
    $notification = $notificationModel->where('status', 'pending')->first();

    if (!$notification) {
        // Notification not found, handle the error accordingly
        return redirect()->back()->with('error', 'Notification not found');
    }

    // Retrieve the vendor_id from the notification
    $vendorId = $notification['vendor_id'];

    // Update the status of the notification
    $notificationModel->where('vendor_id', $vendorId)->set(['status' => 'approved'])->update();

    // Update the status of the vendor in tbl_vendor
    $vendorModel->where('vendor_id', $vendorId)->set(['status' => 'approved'])->update();

    // Retrieve the vendor details
    $vendor = $vendorModel->find($vendorId);

    if (!$vendor) {
        // Vendor not found, handle the error accordingly
        return redirect()->back()->with('error', 'Vendor not found');
    }

    // Send an email notification to the vendor
    $email = Services::email();
    $email->setTo($vendor['email']);
    $email->setSubject('Vendor Application Accepted');
    $email->setMessage('Congratulations! Your vendor application has been accepted.');
    $email->send();

    // Redirect back to the notifications page
    return redirect()->back()->with('success', 'Notification status updated successfully');
}


    public function deny()
    {
        $vendorId = $this->request->getPost('vendor_id');

        // Load the necessary models
        $notificationModel = new NotificationModel();
        $vendorModel = new VendorModel();

        // Find the notification by vendor_id
        $notification = $notificationModel->where('vendor_id', $vendorId)->first();

        if (!$notification) {
            // Notification not found, handle the error accordingly
            return redirect()->back()->with('error', 'Notification not found');
        }

        // Update the status of the notification
        $notificationModel->where('vendor_id', $vendorId)->set(['status' => 'denied'])->update();

        // Update the status of the vendor in tbl_vendor
        $vendorModel->where('vendor_id', $vendorId)->set(['status' => 'denied'])->update();

        // Retrieve the vendor details
        $vendor = $vendorModel->find($vendorId);

        if (!$vendor) {
            // Vendor not found, handle the error accordingly
            return redirect()->back()->with('error', 'Vendor not found');
        }

        // Send an email notification to the vendor
        $email = Services::email();
        $email->setTo($vendor['email']);
        $email->setSubject('Vendor Application Denied');
        $email->setMessage('We regret to inform you that your vendor application has been denied.');
        $email->send();

        // Redirect back to the notifications page
        return redirect()->back()->with('success', 'Notification status updated successfully');
    }

    // In the Products model:

    public function approveproduct($productId)
    {
        // Load the necessary models
        $productModel = new Products();
    
        // Find the product with the given product ID
        $product = $productModel->find($productId);
    
        if (!$product) {
            // Product not found, handle the error accordingly
            return redirect()->back()->with('error', 'Product not found');
        }
    
        // Update the status of the product to 'accepted'
        $productModel->where('id', $productId)->set(['approval' => 'accepted'])->update();
    
        // Redirect back to the vendor dashboard or appropriate page
        return redirect()->back()->with('success', 'Product status updated successfully');
    }
    
    public function denyproduct($productId)
    {
        // Load the necessary models
        $productModel = new Products();
    
        // Find the product with the given product ID
        $product = $productModel->find($productId);
    
        if (!$product) {
            // Product not found, handle the error accordingly
            return redirect()->back()->with('error', 'Product not found');
        }
    
        // Update the status of the product to 'denied'
        $productModel->where('id', $productId)->set(['approval' => 'denied'])->update();
    
        // Redirect back to the vendor dashboard or appropriate page
        return redirect()->back()->with('success', 'Product status updated successfully');
    }
    


    public function viewUsers()
    {
        $model = new Users();
        $data['users'] = $model->findAll(); // Fetch all users from the model

        $notificationModel = new NotificationModel();
        $notificationCount = $notificationModel->where('status','pending')->countAllResults();
        $data['notificationCount'] = $notificationCount;



        echo view('viewusers', $data);
    }

    public function viewProducts()
{
    $productModel = new Products();
    $data['products'] = $productModel->findAll(); // Fetch all products from the model

    $pendingCount = $productModel->where('approval', 'pending')->countAllResults();
    $data['pendingCount'] = $pendingCount;

    return view('viewproducts', $data);
}

    
public function validateProduct()
{
    $productModel = new Products();
    $products = $productModel->findAll(); // Fetch all products from the model

    $data['products'] = $products;

    return view('validate_product', $data);
}


    public function delete_user()
    {
        $model = new Users();
        $userId = $this->request->getPost('id');

        // Perform the deletion based on the user ID
        // Adjust the logic according to your database schema and implementation
        $model->deleteUser($userId);

        return redirect()->back()->with('success', 'User deleted successfully.');
    }

    public function deleteProduct($productId)
{
    $model = new Products();

    // Perform the deletion based on the product ID
    $model->delete($productId);

    return redirect()->back()->with('success', 'Product deleted successfully.');
}



}