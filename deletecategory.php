<?php
session_start();
if (isset($_SESSION['id']) && $_SESSION['role']=='a'){
    $conn=new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
    $sql="DELETE FROM category WHERE id=$_GET[id]";
    $conn->exec($sql);
    $conn=null;
    header("location:category.php");
    die();
}
?>