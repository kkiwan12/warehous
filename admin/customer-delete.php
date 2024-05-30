<?php 
require '../config/function.php';

$paraRestultId = checkParamId('id');

if(is_numeric($paraRestultId)){

    $customerId = validate($paraRestultId);
    
    $customer = getById('customers',$paraRestultId);

    if($customer['status'] == 200){
      
        $customerDelete  = delete('customers',$customerId);

        if($customerDelete){
            redirect ('customer.php','customer Dlelted Successfully');
        }else{
            redirect ('customer.php','somting went wrong');
        }

    }else {
        redirect ('customer.php',$customer['message']);
    }

}else{
 redirect ('customer.php','somting went wrong');
}