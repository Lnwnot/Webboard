<?php
session_start()
?>
<?php
if(!isset($_SESSION['id'])||$_SESSION['role']!='a'){
    header('location:index.php');
    die();
}
else{
    $k = $_GET['id'];
    echo "ลบกระทู้หมายเลข $k";
}
?>