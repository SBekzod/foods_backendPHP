<?php

$connect = new PDO("mysql: host=localhost, port=3306; dbname=shamsfods", "root", "root");
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * FROM dishes";
$result = $connect->query($sql);

$json_array = array();
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $json_array[] = $row;
}

echo json_encode($json_array);

?>

