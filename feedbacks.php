<?php
// dealing with CORS issues
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

// making connection with Mysql database server
$connect = new PDO("mysql: host=localhost, port=3306; dbname=shamsfods", "root", "root");
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT * FROM feedbacks";
$result = $connect->query($sql);

// sending to CLIENT the JSON comments
$json_array = array();
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $json_array[] = $row;
}

echo json_encode($json_array);

// End
