<?php
session_start()
?>
<?php
if(!isset($_SESSION['id'])){
    header('location:index.php');
    die();
}
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
        <?php
            echo "ผู้ใช้ : ".$_SESSION['username']
        ?>
        <form>
            หมวดหมู่:
            <select name="" id="">
            <option value="All">--ทั้งหมด--</option>
            <option value="ET">เรื่องทั่วไป</option>
            <option value="STU">เรื่องเรียน</option>
            </select> <br>
            หัวข้อ : <input type="text"> <br>
            เนื้อหา :<textarea></textarea> <br>
            <input type="button" value="บันทึกข้อความ">
        </form>
    </body>
</html>