<?php
include '../config/function.php';

if(isset($_POST['saveAdmin'])){

    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);  
    $phone = validate($_POST['phone']);
    $is_ban =isset($_POST['is_ban']) == true ? 1:0;


if( $name != '' && $email != '' && $password != ''){

    ##### check the phone number to be more than 10 numbers 
    if (strlen($phone) != 10 || !ctype_digit($phone)) {
        redirect('admins-create.php', 'Phone number must be exactly 10 digits.');
    }

    $emailCheck = mysqli_query($connection ,"SELECT * FROM admins WHERE email = '$email'");
  
    if($emailCheck){
        // check if the email is already used 
        if(mysqli_num_rows($emailCheck) > 0){
          redirect('admins-create.php','email already used by other users');
        }
    }

    if(strlen($password) < 8){
        redirect('admins-create.php','The Password must be at least 8 characters');
    }else{
        $hashPassword = password_hash($password,PASSWORD_BCRYPT);
    }
    // hashing the password
    

    $data =[
        'name'=>$name,
        'email'=>$email,
        'password'=>$hashPassword,
        'phone'=>$phone,
        'is_ban'=>$is_ban,   
    ];
    $result = insert('admins',$data);
    if($result){
      redirect('admin.php','the admin added successfully');
    }else{
        redirect('admins-create.php','somthing went wrong!');
    }

}else{
    redirect('admins-create.php','please fill required fields');
}

}


if(isset($_POST['updateAdmin'])){

    $adminId = validate($_POST['adminId']);

    $adminData = getById('admins', $adminId);
    if($adminData['status'] != 200){
        redirect('admins-edit.php?id='.$adminId,'please fill required fields');
    }
    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);  
    $phone = validate($_POST['phone']);
    $is_ban =isset($_POST['is_ban']) == true ? 1:0;

    if (strlen($phone) != 10 || !ctype_digit($phone)) {
        redirect('admins-edit.php?id='.$adminId, 'Phone number must be exactly 10 digits.');
    }
    $emailCheckQuery = "SELECT * FROM admins WHERE email = '$email' AND id != '$adminId' ";

    $checkResult = mysqli_query($connection,$emailCheckQuery);
    if($checkResult){
        if(mysqli_num_rows($checkResult)> 0){
            redirect('admins-edit.php?id='.$adminId,'The email is already exists');
        }
    }

    if($password != ''){

        if(strlen($password) < 8){
            redirect('admins-edit.php?id='.$adminId,'The Password must be at least 8 characters');
        }else{
            $hashPassword = password_hash($password,PASSWORD_BCRYPT);
        }
     
    }else{
        
        $hashedPassword = $adminData['data']['password'];
    }

    if( $name != '' && $email != '' ){

        $data =[
            'name'=>$name,
            'email'=>$email,
            'password'=>$hashedPassword,
            'phone'=>$phone,
            'is_ban'=>$is_ban,   
        ];
        $result = update('admins',$adminId,$data);
        if($result){
            redirect('admin.php','the admin updated successfully');
          }else{
              redirect('admins-edit.php?id='.$adminId,'somthing went wrong!');
          }
    }else{
     
            redirect('admins-edit.php?id='.$adminId,'please fill required fields');
    }
}



//categories list



if(isset($_POST['savecategory'])){

    $name = validate($_POST['name']);
    $description = validate($_POST['description']); 
    $status =isset($_POST['status']) == true ? 1:0;


    $categoryCheck =mysqli_query($connection,"SELECT * FROM categories WHERE categoryName ='$name'");
    if($name != ''){

    $categoryCheck =mysqli_query($connection,"SELECT * FROM categories WHERE categoryName ='$name'");

    if($categoryCheck){
        if(mysqli_num_rows($categoryCheck) > 0){
            redirect('category-create.php','the category is already exists');
        }
    }
        $data =[
            'categoryName'=>$name, 
            'description'=>$description,
            'status'=>$status
        ];

        $result = insert('categories',$data);

        if($result){
            redirect('category.php','the category added successfully');
          }else{
              redirect('category-create.php','somthing went wrong!');
          }


    }else{
        redirect('category-create.php','please fill required fields');
    }

}

if(isset($_POST['updateCategory'])){

    $categoryId = validate($_POST['categoryId']);

    $categoryData = getById('categories', $categoryId);
   

    if($categoryData['status'] != 200){
        redirect('category-edit.php?id='.$categoryId,'please fill required fields');
    }

    $categoryName = validate($_POST['name']);
    $description = validate($_POST['description']); 
    $status =isset($_POST['status']) == true ? 1:0;

    $categoryCheckQuery ="SELECT * FROM categories WHERE categoryName ='$categoryName' AND id != '$categoryId'";
   $checkResult = mysqli_query($connection,$categoryCheckQuery);
   if($checkResult){
    if(mysqli_num_rows($checkResult)>0){
        redirect('category-edit.php?id='.$categoryId,'the category is already exists');
    }
   }
    
    if($categoryName != ''){

        $date = [
            'categoryName' => $categoryName,
            'description'=>$description,
            'status'=>$status
        ];

        $result = update('categories',$categoryId,$date);
        if($result){
            redirect('category.php','the category updated successfully');
        }else{
            redirect('categorey-edit.php?id='.$categoryId,'somthing went wrong');
        }
    }else{
        redirect('category-edit.php?id='.$categoryId,'please fill required fields');
    }
}


//the product list 

if(isset($_POST['saveProduct'])){

    $category_id =validate($_POST['category_id']);
    $name = validate($_POST['name']);
    $description = validate($_POST['description']);
    $price = validate($_POST['price']);
    $quantity = validate($_POST['quantity']);
    $status =isset($_POST['status']) == true ? 1:0;
    if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
        // Define the directory path for uploads
        $path = "../assets/uploads/products/";
        
        // Create the directory if it does not exist
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        
        // Get the file extension
        $image_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        
        // Generate a unique filename based on the current timestamp
        $fileName = time() . '.' . $image_ext;
        
        // Define the full path for the new file
        $filePath = $path . $fileName;
        
        // Move the uploaded file to the new location
        if (move_uploaded_file($_FILES['image']['tmp_name'], $filePath)) {
            // Store the relative path of the uploaded image in the database
            $finalImage = $filePath;
        } else {
            // Handle the error if the file was not moved successfully
            $finalImage = '';
            // Optionally, log the error or set an error message
            // error_log('File upload error: Unable to move the uploaded file.');
        }
    } else {
        $finalImage = '';
    }

    $data = [
        'category_id'=>$category_id,
        'name'=>$name,
        'description'=>$description,
        'image'=>$finalImage,
        'price'=>$price,
        'quantity'=>$quantity,
        'status'=>$status,
    ];

    $result = insert('products',$data);

    
    if($result){
        redirect('products.php','the product added successfully');
      }else{
          redirect('products-create.php','somthing went wrong!');
      }


}

if(isset($_POST['updateProduct'])){
    
}