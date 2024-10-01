<?php
session_start();
if (isset($_SESSION['id'])) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Kak Kak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container-lg">
        <h1 class="text-center">สมัครสมาชิก</h1>
        <div class="card mt-4">
            <div class="card-header bg-primary text-white">กรอกข้อมูล</div>
            <div class="card-body">
                <form action="register_save.php" method="post">
                    <div class="mb-3 row">
                        <label for="login" class="col-lg-3 col-form-label">ชื่อบัญชี</label>
                        <div class="col-lg-9">
                            <input type="text" id="login" name="login" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-lg-3 col-form-label">รหัสผ่าน</label>
                        <div class="col-lg-9">
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="name" class="col-lg-3 col-form-label">ชื่อ-นามสกุล</label>
                        <div class="col-lg-9">
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-lg-3 col-form-label">เพศ</label>
                        <div class="col-lg-9">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="male" name="gender" value="m" required>
                                <label class="form-check-label" for="male">ชาย</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="female" name="gender" value="f" required>
                                <label class="form-check-label" for="female">หญิง</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="other" name="gender" value="o" required>
                                <label class="form-check-label" for="other">อื่นๆ</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-lg-3 col-form-label">อีเมล</label>
                        <div class="col-lg-9">
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-lg-12 text-center">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-box-arrow-in-down"></i>สมัครสมาชิก</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <center><a href="index.html">กลับไปหน้าหลัก</a></center>
    </div>
</body>
</html>
