<?php 
require '../config/function.php';

$paraRestultId = checkParamId('id');

if(is_numeric($paraRestultId)){

    $productId = validate($paraRestultId);
    
    $product = getById('products',$paraRestultId);

    if($product['status'] == 200){
      
        $imagePath = $product['data']['image'];

        if (!empty($imagePath) && file_exists($imagePath)) {
            unlink($imagePath);
        }
        
        $productDelete  = delete('products',$productId);

        if($productDelete){
            redirect ('products.php','product Deleted Successfully');
        }else{
            redirect ('products.php','somting went wrong');
        }

    }else {
        redirect ('products.php',$product['message']);
    }

}else{
 redirect ('products.php','somting went wrong');
}