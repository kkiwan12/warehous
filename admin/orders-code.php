<?php

include '../config/function.php';

if (!isset($_SESSION['productItems'])) {
    $_SESSION['productItems'] = [];
}
if (!isset($_SESSION['productItemsId'])) {
    $_SESSION['productItemsId'] = [];
}

if (isset($_POST['addItem'])) {

    $productId = validate($_POST['product_id']);
    $quantity = validate($_POST['quantity']);

    $checkProduct = "SELECT * FROM products WHERE id = '$productId' LIMIT 1";
    $checkResult = mysqli_query($connection, $checkProduct);
    if ($checkProduct) {
        if (mysqli_num_rows($checkResult) > 0) {
            $row = mysqli_fetch_array($checkResult);
            if ($row['quantity'] < $quantity) {
                redirect('orders-create.php', 'Only  ' . $row['quantity'] . '  quantity available');
            }
            $productData = [
                'product_id' => $row['id'],
                'name' => $row['name'],
                'image' => $row['image'],
                'price' => $row['price'],
                'quantity' => $quantity
            ];

            if (!in_array($row['id'], $_SESSION['productItemsId'])) {
                array_push($_SESSION['productItemsId'], $row['id']);
                array_push($_SESSION['productItems'], $productData);
            } else {

                foreach ($_SESSION['productItems'] as $key => $prodSessionItem) {
                    if ($productSessionItem['productId'] == $row['id']) {
                        $newQuantity = $prodSessionItem['quantity'] + $quantity;

                        $productData = [
                            'product_id' => $row['id'],
                            'name' => $row['name'],
                            'image' => $row['image'],
                            'price' => $row['price'],
                            'quantity' => $newQuantity
                        ];
                        $_SESSION['productItems'][$key] = $productData;
                    }
                }
            }

            redirect('orders-create.php', 'item Added  ' . $row['name']);
        } else {
            redirect('orders-create.php', 'No such product');
        }
    } else {
        redirect('orders-creste.php', 'somthing went wrong');
    }
}



if (isset($_POST['quantityIncDec'])) {

    $productId = validate($_POST['product_id']);
    $quantity = validate($_POST['quantity']);

    $flag = false;
    foreach ($_SESSION['productItems'] as $key => $item) {
        $flag = true;
        $_SESSION['productItems'][$key]['quantity'] = $quantity;
    }

    if ($flag) {
        jsonResponse(200, 'success', 'Quantity updated');
    } else {
        jsonResponse(500, 'error', 'please try again');
    }
}

if(isset($_POST['proceedToPlaceId'])){

    $customerId = validate($_POST['customerId']);
    $paymant_mode = validate($_POST['paymant_mode']);

    $checkCustomer = "SELECT * FROM customers WHERE 'id'= '$customerId' LIMIT 1";
    if($checkCustomer){
    $checkCustomerResult = mysqli_query($connection,$checkCustomer);
print_r($checkCustomerResult);
    if(mysqli_num_rows($checkCustomerResult) > 0 ){
        $_SESSION['invoice_no'] = "INV".rand(111111,999999);
        $_SESSION['customerId'] = $customerId;
        $_SESSION['payment_mode'] = $paymant_mode;
        jsonResponse(200,'success','customer  found');
    }else{
        $_SESSION['customerId'] = $customerId;
        jsonResponse(404,'warning','customer not found');
    }
    }else{
        jsonResponse(500,'error','somthing went wrong');
    }
    
}