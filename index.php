<?php
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
    <script>
        function myFunction(event, postId) {
            r = confirm("ต้องการลบจริงหรือไม่");
            return r;
        }
    </script>
</head>
<body>
    <div class="container-lg">
        <h1 class="text-center mt-3">Webboard KakKak</h1>
        <?php include "nav.php"; ?>
        <div class="mt-3">
            <label>หมวดหมู่</label>
            <span class="dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    --ทั้งหมด--
                </button>
                <ul class="dropdown-menu" aria-labelledby="Button2">
                    <li><a href="#" class="dropdown-item">ทั้งหมด</a></li>
                    <?php
                    try {
                        $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $sql = "SELECT * FROM category";
                        $stmt = $conn->query($sql);
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<li><a class='dropdown-item' href='#'>" . htmlspecialchars($row['name']) . "</a></li>";
                        }
                    } catch (PDOException $e) {
                        echo "Error: " . htmlspecialchars($e->getMessage());
                    }
                    ?>
                </ul>
            </span>
            <?php if (isset($_SESSION["id"])): ?>
                <a href='newpost.php' class='btn btn-success btn-sm float-end'>สร้างกระทู้ใหม่</a>
            <?php endif; ?>
        </div>

        <table class="table table-striped mt-3">
            <?php
            $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
            $sql = "SELECT t3.name, t1.title, t1.id, t2.login, t1.post_date FROM post as t1 
            INNER JOIN user as t2 ON (t1.user_id=t2.id) 
            INNER JOIN category as t3 ON (t1.cat_id=t3.id) 
            ORDER BY t1.post_date DESC";
            $result = $conn->query($sql);
            while ($row = $result->fetch()) {
                echo "<tr><td class='d-flex justify-content-between'>
                <div>[$row[0] ] <a href=post.php?id=$row[2]
                style=text-decoration:none>$row[1]</a><br>$row[3] - $row[4]</div> ";
                if (isset($_SESSION['id']) && $_SESSION['role'] == 'a') {
                    echo "<a href='delete.php?id=$row[2]' class ='btn btn-danger me-2' onclick='return myFunction()' style='float: right;'> <i class='bi bi-trash'></i>
                        ลบ</a>";
                }
                echo "</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
