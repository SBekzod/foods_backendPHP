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


if (isset($map["firstname"]) && isset($map["lastname"]) && isset($map["email"]) && isset($map["agree"])
    && isset($map["message"])) {

    $sql = "INSERT INTO feedbacks (firstname, lastname, email, agree, message) VALUES (:firstname, :lastname,
 :email, :agree, :message)";
    $result = $connect->prepare($sql);
    $result->execute(array(
        ":firstname" => $map["firstname"],
        ":lastname" => $map["lastname"],
        ":email" => $map["email"],
        ":agree" => $map["agree"],
        ":message" => $map["message"]
    ));
    echo json_encode($map);
}

// End