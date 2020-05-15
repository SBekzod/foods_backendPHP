<?php
// dealing with CORS issues
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Headers: Origin,Accept,X-Requested-With,Content-Type,Access-Control-Request-Method,Access-Control-Request-Headers,Authorization');

// making connection with Mysql database server
$connect = new PDO("mysql: host=localhost, port=3306; dbname=shamsfods", "root", "root");
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$map = json_decode(file_get_contents("php://input"), true);

// Client should post username, password and age
if (isset($map["username"]) && isset($map["password"]) && isset($map["age"])) {
    $sql = "SELECT * FROM users WHERE username LIKE '%{$map['username']}%'";
    $result = $connect->query($sql);

    // checking whether username has been used or not, and sending JSON answer to CLIENT
    if ($result->rowCount()) {
        echo json_encode("Username has been used");
    } else {
        $sql = "INSERT INTO users (username, password, age) VALUES (:username, :password, :age)";
        $result = $connect->prepare($sql);
        $result->execute(array(
            ":username" => $map["username"],
            ":password" => $map["password"],
            ":age" => $map["age"]
        ));
        echo json_encode($map["username"]);
    }

}

// End
