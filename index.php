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
            <a href="login.php" style="float: right;">เข้าสู่ระบบ</a>
            <u style="list-style: disc;"">
                <?php 
                $a = 1;
                while($a < 11){
                    echo "<li><a href='post.php?id=$a'>กระทู้ที่ $a</a></li>";
                    $a++;
                }
                ?>
                
            </u>
    </body>
</html>