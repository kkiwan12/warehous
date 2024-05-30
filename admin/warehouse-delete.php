<?php 
require '../config/function.php';

$paraRestultId = checkParamId('id');

if(is_numeric($paraRestultId)){

    $warehouseId = validate($paraRestultId);
    
    $warehouse = getById('warehouses',$paraRestultId);

    if($warehouse['status'] == 200){
      
        $imagePath = $product['data']['image'];

       
        
        $warehouseDelete  = delete('warehouses',$warehouseId);

        if($warehouseDelete){
            redirect ('warehouse.php','warehouse Deleted Successfully');
        }else{
            redirect ('warehouse.php','somting went wrong');
        }

    }else {
        redirect ('products.php',$warehouse['message']);
    }

}else{
 redirect ('warehouse.php','somting went wrong');
}