<?php
session_start();
$cat = $_POST['catagory'];
$title = $_POST['topic'];
$content = $_POST['comment'];
$id = $_SESSION['user_id'];

$conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
$sql = "INSERT INTO post (title,content,post_date,cat_id,user_id)
        VALUES ('$title','$content',NOW(),'$cat','$id')";
$conn->exec($sql);
$conn = null;
header("location:index.php");
?>