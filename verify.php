<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>
            Web Kak Kak
        </title>
    </head>
    <body>
        <h1 style="font-size: H1; text-align: center;">Webboard KakKak</h1>
        <hr>
        <center>
            <?php 
            $username = $_POST["username"];
            $password = $_POST["password"];
            if($username == "admin" && $password == "ad1234"){
                $_SESSION["username"]="admin";
                $_SESSION["role"]="a";
                $_SESSION["id"]=session_id();
                echo "ยินดีต้อนรับคุณ ADMIN";
            }
            else if($username == "member" && $password == "mem1234"){
                $_SESSION["username"]="member";
                $_SESSION["role"]="m";
                $_SESSION["id"]=session_id();
                echo "ยินดีต้อนรับคุณ MEMBER";
            }
            else
                echo "ชื่อบัญชีหรือรหัสผ่านไม่ถูกต้อง";
            ?>
            <BR>
            <a href="index.php">กลับไปยังหน้าหลัก</a>
        </center>
    </body>
</html>