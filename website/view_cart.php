<?php
session_start();
require 'db.php'; // Include your database connection file

// Check if user_id is set in the session
if (!isset($_SESSION['user_id'])) {
    echo "<h2>You must be logged in to view your cart.</h2>";
    header("Location: login.php"); // Redirect to login page
    exit;
}

// Get the user ID from the session
$user_id = $_SESSION['user_id']; // Ensure this is set during user login

// Handling update and delete actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update'])) {
        $item_id = $_POST['update'];
        $new_quantity = $_POST['quantity'][$item_id];

        // Update the quantity in the database
        if ($new_quantity > 0) {
            $update_stmt = $pdo->prepare("UPDATE cart_items SET quantity = ? WHERE id = ? AND user_id = ?");
            $update_stmt->execute([$new_quantity, $item_id, $user_id]);
        }
    } elseif (isset($_POST['delete'])) {
        $item_id = $_POST['delete'];
        // Delete the item from the database
        $delete_stmt = $pdo->prepare("DELETE FROM cart_items WHERE id = ? AND user_id = ?");
        $delete_stmt->execute([$item_id, $user_id]);
    }

    // Redirect to the same page to refresh the cart
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Fetch cart items from the database
$stmt = $pdo->prepare("SELECT * FROM cart_items WHERE user_id = ?");
$stmt->execute([$user_id]);
$cart_items = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (empty($cart_items)) {
    echo "<h2>Your cart is empty</h2>";
} else {
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Shopping Cart</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                padding: 20px;
                text-align: center;
            }
            table {
                width: 60%;
                margin: 20px auto;
                border-collapse: collapse;
                background-color: #fff;
            }
            th, td {
                padding: 15px;
                border: 1px solid #ddd;
                text-align: center;
            }
            th {
                background-color: #3498db;
                color: white;
            }
            tr:nth-child(even) {
                background-color: #f2f2f2;
            }
            h2 {
                color: #333;
            }
            .total-row {
                font-weight: bold;
                background-color: #f9f9f9;
            }
            button {
                padding: 5px 10px;
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <h2>Your Shopping Cart</h2>
        <form method='POST'>
            <table>
                <tr><th>Product</th><th>Quantity</th><th>Price</th><th>Total</th><th>Actions</th></tr>";

    $total_price = 0;

    foreach ($cart_items as $item) {
        $item_total = $item['quantity'] * $item['price'];
        $total_price += $item_total;

        echo "<tr>";
        echo "<td>{$item['product_name']}</td>";
        echo "<td>
                <input type='number' name='quantity[{$item['id']}]' value='{$item['quantity']}' min='1'>
              </td>";
        echo "<td>\${$item['price']}</td>";
        echo "<td>\${$item_total}</td>";
        echo "<td>
                <button type='submit' name='update' value='{$item['id']}'>Update</button>
                <button type='submit' name='delete' value='{$item['id']}'>Delete</button>
              </td>";
        echo "</tr>";
    }

    echo "<tr class='total-row'><td colspan='3'>Total Price</td><td>\${$total_price}</td></tr>";
    echo "</table></form>";
    
    echo "</body></html>";
}
?>
