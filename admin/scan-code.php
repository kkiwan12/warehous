<?php 
include '../config/function.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_siswa']))
    {
        $barcode = validate($_POST['id_siswa']);

        if(is_numeric($barcode)){

      
        
        $query = "SELECT * FROM products 
        INNER JOIN categories ON
        categories.id= products.category_id
        WHERE barcode = '$barcode' LIMIT 1";
        $result = mysqli_query($connection, $query);
        if(mysqli_num_rows($result) > 0 ){

            $row = mysqli_fetch_array($result);
            $product = $row;
            
            echo jsonResponse(200, 'success', 'the product founded  !',$product);

        }else{
            jsonResponse(404,'warning','customer not found');
        }
    }else{
        jsonResponse(500,'warning','somthing went wrong');
    }
    }