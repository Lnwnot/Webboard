<a?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webboard KakKak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container-lg">
    <h1 style="text-align: center;" class="mt-3">Webboard KakKak</h1>
    <?php include"nav.php"?>
    <div class="mt-3">
        <label>หมวดหมู่</label>
            <span class="dropdown">
                <button class="btn btn-light dropdown-toggle" btn-sm type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    --ทั้งหมด--
                </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">ทั้งหมด</a></li>
                <li><a class="dropdown-item" href="#">เรื่องทั่วไป</a></li>
                <li><a class="dropdown-item" href="#">เรื่องเรียน</a></li>
            </ul>
        </span> 
        <?php
        if (!isset($_SESSION["id"])){
            echo"<a href='newpost.php' class='btn btn-success btn-sm' 
               style='float: right'>สร้างกระทู้ใหม่</a>";
        echo"<i class='bi bi-plus-lg'></i></a>"; 

        }
        ?> 
    </div>

    <table class = "table table-striped">
        <?php 
            for ($i = 1; $i <= 10 ;$i++ ){
                    echo "<tr><td><a href='post.php?id=$i'>กระทู้ที่ $i</a>";
                if (isset($_SESSION['id']) && $_SESSION['role']=='a'){
                    echo "&nbsp&nbsp;<a href='delete.php?id=$i' 
                    class = 'btn btn-danger-btn-sm me-3' style='float-right'>
                    <i class='bi bi-trash'></i></a>";}
                    echo "</tr></td>";
                }     
            ?>
    </table>
    
    </div>

</body>
</html>