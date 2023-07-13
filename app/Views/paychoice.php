<!DOCTYPE html>
<html>
<head>
    <title>Payment Choice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
        }
        
        h1 {
            color: #333;
        }
        
        button {
            padding: 10px 20px;
            font-size: 16px;
            margin: 10px;
            background-color: lightsteelblue;
            color: black;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }
        
        button:hover {
            background-color: blue;
        }
    </style>
</head>
<body>
    <h1>Select Payment Option</h1>
    
    <button onclick="payWithCard()">Card</button>
    <button onclick="payWithMPESA()">MPESA</button>
    
    <script>
        function payWithCard() {
            // Redirect to paymentform.php
            window.location.href = 'PaymentController';
        }
        
        function payWithMPESA() {
            // Redirect to MpesaForm.php
            window.location.href = 'MpesaForm';
        }
    </script>
</body>
</html>

