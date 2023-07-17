<?php

namespace App\Controllers;

use App\Libraries\Mpesa;
use App\Models\BookingModel;
use App\Models\PaymentModel;
use CodeIgniter\Controller;

class MpesaController extends Controller
{
    public function stkpush()
    {

        $session = session();

        $paymentModel = new PaymentModel();
        $bookingModel = new BookingModel();

        $data = [
            'BusinessShortCode' => '174379',
            'Password' => 'MTc0Mzc5YmZiMjc5ZjlhYTliZGJjZjE1OGU5N2RkNzFhNDY3Y2QyZTBjODkzMDU5YjEwZjc4ZTZiNzJhZGExZWQyYzkxOTIwMjMwNzE3MTAwNzM3',
            'Timestamp' => '20230717100737',
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => 1,
            'PartyA' => 254768782107,
            'PartyB' => 174379,
            'PhoneNumber' => 254768782107,
            'CallBackURL' => 'https://mydomain.com/path',
            'AccountReference' => 'CompanyXLTD',
            'TransactionDesc' => 'Payment of X'
        ];

        // Convert the data array to JSON format
        $jsonData = json_encode($data);

        // Set the cURL options
        $ch = curl_init('https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer DL69GfiIjdIGw8FlZms3ujb1iwnE',
            'Content-Type: application/json'
        ]);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // Execute the request
        $response = curl_exec($ch);

        // Close the cURL session
        curl_close($ch);

        echo $response;

        if ($response) {
            $notification = [
                'message' => 'Thank you, payment has been received.',
                'alert-type' => 'success'
            ];

            // Store the notification in session flashdata
            $session->setFlashdata('success_message', $notification['message']);

            $paymentId = uniqid();

            $paymentData = [
                'booking_id' => $bookingModel->getInsertID(),
                'payment_id' => $paymentId,
                // Use the appropriate payment ID from your STK Push response
                'status' => 'complete',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $paymentModel->insert($paymentData);

            sleep(10);
            // Redirect back to the same page
            return redirect('MPsuccess');
        } else {
            // Handle the case when STK Push simulation fails
            $notification = [
                'message' => 'Failed to initiate STK Push.',
                'alert-type' => 'error'
            ];

            // Store the notification in session flashdata
            $session->setFlashdata('error_message', $notification['message']);

            // Redirect back to the same page
            return redirect()->back();
        }
    }
}