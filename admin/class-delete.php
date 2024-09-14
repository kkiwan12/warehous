<?php 
require '../config/function.php';

$paraRestultId = checkParamId('id');

if(is_numeric($paraRestultId)){

    $classId = validate($paraRestultId);
    
    $class = getById('class',$paraRestultId);

    if($class['status'] == 200){
      
        $deletePlayerClassQuery ="DELETE FROM plyerclasses WHERE class_id = $classId";
        $deletePlayerClassResult = mysqli_query($connection ,$deletePlayerClassQuery);
        if($deletePlayerClassResult){
        $classDelete  = delete('class',$classId);

        if($classDelete){
            redirect ('class.php','class Dleleted Successfully');
        }else{
            redirect ('class.php','somting went wrong');
        }
    }else{
        redirect ('class.php','somting went wrong at delete plyers classes');
    }
    }else {
        redirect ('class.php',$class['message']);
    }

}else{
 redirect ('class.php','somting went wrong');
}