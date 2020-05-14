<?php
$connect = new PDO("mysql: host=localhost, port=3306; dbname=shamsfods", "root", "root");
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_POST["name"] && $_POST["image"]) {
    $sql = "INSERT INTO dishes (dishes_id, name, image, price, description, commenting)
 VALUES (:dishes_id, :name, :image, :price, :description, :commenting) ";
    $result = $connect->prepare($sql);
    $result->execute(array(
        ":dishes_id" => null,
        ":name" => $_POST["name"],
        ":image" => $_POST["image"],
        ":price" => $_POST["price"],
        ":description" => $_POST["description"],
        ":commenting" => $_POST["commenting"]
    ));
}
print_r($_POST);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Fetching the data to MySQL database</title>
</head>

<body>
<h1> Add new dish information<br></h1>
<form method="post">
    <p><label>NAME </label><input type="text" name="name"</p>
    <p><label>IMAGE </label><input type="text" name="image"</p>
    <p><label>DESCRIPTION </label><input type="text" name="description"</p>
    <p><label>COMMENTING </label><input type="text" name="commenting"</p>
    <p><label>NUMBER </label><input type="number" name="price"</p>
    <p>
        <input type="submit" value="Adding">
    </p>
</form>
</body>
</html>


