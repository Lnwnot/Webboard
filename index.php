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
            <form>
                หมวดหมู่:
                <select name="" id="">
                <option value="All">--ทั้งหมด--</option>
                <option value="ET">เรื่องทั่วไป</option>
                <option value="STU">เรื่องเรียน</option>
                </select>
            </form>
            <?php
                if(!isset($_SESSION['id'])){
                    echo "<a href='login.php' style='float: right;'>เข้าสู่ระบบ</a>";}
                else{
                    echo "<span style='float: right;'>ผู้ใช้งานระบบ : $_SESSION[username] <a href='logout.php'> ออกจากระบบ</a></span>";
                    echo "<a href ='newpost.php'>สร้างกระทู้ใหม่</a>";}
            ?>
            <u style="list-style: disc;">
            <?php 
                $a = 1;
                while($a < 11){
                    echo "<li><a href='post.php?id=$a'>กระทู้ที่ $a </a>";
                    if(isset($_SESSION['id'])&&$_SESSION['role']=='a'){
                        echo "<a href ='delete.php?id=$a'>ลบ</a>";
                    }
                    echo "</li>";
                    $a++;
                }
            ?>
                
            </u>
    </body>
</html>