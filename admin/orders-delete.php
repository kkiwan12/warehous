<?php 
require '../config/function.php';

$paraRestultId = checkParamId('id');
if(is_numeric($paraRestultId)){

    $orderId = validate($paraRestultId);
// repalce the query with delete function in config file
    $orderInfoQuery = "DELETE FROM orderInfo WHERE order_id = $orderId ";
    $orderInfoResult = mysqli_query($connection ,$orderInfoQuery);

    if(!$orderInfoResult){
        redirect('orders.php','failed to delete order information');
    }else{

        $order = getById('orders',$orderId);

        $invoicePath = $order['data']['invoice_path'];
        if (file_exists($invoicePath)) {
            if (!unlink($invoicePath)) {
                throw new Exception('Failed to delete invoice file');
            }
        }

        if($order['status'] == 200){

            $invoicePath = $order['data']['invoice_path'];
        if (file_exists($invoicePath)) {
            if (!unlink($invoicePath)) {
                throw new Exception('Failed to delete invoice file');
            }
        }
        
            $orderDelete = delete('orders',$orderId);

            if($orderDelete){
                redirect('orders.php','the order has been deleted');
            }else{
                redirect('orders.php','something went wrong');
            }
        }else{
            redirect('orders.php','cant delete order');
        }
    }


}