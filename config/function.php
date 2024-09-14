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

function hasRecord($tableName){
    global $connection;

    $query ="SELECT COUNT(*) AS count FROM $tableName ";
    $result= mysqli_query($connection,$query);

    if($result){
        $row = mysqli_fetch_array($result);
        return $row['count'] > 0;
    }else{
        echo "Query Error: " . mysqli_error($connection);
        return false;
    }
}


function deleteInvoicesByPlayerId( $id){
    global $connection;
  
    $id  = validate($id);
    $query = "DELETE FROM invoices WHERE player_id = '$id'";
    $result = mysqli_query($connection,$query);

    return $result;
};

function deletePlayerFromeClass($id){

    global $connection;

    $query = "DELETE FROM plyerclasses WHERE player_id = '$id'";
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

function getPlayersByClass($classId){
    global $connection;
    $classId = validate($classId);
    $query = "     SELECT players.*
        FROM players
        INNER JOIN plyerclasses ON players.id = plyerclasses.player_id
        WHERE plyerclasses.class_id = '$classId'
        ";
    return mysqli_query($connection, $query);
}


function countOfPlayersInClass($classId){
    global $connection ;
    $classId = validate($classId);
    $query = " SELECT COUNT(*) AS count FROM plyerclasses WHERE class_id = '$classId'";
    $result = mysqli_query($connection ,$query);
if($result){
    $row = mysqli_fetch_assoc($result);
    return $row['count'];
}else{
    return 0;
}
}
function getWarehouseProducts($id){
    global $connection ;
  
    $id = validate($id);

    $query = "SELECT p.id,p.image,p.price, p.name, wp.quantity FROM warehouseproducts wp
     INNER JOIN products p ON wp.product_id = p.id WHERE wp.warehouse_id = '$id'";
     return mysqli_query($connection, $query);
}

function countProductsInWarehouse( $warehouseId) {
    global $connection;
    $query = "SELECT COUNT(*) AS product_count
              FROM warehouseProducts
              WHERE warehouse_id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'i', $warehouseId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $productCount);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
    return $productCount;
}



function jsonResponse($status,$status_type,$message,$data =null){
    $response = [ 
        'status' => $status,
        'status_type'=> $status_type,
        'message' => $message,
        'data'=>$data
    ];
    echo json_encode($response);
    return;
}


function availableChecks($tableName,$id){
    global $connection ;
    $table = validate($tableName);
    $id = validate($id);

    $query = "SELECT * FROM $table WHERE $id = '$id' AND status = 0 limit 1";
    $result = mysqli_query($connection , $query);
    if(mysqli_num_rows($result) > 0 ){
        return $result;
    }else{
        echo "Error: " . mysqli_error($connection);
        return '<h5>No records found</h5>';
    }

}

function getPlayerInvoices($id){
    global $connection;
    
    $query = "SELECT * FROM invoices WHERE player_id = $id";
    $result = mysqli_query($connection, $query);
    if(mysqli_num_rows($result) > 0){
        return $result;
    }else{
        return false;
    }
}
function getLatestRecordById($tableName){
    global $connection ;
    $table = validate($tableName);
    $query =  "SELECT * FROM $table ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($connection, $query);
    if($result && mysqli_num_rows($result) > 0){
        return mysqli_fetch_assoc($result);
    }else{
        return null;
    }
}
function checkAndUpdatePlayerStatus() {
    global $connection;
    
    // Get all records from the players table
    $query = "SELECT id, suspended_at, status FROM players";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
  
        $currentDate = date('Y-m-d');

        while ($row = mysqli_fetch_assoc($result)) {
         
            $playerId = $row['id'];
            if (!empty($row['suspended_at']) && $row['suspended_at'] < $currentDate) {
              
                
                $updateQuery = "UPDATE players SET status = 1 WHERE id = '$playerId'";
                mysqli_query($connection, $updateQuery);
            }elseif($row['suspended_at'] > $currentDate){
                $updateQuery = "UPDATE players SET status = 0 WHERE id = '$playerId'";
                mysqli_query($connection, $updateQuery);
            }
        }
    }
}

function eventControll (){

    global $connection ;

    $query = "SELECT id , date FROM events";
    $result = mysqli_query($connection, $query);
    if($result && mysqli_num_rows($result) > 0) {
     
        while($row = mysqli_fetch_array($result)){
            $eventId = $row['id'];
            $currentDate = date('Y-m-d');
            if(!empty($row['date']) && $row['date'] <= $currentDate){
                $deleteQuery = "DELETE FROM events WHERE id = '$eventId' LIMIT 1";
                mysqli_query($connection,$deleteQuery);
            }

        }
    }
}

function getSuspendedPlayers()
{
    global $connection;
    $query = "SELECT * FROM players WHERE status = 1 ";
    $result = mysqli_query($connection,$query);
    return $result;
}

function getPlayerClasses($playerId){

    global $connection;

    $playerId = validate($playerId);

    $query = "SELECT c.* FROM class c
    JOIN plyerclasses pc ON c.id = pc.class_id 
    WHERE pc.player_id = '$playerId'";
   
   $result = mysqli_query($connection,$query);

   $classes = [];
   if($result && mysqli_num_rows($result) > 0 ){
    while($row = mysqli_fetch_array($result)){
        $classes[] =$row;
    }
   }
return $classes;
}

function calculateAndUpdateMonthlyIncome() {
    global $connection;

    $currentMonth = date('Y-m');

  
    $totalProfitQuery = "
        SELECT SUM(total_profit) AS total_profit 
        FROM orders  
        WHERE DATE_FORMAT(created_at, '%Y-%m') = '$currentMonth'
    ";
    $totalProfitResult = mysqli_query($connection, $totalProfitQuery);
    if (!$totalProfitResult) {
        echo "Query Error: " . mysqli_error($connection);
        return;
    }
    $totalProfitRow = mysqli_fetch_assoc($totalProfitResult);
    $totalProfit = $totalProfitRow['total_profit'] ?? 0;

    $totalFeesQuery = "
        SELECT SUM(amount) AS total_fees 
        FROM invoices 
        WHERE DATE_FORMAT(created_at, '%Y-%m') = '$currentMonth'
    ";
    $totalFeesResult = mysqli_query($connection, $totalFeesQuery);
    if (!$totalFeesResult) {
        echo "Query Error: " . mysqli_error($connection);
        return;
    }
    $totalFeesRow = mysqli_fetch_assoc($totalFeesResult);
    $totalFees = $totalFeesRow['total_fees'] ?? 0;


    $totalIncome = $totalFees + $totalProfit;

   
    $checkIncomeQuery = "
        SELECT * 
        FROM income 
        WHERE month = '$currentMonth'
    ";
    $checkIncomeResult = mysqli_query($connection, $checkIncomeQuery);
    if (!$checkIncomeResult) {
        echo "Query Error: " . mysqli_error($connection);
        return;
    }

    if (mysqli_num_rows($checkIncomeResult) > 0) {
     
        $updateIncomeQuery = "
            UPDATE income 
            SET total_profit = $totalProfit, total_fees = $totalFees, total_income = $totalIncome 
            WHERE month = '$currentMonth'
        ";
        $updateIncomeResult = mysqli_query($connection, $updateIncomeQuery);
        if (!$updateIncomeResult) {
            echo "Update Error: " . mysqli_error($connection);
        } else {
            echo "Income updated successfully for month: $currentMonth";
        }
    } else {

        $insertIncomeQuery = "
            INSERT INTO income (month, total_profit, total_fees, total_income) 
            VALUES ('$currentMonth', $totalProfit, $totalFees, $totalIncome)
        ";
        $insertIncomeResult = mysqli_query($connection, $insertIncomeQuery);
        if (!$insertIncomeResult) {
            echo "Insert Error: " . mysqli_error($connection);
        } else {
            echo "Income inserted successfully for month: $currentMonth";
        }
    }
}

function totalIncome(){
    global $connection;

    $currentYear = date('Y');
    $totalIncomeQuery  = "SELECT  SUM(total_income) as incomes
    FROM income WHERE YEAR(month) = '$currentYear'";

    $totalIncomeREsult = mysqli_query($connection, $totalIncomeQuery);
    if($totalIncomeREsult){
    $totalFeesRow = mysqli_fetch_array($totalIncomeREsult);
    $totalIncome = $totalFeesRow['incomes'];
    return $totalIncome;
    }else{
        echo "Query Error: " . mysqli_error($connection);
        return 0;
    }
}

?>