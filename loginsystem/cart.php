<?php
session_start();
if (!isset($_SESSION["username"])) {
  echo "<script>alert('Please login');</script>";
  die();
}
require 'db.php';

// Assuming user is logged in and user_id is stored in session
$user_id = $_SESSION['user_id'] ?? 1;

$action = $_POST['action'] ?? '';

if ($action === 'add') {
  $title = $_POST['title'];
  $price = $_POST['price'];
  $imgSrc = $_POST['imgSrc'];

  // Check if the product already exists in the products table
  $stmt = $con->prepare("SELECT product_id FROM products WHERE product_title = ?");
  $stmt->bind_param('s', $title);
  $stmt->execute();
  $result = $stmt->get_result();
  $product = $result->fetch_assoc();

  if (!$product) {
    // Insert product into products table
    $stmt = $con->prepare("INSERT INTO products (product_title, product_price, product_image) VALUES (?, ?, ?)");
    $stmt->bind_param('sds', $title, $price, $imgSrc);
    $stmt->execute();
    $product_id = $stmt->insert_id;
  } else {
    $product_id = $product['product_id'];
  }

  // Check if product already in cart for the user
  $stmt = $con->prepare("SELECT cart_id FROM cart WHERE user_id = ? AND product_id = ?");
  $stmt->bind_param('ii', $user_id, $product_id);
  $stmt->execute();
  $result = $stmt->get_result();
  $cartItem = $result->fetch_assoc();

  if ($cartItem) {
    echo json_encode(['status' => 'error', 'message' => 'Product already in cart']);
  } else {
    // Add product to cart
    $stmt = $con->prepare("INSERT INTO cart (user_id, product_id, cart_qty, cart_price, total_price) VALUES (?, ?, 1, ?, ?)");
    $stmt->bind_param('iids', $user_id, $product_id, $price, $price);
    $stmt->execute();
    echo json_encode(['status' => 'success', 'message' => 'Product added to cart']);
  }
} elseif ($action === 'remove') {
  $title = $_POST['title'];

  $stmt = $con->prepare("SELECT product_id FROM products WHERE product_title = ?");
  $stmt->bind_param('s', $title);
  $stmt->execute();
  $result = $stmt->get_result();
  $product = $result->fetch_assoc();

  if ($product) {
    $stmt = $con->prepare("DELETE FROM cart WHERE user_id = ? AND product_id = ?");
    $stmt->bind_param('ii', $user_id, $product['product_id']);
    $stmt->execute();
    echo json_encode(['status' => 'success', 'message' => 'Product removed from cart']);
  } else {
    echo json_encode(['status' => 'error', 'message' => 'Product not found in cart']);
  }
} elseif ($action === 'update') {
  $title = $_POST['title'];
  $quantity = $_POST['quantity'];

  $stmt = $con->prepare("SELECT product_id, product_price FROM products WHERE product_title = ?");
  $stmt->bind_param('s', $title);
  $stmt->execute();
  $result = $stmt->get_result();
  $product = $result->fetch_assoc();

  if ($product) {
    $total_price = $quantity * $product['product_price'];
    $stmt = $con->prepare("UPDATE cart SET cart_qty = ?, total_price = ? WHERE user_id = ? AND product_id = ?");
    $stmt->bind_param('idii', $quantity, $total_price, $user_id, $product['product_id']);
    $stmt->execute();
    echo json_encode(['status' => 'success', 'message' => 'Cart updated']);
  } else {
    echo json_encode(['status' => 'error', 'message' => 'Product not found in cart']);
  }
} elseif ($action === 'load') {
  $stmt = $con->prepare("SELECT p.product_title AS title, p.product_price AS price, p.product_image AS imgSrc, c.cart_qty, c.total_price FROM cart c JOIN products p ON c.product_id = p.product_id WHERE c.user_id = ?");
  $stmt->bind_param('i', $user_id);
  $stmt->execute();
  $result = $stmt->get_result();
  $cart = $result->fetch_all(MYSQLI_ASSOC);

  echo json_encode(['status' => 'success', 'cart' => $cart]);
} elseif ($action === 'clear') {
  $stmt = $con->prepare("DELETE FROM cart WHERE user_id = ?");
  $stmt->bind_param('i', $user_id);
  $stmt->execute();
  echo json_encode(['status' => 'success', 'message' => 'Cart cleared']);
}
