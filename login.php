<?php
// dealing with CORS issues
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Headers: Origin,Accept,X-Requested-With,Content-Type,Access-Control-Request-Method,Access-Control-Request-Headers,Authorization');

// making connection with MYSQL database server
$connect = new PDO("mysql: host=localhost, port=3306; dbname=shamsfods", "root", "root");
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//if ($_REQUEST) {
//    echo json_encode($_REQUEST);
//} else
    $map = json_decode(file_get_contents("php://input"), true);

// CLIENT should post both username and password
if (isset($map["username"]) && isset($map["password"])) {
    $sql = "SELECT * FROM users WHERE username LIKE '%{$map['username']}%' and password LIKE '%{$map['password']}%' ";
    $result = $connect->query($sql);

    // Checking whether user exists or not and then sending JSON answer to Client
    if ($list = $result->fetch(PDO::FETCH_ASSOC)) {
        $list["success"] = true;
        echo json_encode($list);
        // if user doesn't exist
    } else {
        $mapAns = array("success" => false, "username" => "No Users");
        echo json_encode($mapAns);
    }

}

// End

