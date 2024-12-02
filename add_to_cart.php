<?php
session_start();


if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}


if (isset($_POST['id'], $_POST['title'], $_POST['image'], $_POST['description'], $_POST['price'])) {
    $item = [
        'id' => $_POST['id'],
        'title' => $_POST['title'],
        'image' => $_POST['image'],
        'description' => $_POST['description'],
        'price' => $_POST['price'],
        'quantity' => 1 
    ];

    
    $itemExists = false;
    foreach ($_SESSION['cart'] as &$cartItem) {
        if ($cartItem['id'] === $item['id']) {
            $cartItem['quantity']++;
            $itemExists = true;
            break;
        }
    }

    if (!$itemExists) {
        $_SESSION['cart'][] = $item;
    }

    echo json_encode(['status' => 'success', 'message' => 'Item added to cart']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid item data']);
}
