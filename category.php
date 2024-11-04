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
        function populateEditModal(id, name) {
            document.getElementById('editCatId').value = id;
            document.getElementById('editCatName').value = name;
        }
        function myFunction(event, postId) {
            return confirm("ต้องการลบจริงหรือไม่");
        }
    </script>
</head>
<body>
    <div class="container-lg">
        <h1 class="text-center mt-3">Webboard KakKak</h1>
        <?php include "nav.php"; ?>
        <div class="col-lg">
            <?php
            if (isset($_SESSION['add_category'])) {
                    echo "<div class='alert alert-success'>เพิ่มหมวดหมู่เรียบร้อยแล้ว</div>";
                    unset($_SESSION['add_category']);
            }
            if (isset($_SESSION['edit_category'])) {
                echo "<div class='alert alert-success'>แก้ไขหมวดหมู่เรียบร้อยแล้ว</div>";
                unset($_SESSION['edit_category']);
            }
            ?>
        </div>
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <td>ลำดับ</td>
                    <td>ชื่อหมวดหมู่</td>
                    <td>จัดการ</td>
                </tr>
            </thead>
            <tbody>
            <?php
                $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT id, name FROM category";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                while ($row = $stmt->fetch()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    echo "<td>
                            <a href='#' class='btn btn-warning me-2' data-bs-toggle='modal' data-bs-target='#editCategoryModal' onclick='populateEditModal(" . ($row['id']) . ", \"" . ($row['name']) . "\")'>
                                <i class='bi bi-pen'></i>
                            </a>
                            <a href='deletecategory.php?id=$row[0]' class='btn btn-danger' onclick='return myFunction(event, $row[0])'><i class='bi bi-trash'></i></a>
                          </td>";
                    echo "</tr>";
                }
            ?>
            </tbody>
        </table>
        <center>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                <i class="bi bi-bookmark-plus"></i> เพิ่มหมวดหมู่ใหม่
            </button>
        </center>

        <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addCategoryModalLabel">เพิ่มหมวดหมู่ใหม่</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="category_save.php" method="post">
                        <div class="modal-body">
                            <label for="addCatName" class="form-label">ชื่อหมวดหมู่ :</label>
                            <input type="text" id="addCatName" class="form-control" name="CatName" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editCategoryModalLabel">แก้ไขหมวดหมู่</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="editcategory.php" method="post">
                        <div class="modal-body">
                            <input type="hidden" id="editCatId" name="CatId">
                            <label for="editCatName" class="form-label">ชื่อหมวดหมู่ :</label>
                            <input type="text" id="editCatName" class="form-control" name="CatName" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>