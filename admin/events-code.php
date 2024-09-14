<?php
  include '../config/function.php';

  if(isset($_POST['saveEvent'])){
 
    $name = validate($_POST['name']);
    $info = validate($_POST['info']);
    $time = validate($_POST['time']);
    $fees = validate($_POST['fees']);
    $date = validate($_POST['date']);

    if($name == '' && $info == ''){
        redirect('events-create.php','please fill the fields');
    }else{

        $data = [
            'name' => $name,
            'info' => $info,
            'fees' => $fees,
            'date' => $date,
            'time' => $time
        ];

     $addEvent = insert('events',$data);
     if($addEvent){
        redirect('events.php','the event has been created successfully');
     }else{
        redirect('events-create.php','somthing failed');
     }
    }
  }