<?php 
include '../config/function.php';

if(isset($_POST['savePlayer'])){
   
    
    $first_name = validate($_POST['first_name']);
    $last_name = validate($_POST['last_name']); 
    $birth_day = validate($_POST['birth_day']);
    $customer_id  = validate($_POST['customer_id']);
    $belt = validate($_POST['belt']);

    $fees = validate($_POST['fees']);
    $nots = validate($_POST['nots']);
   
    $location = validate($_POST['location']);
    $bus = isset($_POST['bus']) == true ? 1 : 0;
    $status = isset($_POST['status']) == true ? 1 : 0;
    $gender = validate($_POST['gender']); 

    if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {

        $path = "assets/uploads/players/";

      
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }


        $image_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);


        $fileName = time() . '.' . $image_ext;


        $filePath = $path . $fileName;


        if (move_uploaded_file($_FILES['image']['tmp_name'], $filePath)) {

            $finalImage = $filePath;
        } else {

            $finalImage = '';
        }
    } else {
        $finalImage = '';
    }

    if (isset($_FILES['file']) && $_FILES['file']['size'] > 0) {

        $path = "/assets/uploads/file/";

      
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }


        $image_ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);


        $fileName = time() . '.' . $image_ext;


        $filePath = $path . $fileName;


        if (move_uploaded_file($_FILES['file']['tmp_name'], $filePath)) {

            $finalFile = $filePath;
        } else {

            $finalFile = '';
        }
    } else {
        $finalFile = '';
    }

    $data =  [
        'first_name'=>$first_name,
        'last_name'=>$last_name,
        'image'=>$finalImage,
        'birth_day'=>$birth_day,
        'customer_id '=>$customer_id,
        'belt'=>$belt,
        'bus'=>$bus,
        'location'=>$location,
        'file'=>$finalFile,
        'fees'=>$fees,
        'gender'=>$gender,
        'nots'=>$nots,


    ];

    $result = insert('players',$data);
    if($result){
        redirect('players.php','the player has been added'); 

    }else{
        redirect('players-create.php','cant create player');
    }

}


if(isset($_POST['updatePlayer'])){

    $playerId = validate($_POST['player_id']);

    $productData = getById('players',$playerId);
    if($productData['status'] != 200 ){
        redirect('player-edit.php?id='.$playerId , 'cant find player');
    }

     
    $first_name = validate($_POST['first_name']);
    $last_name = validate($_POST['last_name']); 
    $birth_day = validate($_POST['birth_day']);
    $customer_id  = validate($_POST['customer_id']);
    $belt = validate($_POST['belt']);
  
    $fees = validate($_POST['fees']);
    $nots = validate($_POST['nots']);
   
    $location = validate($_POST['location']);
    $bus = isset($_POST['bus']) == true ? 1 : 0;
    $status = isset($_POST['status']) == true ? 1 : 0;
    $gender = validate($_POST['gender']); 

    if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {

        $path = "assets/uploads/players/";

      
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }


        $image_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);


        $fileName = time() . '.' . $image_ext;


        $filePath = $path . $fileName;


        if (move_uploaded_file($_FILES['image']['tmp_name'], $filePath)) {

            $finalImage = "assets/uploads/players/" . $fileName;
            $deleteImage =  $playerData['data']['image'];
            if (file_exists($deleteImage) && !empty($playerData['data']['image'])) {
                unlink($deleteImage);
            }
        } else {

            $finalImage = $playerData['data']['image'];
        }
    } else {
        $finalImage = $playerData['data']['image'];
    }


    if (isset($_FILES['file']) && $_FILES['file']['size'] > 0) {

        $path = "assets/uploads/file/";

      
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }


        $image_ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);


        $fileName = time() . '.' . $image_ext;


        $filePath = $path . $fileName;


        if (move_uploaded_file($_FILES['file']['tmp_name'], $filePath)) {
            $finalFile = "assets/uploads/file/" . $fileName;
            $deleteFile =   $playerData['data']['file'];
            if (file_exists($deleteFile) && !empty($playerData['data']['file'])) {
                unlink($deleteFile);
             }
        } else {

            $finalFile = $playerData['data']['file'];
        }
    } else {
        $finalFile = $playerData['data']['file'];
    }

    
    $data =  [
        'first_name'=>$first_name,
        'last_name'=>$last_name,
        'image'=>$finalImage,
        'birth_day'=>$birth_day,
        'customer_id '=>$customer_id,
        'belt'=>$belt,
        'bus'=>$bus,
        'location'=>$location,
        'file'=>$finalFile,
        'fees'=>$fees,
        'gender'=>$gender,
        'nots'=>$nots,


    ];
    $result = update('players', $playerId, $data);

    if($result){
        redirect('players.php','player update success');
    }else{
        redirect('players-edit.php?id='.$playerId,'player update success');
    }
}

if(isset($_POST['addClass'])){
    $playerId = validate($_POST['player_id']);
    $classId = validate($_POST['class']);

    $checkClassQuery  = "SELECT * FROM plyerclasses WHERE class_id = $classId AND player_id = $playerId";
    $chackClassResult = mysqli_query($connection ,   $checkClassQuery);
    if($chackClassResult && mysqli_num_rows($chackClassResult) > 0) {
        redirect('players-view.php?id='.$playerId , 'the plyer already in this class');
    }

    $data = [
        'player_id' => $playerId,
        'class_id' => $classId
    ];

    $addClass  = insert('plyerclasses', $data);
    if(!$addClass){

    }else{
        redirect('players-view.php?id='.$playerId,'class added'); 
    }
}

if(isset($_POST['createInvoice'])){

    $pin = validate($_POST['pin']);
    $playerId = validate($_POST['player_id']);
    $description = validate($_POST['description']);
    $started_at = validate($_POST['started_at']);
    $suspended_at = validate($_POST['suspended_at']); 
    $amount = validate($_POST['amount']); 
    $adminId = validate($_POST['admin_id']);

    
    $checkPlayer = "SELECT * FROM players WHERE id = $playerId limit 1";
    $checkPlayerResult = mysqli_query($connection, $checkPlayer );
    if(mysqli_num_rows($checkPlayerResult) > 0){

       if($pin != '' && $description != '' && $started_at != '' && $suspended_at != '' && $amount != ''){

        
        if($started_at >= $suspended_at){
            redirect('players-view.php?id='.$playerId,'check the date format the suspended date should be after the starting');
        }
        $data = [
            'pin' => $pin,
            'player_id'=> $playerId,
            'admin_id'=> $adminId,
            'description' => $description,
            'amount' => $amount,
            'started_at' => $started_at,
             'suspended_at'=>$suspended_at,
    
        ];

        $insertInvoise = insert('invoices', $data);
        if($insertInvoise){

           
            //update the last invoice id 
            
           $playerData = [ 'suspended_at'=>$suspended_at, ];
           $playerUpdate = update('players' , $playerId, $playerData);

           calculateAndUpdateMonthlyIncome();
           if($playerUpdate){
            redirect('players-view.php?id='.$playerId , 'the invoice added successfully');
           }else{
            redirect('players-view.php?id='.$playerId,'somthing failed');
           }

        }else{
            redirect('players-view.php?id='.$playerId,'somthing failed');
        }
       }else{
        redirect('players-view.php?id='.$playerId , 'please fill all the fields');
       }
    }else{
        redirect('players-view.php?id='.$playerId,'the player cannot be found');
    }

}

if(isset($_GET['file'])){

    $file = urldecode($_GET['file']);

    if(file_exists($file)){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        readfile($filePath);
        exit;
    }else{
        echo "file not found";
        exit;
    }
}
