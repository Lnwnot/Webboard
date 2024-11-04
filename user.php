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
        function populateEditModal(id, login, name, gender, email, role) {
            document.getElementById('id').value = id;
            document.getElementById('editIDName').value = login;
            document.getElementById('editRName').value = name;
            document.getElementById('editGender').value = gender;
            document.getElementById('editemail').value = email;
            document.getElementById('editRole').value = role;
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
                    echo "<div class='alert alert-success'>แก้ไขข้อมูลผู้ใช้เเรียบร้อยแล้ว</div>";
                    unset($_SESSION['add_category']);
            }
            ?>
        </div>
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>ชื่อผู้ใช้</th>
                    <th>ชื่อ - นามสกุล</th>
                    <th>เพศ</th>
                    <th>อีเมล</th>
                    <th>สิทธิ์</th>
                    <th>จัดการ</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT id, login, name, gender, email, role FROM user";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                while ($row = $stmt->fetch()) {
                    echo "<tr>";
                    echo "<td>" . ($row['id']) . "</td>";
                    echo "<td>" . ($row['login']) . "</td>";
                    echo "<td>" . ($row['name']) . "</td>";
                    echo "<td>" . ($row['gender']) . "</td>";
                    echo "<td>" . ($row['email']) . "</td>";
                    echo "<td>" . ($row['role']) . "</td>";
                    echo "<td>
                            <a href='#' class='btn btn-warning me-2' data-bs-toggle='modal' data-bs-target='#Edit' onclick='return populateEditModal({$row['id']}, \"{$row['login']}\", \"{$row['name']}\", \"{$row['gender']}\", \"{$row['email']}\", \"{$row['role']}\")'>
                                <i class='bi bi-pen'></i>
                            </a>";
                    echo "</tr>";
                }
            ?>
            </tbody>
        </table>

        <div class="modal fade" id="Edit" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addCategoryModalLabel">เพิ่มหมวดหมู่ใหม่</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="edituser.php" method="post">
                        <div class="modal-body">
                            <label for="addCatName" class="form-label">ชื่อผู้ใช้ :</label>
                            <input type="text" id="editIDName" class="form-control" name="IDName" disabled required>
                        </div>
                        <div class="modal-body">
                            <label for="addCatName" class="form-label">ชื่อ - นามสกุล :</label>
                            <input type="text" id="editRName" class="form-control" name="RName" required>
                        </div>
                        <div class="modal-body">
                            <label for="Gender" class="form-label">เพศ :</label>
                            <select class="form-select" name="Gender" id="editGender" required>
                                <option value="m">ชาย</option>
                                <option value="f">หญิง</option>
                                <option value="o">อื่นๆ</option>
                            </select>
                        </div>                        
                        <div class="modal-body">
                            <label for="addCatName" class="form-label">email :</label>
                            <input type="email" id="editemail" class="form-control" name="email" required>
                        </div>
                        <div class="modal-body">
                            <label for="Role" class="form-label">สิทธิ์ :</label>
                            <select class="form-select" name="Role" id="editRole" required>
                                <option value="m">Member</option>
                                <option value="a">Admin</option>
                                <option value="b">Ban</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" id="id" name="id">
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