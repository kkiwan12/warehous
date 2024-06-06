<?php 
require '../config/function.php';

$paraRestultId = checkParamId('id');
if (is_numeric($paraRestultId)){

    $orderId = validate($paraRestultId);

    //check order status 
    $orderStatus = availableChecks('orders',$orderId);

    if($orderStatus){

        $query = "UPDATE orders set status = 1 WHERE id = $orderId";
        $result = mysqli_query($connection , $query);
        if($result){

            redirect('orders.php','the order number '.$orderId.' has been delivered');

        }else{

            redirect('orders.php','somthing went wrong');

        }
    }else{
        redirect('orders.php','the order number '.$orderId.'  in already delivered');
    }

    
}