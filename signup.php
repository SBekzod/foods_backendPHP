<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Headers: Origin,Accept,X-Requested-With,Content-Type,Access-Control-Request-Method,Access-Control-Request-Headers,Authorization');

if($_REQUEST) {
    echo json_encode($_REQUEST);
} else {
    $data = json_decode(file_get_contents("php://input"), true);

    echo json_encode($data['username']);
}

//$data = json_decode(file_get_contents("php://input"), true);