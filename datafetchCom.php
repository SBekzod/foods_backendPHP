<?php
$connect = new PDO("mysql: host=localhost, port=3306; dbname=shamsfods", "root", "root");
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_POST["commenting"] && $_POST["author"]) {
    $sql = "INSERT INTO comments (comment_id, rating, commenting, author)
 VALUES (:comment_id, :rating, :commenting, :author) ";
    $result = $connect->prepare($sql);
    $result->execute(array(
        ":comment_id" => null,
        ":rating" => $_POST["rating"],
        ":commenting" => $_POST["commenting"],
        ":author" => $_POST["author"]
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
<h1> Add Comments<br></h1>
<form method="post">
    <p><label>COMMENTING </label><input type="text" name="commenting"</p>
    <p><label>AUTHOR </label><input type="text" name="author"</p>
    <p><label>RATING </label><input type="number" name="rating"</p>
    <p>
        <input type="submit" value="AddingTwo">
    </p>
</form>
</body>
</html>
