<?php
session_start();
require 'db.php'; // Ensure you have the database connection in this file

// Check if the cart is already created
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Function to add items to the cart
if (isset($_POST['add_to_cart'])) {
    $product_name = $_POST['product_name'];
    $quantity = 1; // default quantity set to 1
    $price = $_POST['price'];

    // Check if the product already exists in the cart
    $found = false;
    foreach ($_SESSION['cart'] as &$product) {
        if ($product['name'] == $product_name) {
            $product['quantity']++;
            $found = true;
            break;
        }
    }
    
    // If the product doesn't exist in the cart, add it
    if (!$found) {
        $_SESSION['cart'][] = array(
            'name' => $product_name,
            'quantity' => $quantity,
            'price' => $price
        );

        // Save to the database
        $stmt = $pdo->prepare("INSERT INTO cart_items (user_id, product_name, quantity, price) VALUES (?, ?, ?, ?)");
        
        // Assuming you have a user ID in the session; you can replace `1` with the actual user ID
        $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1; // Replace with actual user ID

        try {
            $stmt->execute([$user_id, $product_name, $quantity, $price]);
        } catch (PDOException $e) {
            echo "Error saving to database: " . $e->getMessage();
        }
    } else {
        // If the product already exists in the session cart, you might want to update the database as well
        $stmt = $pdo->prepare("UPDATE cart_items SET quantity = quantity + 1 WHERE user_id = ? AND product_name = ?");
        $stmt->execute([$user_id, $product_name]);
    }

    echo "<script>alert('Product added to cart');window.location.href='view_cart.php';</script>";
}
?>
