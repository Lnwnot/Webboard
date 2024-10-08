<?php
    session_start();
    $login = $_POST['login'];
    $password = sha1($_POST['password']);
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];

    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
    $sql ="SELECT * FROM user where login ='$login'";
    $result=$conn->query($sql);
    if($result->rowCount()==1){
        $_SESSION['add_login']="error";
    }
    else{
        $sql = "INSERT INTO user (login,password,name,gender,email,role)
        VALUES ('$login','$password','$name','$gender','$email','m')";
        $conn->exec($sql);
        $_SESSION['add_login'] = "success";
    }
    $conn = null;
    header("location:register.php");
    die();
?>