<?php 
require 'config/function.php';


if(isset($_POST['login'])){

    $email= validate($_POST['email']);
    $password = validate($_POST['password']);

    if($email != '' && $password != ''){

        $query = "SELECT * FROM admins WHERE email = '$email' LIMIT 1";
        $result =mysqli_query($connection, $query);
        if($result){

            if(mysqli_num_rows($result) > 0 ){
 
                $row =mysqli_fetch_assoc($result);
                $hasedPassword =$row['password'];

                if(!password_verify($password,$hasedPassword)){
                    redirect('login.php','invalid password');
                }
                if($row['is_ban'] == 1){
                    redirect('login.php','this acount has been banned');
                }

                $_SESSION['loggedIn'] = true;
                $_SESSION['loggedInUser'] = [
                    'user_id'=>$row['id'],
                    'name'=>$row['name'],
                    'email'=>$row['email'],
                    'phone'=>$row['phone'],
                ];

                redirect('admin/index.php','logged in success');

            }else{
                redirect('login.php' , 'the email is not exist');
            }
        }else{
            redirect('login.php','somthing went wrong');
        }
    }else{
        redirect('login.php','please enter your email address and password');
    }
}