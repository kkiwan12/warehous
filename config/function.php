<?php
require 'database.php';

//to validate the input data
function validate($inputdata){
    global $connection;
    $validatedData =mysqli_real_escape_string($connection,$inputdata);
    return trim($validatedData);
}

//to move from page to another
function redirect($url,$status){

    $_SESSION['status'] =$status;
    header('Location:'.$url);
    exit(0);
}

//to display the message and status code
function alertMessage(){
    if(isset($_SESSION['status'])){
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
       '.$_SESSION['status'].'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
        unset($_SESSION['status']);
    }

}

function logoutSession(){

    unset($_SESSION['loggedIn']);
    unset($_SESSION['loggedInUser']);
    session_destroy();
}

//insert record into database
function insert($tableName , $data){
    global $connection;

    $table = validate($tableName);
    $columns =array_keys($data);
    $values =array_values($data);

    $escapedValues = array_map(function($value) use ($connection) {
        return "'" . mysqli_real_escape_string($connection, $value) . "'";
    }, $values);


    $finalColumn =implode(',',$columns);
    $finalValue = implode(',',$escapedValues );

     $query = "INSERT INTO $table ($finalColumn) VALUES ($finalValue)";
     $result = mysqli_query($connection,$query); 
    

    if (!$result) {
        echo "Error: " . mysqli_error($connection) . "<br>";
        echo "Query: " . $query . "<br>";
    }

    return $result;
    return $result;
}

function getAll($tableName, $status = null) {
    global $connection;
    
    // Validate table name
    $table = validate($tableName);
    

    $status = $status !== null ? validate($status) : $status;

    if ($status === 'status') {
        $query = "SELECT * FROM `$table` WHERE status='0'";
    } else {
        $query = "SELECT * FROM `$table`";
    }
    

    $result = mysqli_query($connection, $query);
    
 
    if (!$result) {
      
        echo "Error: " . mysqli_error($connection) . "<br>";
        echo "Query: " . $query . "<br>";
        return null;
    }
    
   
    return $result;
}

function getById($tableName, $id) {
    global $connection;


    $table = validate($tableName);
    $id = validate($id);

    $query = "SELECT * FROM `$table` WHERE `id` = '$id' LIMIT 1";
    $result = mysqli_query($connection, $query);


    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $response = [
                'status' => 200,
                'data' => $row,
                'message' => 'Record found'
            ];
            return $response;
        } else {
            $response = [
                'status' => 404,
                'message' => 'No data found'
            ];
            return $response;
        }
    } else {

        echo "Error: " . mysqli_error($connection) . "<br>";
        echo "Query: " . $query . "<br>";
        $response = [
            'status' => 500,
            'message' => 'Something went wrong'
        ];
        return $response;
    }
}

//update record in the database
function update($tableName,$id,$data){
    global $connection;
    $table = validate($tableName);
    $id =validate($id);
    
    $updateDataString = "";

    foreach($data as $column => $value){
 
        $updateDataString.=$column.'='."'$value',";

    }

    $finalUpdateData =substr(trim($updateDataString),0,-1);

    $query = "UPDATE $table SET $finalUpdateData WHERE id='$id'";
    $result = mysqli_query($connection,$query);

    return $result;
}

function delete($tableName , $id){

    global $connection;
    $table = validate($tableName);
    $id = validate($id);

    $query ="DELETE FROM $table WHERE id ='$id' LIMIT 1";
    $result = mysqli_query($connection,$query);

    return $result;
}

function checkParamId($type){

    if(isset($_GET[$type])){

        if($_GET[$type] != ''){

            return $_GET[$type];
        }else{
          return '<h5>No Id found</h5>';
        }
    }else{
        return '<h5>No Id Given</h5>';
    }
}

function countRecords($tableName){

    global $connection;
    
    $table = validate($tableName);

    $query = "SELECT COUNT(*) AS total FROM `$table`";
    $result = mysqli_query($connection, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    } else {
        echo "Error: " . mysqli_error($connection);
        return '<h5>No records found</h5>';
    }


}

function getByCategory($categoryId) {
    global $connection;
    $categoryId = validate($categoryId);
    $query = "SELECT * FROM `products` WHERE `category_id` = '$categoryId'";
    return mysqli_query($connection, $query);
}

function getWarehouseProducts($id){
    global $connection ;
  
    $id = validate($id);

    $query = "SELECT p.id,p.image,p.price, p.name, wp.quantity FROM warehouseproducts wp
     INNER JOIN products p ON wp.product_id = p.id WHERE wp.warehouse_id = '$id'";
     return mysqli_query($connection, $query);
}



function jsonResponse($status,$status_type,$message){
    $response = [ 
        'status' => $status,
        'status_type'=> $status_type,
        'message' => $message
    ];
    echo json_encode($response);
    return;
}