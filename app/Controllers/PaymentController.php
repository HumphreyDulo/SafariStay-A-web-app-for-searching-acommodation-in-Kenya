<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Mpesa;
use App\Models\BookingModel;
use App\Models\PaymentModel;
//defined('BASEPATH') or exit('No direct script access allowed');


use Stripe\Charge;
use Stripe\Stripe;

class PaymentController extends BaseController
{
    protected $mpesa;

    public function __construct()
    {
        $mpesa = new \Safaricom\Mpesa\Mpesa();
    }

    public function index()
    {

        return view('paymentform');

    }


    public function process()
    {

        // Get the user ID from the session or authentication library
        $session = session();
        $userId = $session->get('user_id'); // Adjust this according to your session setup
        $amount = 1000;


        // Create a new instance of the BookingModel
        $bookingModel = new BookingModel();
        $paymentModel = new PaymentModel();



        // Add the payment logic here
        try {
            Stripe::setApiKey('sk_test_51M4UENJwnnN8PYBK4tUrWvBJid7AcL7Ff3znlgIQsLYhXsnkEZg6qw0RcQLQIX66SfErEOYMShqAwkmMm6gUAszR005dZjowmB'); // Replace with your Stripe API key

            // Generate a test token using Stripe test card details
            $token = 'tok_visa'; // Replace with the appropriate test token for the desired card type

            $charge = Charge::create([
                'amount' => $amount,
                // CENTS
                'currency' => 'usd',
                'source' => $token,
            ]);

            // Handle successful payment
            $paymentId = $charge->id;
            $status = $charge->status;

            if ($status === 'succeeded') {
                // Insert the booking data into the database


                // Save payment details to the database with status "complete"
                $paymentData = [
                    'booking_id' => $bookingModel->getInsertID(),
                    'payment_id' => $paymentId,
                    'status' => 'complete',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
                $paymentModel->insert($paymentData);

                // Set flashdata with success message
                $session->setFlashdata('success_message', 'Payment successful.');

                // Redirect to a success page
                return redirect()->to('paymentSuccess');
            } else {
                // Payment status is not "succeeded"
                // Handle payment errors or other statuses
                $error = 'Payment error: Invalid payment status.';

                // Set flashdata with error message
                $session->setFlashdata('error_message', $error);

                // Redirect to an error page
                return redirect()->to('paymentError');
            }
        } catch (\Exception $e) {
            // Handle payment errors
            $error = $e->getMessage();

            // Set flashdata with error message
            $session->setFlashdata('error_message', 'Payment error: ' . $error);

            // Redirect to an error page
            return redirect()->to('paymentError');
        }

    }


    public function success()
    {
        return view('paymentSuccess');

    }
    public function error()
    {
        return view('paymentError');

    }

    public function callback()
    {
        // Retrieve the callback data sent by M-PESA
        $callbackData = $this->request->getPost(); // Assuming you are using POST request for the callback

        // Process the callback data and update your database or perform any other necessary actions
        // ...

        // Return a response to M-PESA to acknowledge the callback
        return $this->response->setStatusCode(200); // Sending a 200 status code as acknowledgment
    }



    public function MPESA()
    {
        return view('MpesaForm');

    }


    public function MPerror()
    {
        return view('MPerror');

    }


    public function MPsuccess()
    {
        return view('MPsuccess');

    }

}