<?php
include '../config/function.php';


function plysersChart() {
    global $connection;

    $query = "SELECT DATE_FORMAT(created_at, '%Y-%m') as month, COUNT(*) as count FROM players GROUP BY month ORDER BY month";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        http_response_code(500);
        echo json_encode(['error' => 'Database query failed: ' . mysqli_error($connection)]);
        exit;
    }

    $playerCounts = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $playerCounts[] = $row;
    }

    return json_encode($playerCounts);
}

function genderRatioChart() {
    global $connection;

    $query = "SELECT gender, COUNT(*) as count FROM players GROUP BY gender";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        http_response_code(500);
        echo json_encode(['error' => 'Database query failed: ' . mysqli_error($connection)]);
        exit;
    }

    $genderCounts = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $genderCounts[] = $row;
    }

    return json_encode($genderCounts);
}

function busRatioChart(){
    global $connection;

    $query = "SELECT bus ,COUNT(*) as count FROM players GROUP BY bus";
    $result = mysqli_query($connection, $query);
    if(!$result){
        http_response_code(500);
        echo json_encode(['error'=>'Database query failed: ' . mysqli_error($connection)]);
        exit;
    }

    $busCount = [];
    while ($row = mysqli_fetch_array($result)){
        $busCount[] = $row ;
    }

    return json_encode($busCount);
}

header('Content-Type: application/json');

if (isset($_GET['type']) && $_GET['type'] === 'players') {
    echo plysersChart();
} elseif (isset($_GET['type']) && $_GET['type'] === 'gender') {
    echo genderRatioChart();
}elseif(isset($_GET['type']) && $_GET['type'] === 'bus'){
    echo busRatioChart();
}else {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid request type']);
}
?>
