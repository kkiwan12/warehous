<?php 
require '../config/function.php';

$paraRestultId = checkParamId('id');

if(is_numeric($paraRestultId)){

    $adminId = validate($paraRestultId);
    
    $admin = getById('admins',$paraRestultId);

    if($admin['status'] == 200){
      
        $adminDelete  = delete('admins',$adminId);

        if($adminDelete){
            redirect ('admin.php','Admin Dlelted Successfully');
        }else{
            redirect ('admin.php','somting went wrong');
        }

    }else {
        redirect ('admin.php',$admin['message']);
    }

}else{
 redirect ('admin.php','somting went wrong');
}