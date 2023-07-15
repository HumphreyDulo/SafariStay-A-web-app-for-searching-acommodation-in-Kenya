<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Products;

class Post extends BaseController
{
    public function index()
    {
        return view('post');
    }

    public function add_product()
    {
        $session = session();
        $userId = $session->get('user_id'); // Adjust this according to your session setup
    
        $model = new Products();
    
        // Retrieve form data
        $productName = $this->request->getPost('product_name');
        $productDescription = $this->request->getPost('product_description');
        $productImages = $this->request->getFileMultiple('product_images');
        $location = $this->request->getPost('location');
        $bedrooms = $this->request->getPost('bedrooms');
        $bathrooms = $this->request->getPost('bathrooms');
        $price = $this->request->getPost('price');
        $availableDate = $this->request->getPost('available_date');
        $additionalInfo = $this->request->getPost('additional_info');
    
        // Perform validation on the input fields (e.g., check for required fields)
    
        // Process the uploaded images
        $imagePaths = [];
        if (!empty($productImages) && is_array($productImages)) {
            foreach ($productImages as $productImage) {
                if ($productImage->isValid() && !$productImage->hasMoved()) {
                    // Use the original name
                    $imageName = $productImage->getName();
    
                    // Move the uploaded image to a designated directory
                    $productImage->move(ROOTPATH . 'public/uploads', $imageName);
    
                    // Set the image path for database storage
                    $imagePath = 'uploads/' . $imageName;
                    $imagePaths[] = $imagePath;
                }
            }
        }
    
        // Store the product data in the database
        $productData = [
            'vendorID' => $userId,
            'product_name' => $productName,
            'product_description' => $productDescription,
            'product_images' => implode(',', $imagePaths),
            'location' => $location,
            'bedrooms' => $bedrooms,
            'bathrooms' => $bathrooms,
            'price' => $price,
            'available_date' => $availableDate,
            'additional_info' => $additionalInfo
        ];
        $model->insert($productData);
    
        // Provide success message and redirect back to the vendor dashboard
        return redirect()->to('Post')->with('success_message', 'Product added successfully.');
    }
    
}
