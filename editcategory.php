<?php
session_start();
$catid = $_POST['CatId'];
$catname = $_POST['CatName'];
$conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
$sql ="SELECT * FROM category";
$result=$conn->query($sql);
$sql = "UPDATE category 
    SET name = '$catname'  WHERE id = '$catid'";
$conn->exec($sql);
$_SESSION['edit_category'] = "success";
header("location:category.php");
?>
