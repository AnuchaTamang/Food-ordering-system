<?php
session_start();
require 'db.php';

if (!isset($_SESSION["username"])) {
    echo json_encode(['status' => 'error', 'message' => 'Please login']);
    exit();
}

// Assuming user is logged in and user_id is stored in session
$user_id = $_SESSION['user_id'] ?? 1;

// Get the order ID from the PayPal button client-side code
$data = json_decode(file_get_contents('php://input'), true);
$orderID = $data['orderID'] ?? '';

if (empty($orderID)) {
    echo json_encode(['status' => 'error', 'message' => 'Order ID not provided']);
    exit();
}

// Call PayPal API to capture the payment
$client_id = 'AUwOB9vvcoLkWqyeitomqk_WfuNxUL6Mfl5ts2eHDFqj07Oh5syeOOoxomeBqRxg3t0SwvK2LHG2NCQ-';
$secret = 'EHQup5DOE_9BVZuN7-bWPdSgyC8ACBOPeAoesjpjGyKiARGsAFrZOhurBRfsJpbrN8F3eJ397b_AFlEe';

// Get an access token from PayPal
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.sandbox.paypal.com/v1/oauth2/token");
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERPWD, $client_id . ":" . $secret);
curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
$response = curl_exec($ch);
if (empty($response)) {
    curl_close($ch);
    echo json_encode(['status' => 'error', 'message' => 'Unable to get access token']);
    exit();
}

$jsonData = json_decode($response);
$accessToken = $jsonData->access_token;
curl_close($ch);

// Capture the payment
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.sandbox.paypal.com/v2/checkout/orders/$orderID/capture");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "Authorization: Bearer $accessToken"
]);
$response = curl_exec($ch);
$jsonData = json_decode($response);

if ($jsonData->status === 'COMPLETED') {
    // Handle successful payment
    // Process the cart operations here (e.g., clear cart, save order to database)

    echo json_encode(['status' => 'success', 'message' => 'Payment completed']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Payment failed']);
}
curl_close($ch);
?>