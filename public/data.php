<?php

//variables here:
// $all_products, $all_categories, $all_orders, $all_users

// functions
// getOrderDetailsByOrderID($order_id)



 
//sql connection

$servername = "/run/mysql/mysql.sock";
$username = "root";
$password = "root";
$dbname = "db_store";

// Create connection
$conn = new mysqli(null, $username, $password, $dbname, 8080, $servername);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$all_products = array();

$sql = "SELECT * FROM product";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $all_products[] = $row;
    }
} else {
    // echo "0 results";
}

$all_categories = array();
$sql = "SELECT * FROM category";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $all_categories[] = $row;
    }
} else {
    // echo "0 results";
}

$all_orders = array();
$sql = "SELECT * FROM orders";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $all_orders[] = $row;
    }
} else {
    // echo "0 results";
}

$all_users = array();
$sql = "SELECT * FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $all_users[] = $row;
    }
} else {
    // echo "0 results";
}

function getAllOrderDetailsByOrderID($order_id, $conn){
    $sql = "SELECT * FROM order_detail WHERE order_id = $order_id";
    $result = $conn->query($sql);
    $orders_details = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $orders_details[] = $row;
        }
    } else {
        // echo "0 results";
    }
    return $orders_details;
}

function getProductById($id, $conn){
    $sql = "SELECT * FROM product WHERE product_id = $id";
    $result = $conn->query($sql);
    $products = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    } else {
        // echo "0 results";
    }
    foreach($products as $product){
        return $product;
    }
}

function getOrderByOrderID($order_id, $conn){
    $sql = "SELECT * FROM orders WHERE order_id = $order_id";
    $result = $conn->query($sql);
    $orders = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $orders[] = $row;
        }
    } else {
        // echo "0 results";
    }
    foreach($orders as $order){
        return $order;
    }
}

function getUsernameByUserID($user_id, $conn){
    $sql = "SELECT * FROM user WHERE user_id = $user_id";
    $result = $conn->query($sql);
    $users = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
    } else {
        echo "0 results";
    }
    foreach($users as $user){
        return $user['user_name'];
    }
}

function newOrder($carrinho, $total_compra, $user, $conn){
    $sql = "INSERT INTO orders (amount, user_id) VALUES (". $total_compra .",". $user['user_id'] .")";
    $result = $conn->query($sql);
    $order_id = mysqli_insert_id($conn);
    foreach($carrinho as $item){
        $product_id = $item['product_id'];
        $product_quantity = $item['product_quantity'];
        $sql = "INSERT INTO order_detail (order_id, product_id, order_detail_quantity) VALUES (\"". intval($order_id) ."\",\"". $product_id ."\",\"". $product_quantity ."\")";
        $conn->query($sql);
    }
}
?>