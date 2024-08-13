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
            $k = $_GET['id'];
            echo "ต้องการดูกระทู้หมายเลข ".$k ."<BR>";
            if($k%2 == 0)
                echo "เป็นกระทู้หมายเลขคู๋";
            else
                echo "เป็นกระทู้หมายเลขคี่";
            ?>
        <form>
            <table style="border: 2px black solid;">
            <tr>
                <td style="background-color: #6CD2FE;" colspan="2">แสดงความคิดเห็น</td>
            </tr>
            <tr>
                <td><textarea></textarea></td>
            </tr>
            <tr>
                <td style="text-align:center"><input type="button" value="ส่งข้อความ"></td>
            </tr>
            </table>
        </form>
        </center>
    </body>
</html>