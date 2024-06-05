<?php 
require '../config/function.php';

$paraRestultProductId = checkParamId('id');
$paraRestultWarehouseId = checkParamId('w-id');

echo $paraRestultProductId . ''. $paraRestultWarehouseId;
if(is_numeric($paraRestultProductId) && is_numeric($paraRestultWarehouseId)){

    $productId = validate($paraRestultProductId);
    $warehouseId = validate($paraRestultWarehouseId);
     
    $query = "DELETE FROM warehouseproducts WHERE product_id ='$productId' AND warehouse_id = '$warehouseId'";
    $result = mysqli_query($connection, $query);

    if($result){
        redirect('warehouse-management.php?id='.$warehouseId , 'the product deleted successfully');
    }else{
        redirect('warehouse-management.php?id='.$warehouse,'cant delete product');
    }


} else {

    redirect('warehouse-management.php?id='.$warehouseId ,'somthing went wrong');
}