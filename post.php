<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>
            Web Kak Kak
        </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    </head>
    <body>
        <h1 style="font-size: H1; text-align: center;">Webboard KakKak</h1>
        <hr>
        <div class="container-lg">
        <?php session_start(); 
        include "nav.php"; ?>
        <?php
        try {
            $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT t1.id, t1.title, t1.content, t1.post_date, t2.login 
                    FROM post AS t1 
                    INNER JOIN user AS t2 ON t1.user_id = t2.id 
                    WHERE t1.id = :id 
                    ORDER BY t1.post_date DESC";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='card text-dark bg-white border-primary'>";
                echo "<div class='card-header bg-primary text-white'>{$row['title']}</div>";
                echo "<div class='card-body'>";
                echo "{$row['content']} <hr>";
                echo "{$row['login']} - {$row['post_date']}";
                echo "</div>";
                echo "</div>";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>

        <?php 
        $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");

        $sql = "SELECT t1.id, t1.content, t1.post_date, t2.login 
                FROM comment AS t1 
                INNER JOIN user AS t2 ON t1.user_id = t2.id 
                GROUP BY t1.id
                ORDER BY t1.post_date ASC";
        $result = $conn->query($sql);

        $counter = 1;

        while ($row = $result->fetch()) {
            echo "<div class='card text-dark bg-white border-info'>";
            echo "<div class='card-header bg-info text-white'>ความคิดเห็นที่ {$counter}</div>";
            echo "<div class='card-body'>";
            echo "{$row['content']} <hr>";
            echo "{$row['login']} - {$row['post_date']}";
            echo "</div>";
            echo "</div>";
            $counter ++;
        }
        ?>

        <div class="card text-dark bg-white border-success">
            <div class="card-header bg-success text-white">แสดงความคิดเห็น</div>
            <div class="card-body">
                <form action="post_save.php" method="post">
                    <input type="hidden" name="post_id" value="<?= $_GET['id'];?>">
                    <div class="row mb-3 justify-content-center">
                        <div class="col-lg-10">
                            <textarea name="comment" rows="8" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <center>
                                <button type="submit" class="btn btn-success btn-sm text-white">
                                    <i class="bi bi-box-arrow-up-right me-1"></i>ส่งข้อความ
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