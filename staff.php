<?php
// dealing with CORS issues
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

// making connection with Mysql database server
$connect = new PDO("mysql: host=localhost, port=3306; dbname=shamsfods", "root", "root");
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT * FROM staff";
$result = $connect->query($sql);

// sending to CLIENT double array in JSON file
$dmap = $result->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($dmap);

// End