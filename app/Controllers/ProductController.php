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

        return view('specificproduct', $data);
    }
}
