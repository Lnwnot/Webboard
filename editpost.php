<?php
session_start();
$user = filter_input(INPUT_GET, 'userid', FILTER_SANITIZE_NUMBER_INT);
if (isset($_SESSION['id']) && $_SESSION['id'] == $user) {
    header('Location: index.php');
    exit();
}

function getDbConnection() {
    try {
        $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        error_log("Database connection failed: " . $e->getMessage());
        exit("Database connection error.");
    }
}

$conn = getDbConnection();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Web Kak Kak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .card { max-width: 600px; margin: auto; }
    </style>
</head>
<body>
    <h1 class="text-center">Webboard KakKak</h1>
    <hr>
        <div class="container-lg">
        <?php include "nav.php"; ?>
        <div class="row">
            <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <?php
                    if (isset($_SESSION['edited'])) {
                        if ($_SESSION['edited'] == "error") {
                            echo "<div class='alert alert-danger'>ชื่อข้อมูลซ้ำหรือฐานข้อมูลมีปัญหา</div>";
                        } else {
                            echo "<div class='alert alert-success'>แก้ไขข้อมูลเรียบร้อยแล้ว</div>";
                        }
                        unset($_SESSION['edited']);
                    }
                    ?>
                </div>
        </div>
        <div class="card text-dark bg-white border-warning">
            <div class="card-header bg-warning text-white">แก้ไขกระทู้</div>
            <div class="card-body">
                <form action="editpost_save.php" method="post">
                    <div class="row mb-3">
                        <label class="col-lg-3 col-form-label">หมวดหมู่:</label>
                        <div class="col-lg-9">
                            <select name="category" class="form-select">
                                <?php
                                try {
                                    $sql = "SELECT * FROM category";
                                    foreach ($conn->query($sql) as $row) {
                                        $categoryId = htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8');
                                        $categoryName = htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8');
                                        echo "<option value='$categoryId'>$categoryName</option>";
                                    }
                                } catch (PDOException $e) {
                                    error_log("Failed to fetch categories: " . $e->getMessage());
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-lg-3 col-form-label">หัวข้อ:</label>
                        <div class="col-lg-9">
                            <?php
                            if (isset($_GET['id'])) {
                                $postId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
                                try {
                                    $sql = "SELECT * FROM post WHERE id = :id";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->bindParam(':id', $postId, PDO::PARAM_INT);
                                    $stmt->execute();
                                    $post = $stmt->fetch(PDO::FETCH_ASSOC);
                                    if ($post) {
                                        echo '<input type="text" name="topic" value="' . htmlspecialchars($post['title'], ENT_QUOTES) . '" class="form-control" required>';
                                        echo '<input type="hidden" name="post_id" value="' . htmlspecialchars($postId) . '">';
                                        $selectedCategory = htmlspecialchars($post['cat_id'], ENT_QUOTES);
                                    }
                                } catch (PDOException $e) {
                                    error_log("Failed to fetch post: " . $e->getMessage());
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-lg-3 col-form-label">เนื้อหา:</label>
                        <div class="col-lg-9">
                            <textarea name="comment" rows="8" class="form-control" required><?= isset($post) ? htmlspecialchars($post['content']) : '' ?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <button type="submit" class="btn btn-warning btn-sm text-white">
                                <i class="bi bi-caret-right-square me-1"></i>บันทึกข้อความ
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
