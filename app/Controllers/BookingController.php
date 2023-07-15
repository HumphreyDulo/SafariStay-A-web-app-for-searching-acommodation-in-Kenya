<?php

namespace App\Controllers;

use App\Models\BookingModel;
use App\Models\PaymentModel;
use App\Models\NotificationModel;
use App\Models\Users;
use App\Models\Products;
use CodeIgniter\Controller;
use Stripe\Charge;
use Stripe\Stripe;

class BookingController extends Controller
{
    public function index($productID)
    {
        
        // Check if the user is logged in
    if (!session('user_id')) {
        // Redirect non-registered users to the registration page with a message
        return redirect()->to('login')->with('error', 'Please login first.');
    }

        // Get the user ID from the session or authentication library
        $session = session();
        $userId = $session->get('user_id'); // Adjust this according to your session setup
    
        // Retrieve the booking details from the form
        $checkInDate = $this->request->getPost('checkInDate');
        $checkOutDate = $this->request->getPost('checkOutDate');
        $totalPrice = $this->request->getPost('totalPrice');
        $productId = $this->request->getPost('productId'); // Get the product ID from the form
        $vendorId = $this->request->getPost('vendorId'); // Get the product ID from the form

    
        // Create a new instance of the BookingModel
        $bookingModel = new BookingModel();
        $paymentModel = new PaymentModel();
    
        // Prepare the data for insertion
        $data = [
            'user_id' => $userId,
            'vendor_id'=> $vendorId,
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

        public function history()
        {
            // Get the user ID from the session or authentication library
            $session = session();
            $userId = $session->get('user_id'); // Adjust this according to your session setup
    
            // Create a new instance of the BookingModel
            $bookingModel = new BookingModel();
    
            // Retrieve the user's booking history from the database
            $bookings = $bookingModel->where('user_id', $userId)->findAll();
    
            // Pass the bookings data to the view
            $data['bookings'] = $bookings;
    
            // Load the view to display the user's booking history
            return view('booking_history', $data);
        }

        public function all()
        {
            // Create a new instance of the BookingModel
            $bookingModel = new BookingModel();

            // Retrieve all bookings from the database
            $bookings = $bookingModel->findAll();

            // Pass the bookings data to the view
            $data['bookings'] = $bookings;

            $notificationModel = new NotificationModel();
                $notificationCount = $notificationModel->where('status','pending')->countAllResults();
            $data['notificationCount'] = $notificationCount;

            // Load the view to display all bookings
            return view('viewbookings', $data);
        }
 } 
          
       
    

    
    
    


