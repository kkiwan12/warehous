<?php 
require '../config/function.php';

$paraRestultId = checkParamId('id');

if(is_numeric($paraRestultId)){

    $categoryId = validate($paraRestultId);
    
    $category = getById('categories',$paraRestultId);

    if($category['status'] == 200){
      
        $categoryDelete  = delete('categories',$categoryId);

        if($categoryDelete){
            redirect ('category.php','category Dleleted Successfully');
        }else{
            redirect ('category.php','somting went wrong');
        }

    }else {
        redirect ('category.php',$category['message']);
    }

}else{
 redirect ('category.php','somting went wrong');
}