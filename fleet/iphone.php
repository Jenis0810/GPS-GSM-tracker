<?php
// to connect to the database
include 'db.php';

$sql = "SELECT * FROM tracker ORDER BY ID DESC LIMIT 10"; // to get the last 10 locations
$q = mysqli_query($conn, $sql);
$myArr = array();
while ($row = mysqli_fetch_assoc($q)) {
    $newArr[] = array( // to create an array of the last 10 locations
        'latitude' => $row['latitude'],
        'longitude' => $row['longitude'],
        'tracker_id' => $row['tracker_id'],
        'gsmogps' => $row['gsmogps'],
        'datetime' => $row['datetime']

    );
}

   
    echo json_encode(['code'=>200, 'msg'=>$myArr]); // to return the last 10 locations in json format


?>