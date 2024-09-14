<?php 

include '../config/function.php';

if(isset($_POST['saveSlide'])){

    $tital = validate($_POST['tital']);
    $text = validate($_POST['text']);


    if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
       
        $path = "../assets/uploads/slides/";

       
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
               
          
        }

        $image_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $fileName = time() . '.' . $image_ext;


        $filePath = $path . $fileName;
        
        if (move_uploaded_file($_FILES['image']['tmp_name'], $filePath)) {
            $finalImage = $filePath;
        } else {
            echo "Error moving the uploaded file.";
            echo "<br>Temporary file location: " . $_FILES['image']['tmp_name'];
            echo "<br>Destination file path: " . $filePath;
        }

         
    $data = [
        'image' => $finalImage,
        'title' =>$tital,
        'text'=>$text
    ];
    $result = insert('slider', $data);

    }

  

    if($result){
        redirect('slider.php', 'THE slide added successfully');
    }else{
        redirect('slider.php', 'cant add slide');
    }
}