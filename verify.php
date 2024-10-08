<?php
    session_start();
?>
<?php
if(isset($_SESSION['id'])){
    header('location:index.php');
    die();
}?>
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
            $login = $_POST["username"];
            $password = $_POST["password"];
            $conn=new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
            $sql = "SELECT * FROM user where login = '$login' and password=sha('$password')";
            $result = $conn->query($sql);
            if($result->rowCount()==1){
                $data=$result->fetch(PDO::FETCH_ASSOC);
                $_SESSION['username']=$data['login'];
                $_SESSION['role']=$data['role'];
                $_SESSION['user_id']=$data['id'];
                $_SESSION['id']=session_id();
                header("location:index.php");
                die();
            }
            else{
                $_SESSION['error']="error";
                header("location:login.php");
                die();
            }
            $conn=null;
            ?>
            <BR>
            <a href="index.php">กลับไปยังหน้าหลัก</a>
        </center>
    </body>
</html>