<?php

namespace App\Controllers;

use App\Models\BookingModel;
use App\Models\PaymentModel;
use App\Models\Users;
use App\Models\Products;
use CodeIgniter\Controller;
use Stripe\Charge;
use Stripe\Stripe;

class BookingController extends Controller
{
    public function index($productID)
    {
        
        
        // Get the user ID from the session or authentication library
        $session = session();
        $userId = $session->get('user_id'); // Adjust this according to your session setup
    
        // Retrieve the booking details from the form
        $checkInDate = $this->request->getPost('checkInDate');
        $checkOutDate = $this->request->getPost('checkOutDate');
        $totalPrice = $this->request->getPost('totalPrice');
        $productId = $this->request->getPost('productId'); // Get the product ID from the form
    
        // Create a new instance of the BookingModel
        $bookingModel = new BookingModel();
        $paymentModel = new PaymentModel();
    
        // Prepare the data for insertion
        $data = [
            'user_id' => $userId,
            'product_id' => $productId,
            'checkin_date' => $checkInDate,
            'checkout_date' => $checkOutDate,
            'total_price' => $totalPrice,
        ];

                // Insert the booking data into the database
                $bookingModel->insert($data);
    
                // Set a success message in the session
                $session->setFlashdata('success', 'Booking created successfully.');
    
                return redirect()->to('paychoice');
            } 
        } 
          
       
    

    
    
    


