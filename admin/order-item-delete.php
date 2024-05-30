<?php 
require '../config/function.php';

$paramResult = checkParamId('index');
if(is_numeric($paramResult)){

    $indexValue =validate($paramResult);
    if(isset($_SESSION['productItems']) &&  isset($_SESSION['productItemsId'])){
        unset($_SESSION['productItemsId'][$indexValue]);
        unset($_SESSION['productItems'][$indexValue]);
      
        redirect('orders-create.php','item removed');
    }else{
        redirect('orders-create.php','there is no item');
    }

}else{
    redirect('order-create.php','param not numeric');
}
