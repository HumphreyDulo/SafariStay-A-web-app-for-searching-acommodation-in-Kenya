<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NotificationModel;
use App\Models\Users;
use App\Models\Products;

class Dashboard extends BaseController
{
    public function index()
{
    $model = new Products();
    $products = $model->findAll();

    // Retrieve filter values from the query parameters
    $bedrooms = $this->request->getVar('bedrooms');
    $bathrooms = $this->request->getVar('bathrooms');
    $price = $this->request->getVar('price');
    $location = $this->request->getVar('location');

    // Apply filters to the products data
    $filteredProducts = $this->filterProducts($products, $bedrooms, $bathrooms, $price, $location);
    $data['products'] = $filteredProducts;

    echo view('dashboard', $data);
}


private function filterProducts($products, $bedrooms, $bathrooms, $price, $location)
{
    $filteredProducts = [];

    foreach ($products as $product) {
        $productBedrooms = $product['bedrooms'];
        $productBathrooms = $product['bathrooms'];
        $productPrice = $product['price'];
        $productLocation = $product['location'];

        // Check if the product matches the filter criteria
        if ((empty($bedrooms) || $productBedrooms == $bedrooms) &&
            (empty($bathrooms) || $productBathrooms == $bathrooms) &&
            (empty($price) || $productPrice == $price) &&
            (empty($location) || $productLocation == $location)
        ) {
            $filteredProducts[] = $product;
        }
    }

    return $filteredProducts;
}



    public function dashboard()
    {
        // Load the necessary models and retrieve the notification count
        $notificationModel = new NotificationModel();
        $notificationCount = $notificationModel->countAll();

        $notificationCount = $notificationModel->where('status', 'pending')->countAllResults();


        // Count the number of pending notifications
        $notificationCount = $notificationModel->where('status','pending')->countAllResults();


        // Pass the notification count to the view
        return view('admin_dashboard', ['notificationCount' => $notificationCount]);
    }
}
