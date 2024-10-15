<?php
    session_start();
?>
<?php
if (!isset($_SESSION['id'])) {
    header('location:index.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>
            Web Kak Kak
        </title>
        <style>
        .card {
            max-width: 600px;
            margin: auto;
        }
    </style>
    </head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <body>    
        <h1 style="font-size: H1; text-align: center;">Webboard KakKak</h1>
        <hr>
        <div class="container-lg">
        <?php include "nav.php"; ?>
        <?php
            echo "ผู้ใช้ : ".$_SESSION['username']
        ?>
        <div class="card text-dark bg-white border-info">
            <div class="card-header bg-info text-white">ตั้งกระทู้ใหม่</div>
            <div class="card-body">
                <form action="newpost_save.php" method="post">
                    <div class="row mb-3">
                        <label class="col-lg-3 col-form-label">หมวดหมู่ :</label>
                        <div class="col-lg-9">
                            <select name="category" class="form-select">
                                <?php
                                $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
                                $sql = "SELECT * FROM category";
                                foreach($conn -> query($sql) as $row){
                                    echo "<option value='".$row['id']."'>".$row['name']."</option>";
                                }
                                $conn=null;
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-lg-3 col-form-label">หัวข้อ :</label>
                        <div class="col-lg-9">
                            <input type="text" name="topic" class="form-control" require>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-lg-3 col-form-label">เนื้อหา :</label>
                        <div class="col-lg-9">
                            <textarea name="comment" name="comment" rows="8" class="form-control" required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <center>
                                <button type="submit" class="btn btn-info btn-sm text-white">
                                    <i class="bi bi-caret-right-square me-1"></i>บันทึกข้อความ
                                </button>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </body>
</html>