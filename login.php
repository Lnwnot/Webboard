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
        <form action="verify.php" method="post">
        <table align="center" style="border: 2px solid black; width: 40%;">
            <tr bgcolor="#6cd2fe"><td colspan="2" align="center">เข้าสู่ระบบ</td></tr>
            <tr><td>Login</td><td><input type="text" name="username"></td></tr>
            <tr><td>Password</td><td><input type="password" name="password"></td></tr>
            <tr><td colspan="2" align="center"><input type="submit" value="Login"></td></tr>
        </table>
        </form>
        <center>ถ้ายังไม่ได้สมัครสมาชิก <a href="register.php">กรุณาสมัครสมาชิก</a></center>
    </body>
</html>