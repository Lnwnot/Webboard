<?php
    session_start();
    $id = $_POST['id'];
    $name = $_POST['RName'];
    $gender = $_POST['Gender'];
    $mail = $_POST['email'];
    $role = $_POST['Role'];

    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");

    $sql = "UPDATE user SET name='$name',gender='$gender',email='$mail',role='$role' WHERE id='$id'";

    $conn->exec($sql);
    $conn = null;
    $_SESSION['user_edit_save'] = 'done';
    header("location: user.php");
?>