<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BookingModel;
use App\Models\PaymentModel;

//defined('BASEPATH') or exit('No direct script access allowed');

use Config\Mpesa;
use Stripe\Stripe;
use Stripe\Charge;

class PaymentController extends BaseController
{

    public function index()
    {

        return view('paymentform');

    }

    /*public function X()
    {
        $paymentModel = new PaymentModel();
        $session = session();

        $expirationDate = $this->request->getPost('expiration_date');
        $cvv = $this->request->getPost('cvv');
        $amount = 1000; // Amount in cents

        // Extract month and year from expiration date
        $expMonth = substr($expirationDate, 0, 2);
        $expYear = substr($expirationDate, 3, 2);

        // Create a charge using Stripe PHP library
        try {
            Stripe::setApiKey('sk_test_51M4UENJwnnN8PYBK4tUrWvBJid7AcL7Ff3znlgIQsLYhXsnkEZg6qw0RcQLQIX66SfErEOYMShqAwkmMm6gUAszR005dZjowmB');

            // Generate a test token using Stripe test card details
            $token = 'tok_visa'; // Replace with the appropriate test token for the desired card type

            $charge = Charge::create([
                'amount' => $amount,
                'currency' => 'usd',
                'source' => $token, // Use the test token instead of card details
            ]);

            // Handle successful payment
            $paymentId = $charge->id;
            $status = $charge->status;

            if ($status === 'succeeded') {
                // Save payment details to the database with status "complete"
                $paymentData = [
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
            return redirect()->to('error_page');
        }
    }
*/

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
                'amount' => $amount , // CENTS
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


    public function Mprocess()
{
 

    $paymentModel = new PaymentModel();
    $session = session();

    $amount = $this->request->getPost('amount');
    $phone = $this->request->getPost('phone');

    // Perform any necessary data validation and formatting

    // Perform validation for amount
    if (!is_numeric($amount) || $amount < 0) {
        // Invalid amount
        $session->setFlashdata('error_message', 'Invalid amount.');
        return redirect()->to('paymentError');
    }

    // Perform validation for phone number
    $phoneRegex = '/^(?:\+?254|0)[17]\d{8}$/';
    if (!preg_match($phoneRegex, $phone)) {
        // Invalid phone number
        $session->setFlashdata('error_message', 'Invalid phone number.');
        return redirect()->to('paymentError');
    }

    // Make a request to the M-PESA API
    try {
        // Set up your API request parameters
        $apiEndpoint = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials'; // Replace with the actual API endpoint URL
        $apiKey = '5RcDAHh3yMlsGLq4lIxbemJDITyCAULK';
        $apiSecret = 'RuiTgeSoFpFeMVFh';

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', $apiEndpoint, [
            'json' => [
                'amount' => $amount,
                'phone' => $phone,
            ],
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . base64_encode($apiKey . ':' . $apiSecret),
            ],
        ]);

        // Process the API response
        $statusCode = $response->getStatusCode();
        $responseBody = json_decode($response->getBody(), true);

        if ($statusCode === 200) {
            // Check if the 'status' key exists in the response body
            if (isset($responseBody['status']) && $responseBody['status'] === 'success') {
                // Payment successful
                $paymentId = $responseBody['payment_id'];

                // Save payment details to the database with status "complete"
                $paymentData = [
                    'payment_id' => $paymentId,
                    'status' => 'complete',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
                $paymentModel->insert($paymentData);

                // Set flashdata with success message
                $session->setFlashdata('success_message', 'Payment successful.');

                // Redirect to a success page
                return redirect()->to('MPsuccess');
            } else {
                // Payment failed or API error
                $errorMessage = isset($responseBody['error']) ? $responseBody['error'] : 'Unknown error occurred';

                // Set flashdata with error message
                $session->setFlashdata('error_message', 'Payment error: ' . $errorMessage);

                // Redirect to an error page
                return redirect()->to('MPerror');
            }
        } else {
            // API request was not successful
            $session->setFlashdata('error_message', 'API request failed.');
            return redirect()->to('MPerror');
        }
    } catch (\Exception $e) {
        // Handle API errors
        $error = $e->getMessage();

        // Set flashdata with error message
        $session->setFlashdata('error_message', 'Payment error: ' . $error);

        // Redirect to an error page
        return redirect()->to('MPerror');
    }
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