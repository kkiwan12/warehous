<?php
    require '../config/function.php';

$paraRestultClassId = checkParamId('class_id');
$paraRestultPlayerId = checkParamId('player_id');

$classId = validate($paraRestultClassId);
$playerId = validate($paraRestultPlayerId);

if(is_numeric($playerId) && is_numeric($classId)){

    $query = "DELETE FROM plyerclasses WHERE class_id ='$classId' AND player_id ='$playerId'";
    $result = mysqli_query($connection, $query);
    if($result){
        redirect('players-view.php?id='.$playerId ,'the player removed from the class successfully');
    }else{
        redirect('players-view.php?id='.$playerId ,'somthing failed');
    }
}