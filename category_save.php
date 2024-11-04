<?php
session_start();
$catname = $_POST['CatName'];
$conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
$sql ="SELECT * FROM category";
$result=$conn->query($sql);
$sql = "INSERT INTO category (name)
    VALUES ('$catname')";
$conn->exec($sql);
$_SESSION['add_category'] = "success";
header("location:category.php");
?>
