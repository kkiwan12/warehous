<?php
include '../config/function.php';

if(isset($_POST['saveClass'])){
    
    $name = validate($_POST['name']);
    $time = validate($_POST['time']);
    $end_at = validate($_POST['end_at']);
    $days = validate($_POST['days']);	
    $status = isset($_POST['status']) == true ? 1 : 0;

    if($name != '' && $time != '' && $days != '' ){
        $classCheck = mysqli_query($connection, "SELECT * FROM class WHERE name ='$name'");

        if ($classCheck) {
            if (mysqli_num_rows($classCheck) > 0) {
                redirect('class-create.php', 'the class is already exists');
            }
        }

        if($time == $end_at){
            redirect('class-create.php', 'the class check the time ');
        }

        $data = [
            'name'=>$name,
            'time'=>$time,
            'end_at'=>$end_at,
            'days'=>$days,
            'status'=>$status
        ];
       
        $result = insert('class',$data);
        if($result){
            redirect('class.php','the class created successfully');
        }else{
            redirect('class-create.php','the something went wrong');
        }
    }else{
        redirect('class-create.php','please fill all fields');
    }
}

if(isset($_POST['updateClass'])){

    $classId = validate($_POST['classId']);
    $classData = getById('class',$classId);

    if($classData['status']!= 200){
        redirect('class-edit.php?id='.$classId,'something wrong');
    }else{
        $name = validate($_POST['name']);
        $time = validate($_POST['time']);
        $end_at = validate($_POST['end_at']);
        $days = validate($_POST['days']);	
        $status = isset($_POST['status']) == true ? 1 : 0;

        $classCheckQuery = "SELECT * FROM class WHERE name ='$name' AND id != '$classId'";
        $checkResult = mysqli_query($connection, $classCheckQuery);
        if ($checkResult) {
            if (mysqli_num_rows($checkResult) > 0) {
                redirect('class-edit.php?id=' . $classId, 'the class  is already exists');
            }
        }

        if($name != '' && $time != '' && $days != '') {

            $data = [
                'name' => $name,
                'time' => $time,
                'end_at'=>$end_at,
                'days' => $days,
                'status'=>$status,
            ];
            $result = update('class',$classId,$data);
            if($result){
                redirect('class.php','class updated successfully');
            }else{
                redirect('class-edit.php?id='.$classId,'somthing went wrong');
            }
        }else{
            redirect('class-edit.php?id=' . $classId , 'please check all fields');
        }
    }
}