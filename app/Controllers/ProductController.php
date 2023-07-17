<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Products;

class ProductController extends BaseController
{
    public function show($id)
    {
        $model = new Products();
        $product = $model->find($id);
    
        // Pass the $product variable to the view
        $data['product'] = $product;
    
        // Assuming you have loaded the database library in your controller
        $db = db_connect(); // Get the database connection
    
        $productId = $product['id']; // Replace this with the actual product ID
        $bookings = $db->table('tbl_bookings')
                        ->where('product_id', $productId)
                        ->get()
                        ->getResultArray();
    
        $data['bookings'] = $bookings;
    
        return view('specificproduct', $data);
    }
    
}
