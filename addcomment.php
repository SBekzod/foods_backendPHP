<?php
// dealing with CORS issues
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Headers: Origin,Accept,X-Requested-With,Content-Type,Access-Control-Request-Method,Access-Control-Request-Headers,Authorization');

// making connection with Mysql database server
$connect = new PDO("mysql: host=localhost, port=3306; dbname=shamsfods", "root", "root");
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$map = json_decode(file_get_contents("php://input"), true);
//$map = array("author" => "Bekzod", "rating" => "5", "comment" => "that is great meal");


if (isset($map["author"]) && isset($map["rating"]) && isset($map["commenting"])) {

    $sql = "INSERT INTO comments (author, rating, commenting) VALUES (:author, :rating, :commenting)";
    $result = $connect->prepare($sql);
    $result->execute(array(
        ":author" => $map["author"],
        ":rating" => $map["rating"],
        ":commenting" => $map["commenting"]
    ));
    echo json_encode($map);
}

// End