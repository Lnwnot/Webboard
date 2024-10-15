<?php
if (isset($_SESSION['id'])) {
    header('location:index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Web Kak Kak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .card {
            max-width: 500px;
            margin: auto;
        }
    </style>
    <script>
        function password_show_hide(){
            let password=document.getElementById('password');
            let show_eye=document.getElementById('show_eye');
            let hide_eye=document.getElementById('hide_eye');
            hide_eye.classList.remove('d-none');
            if(password.type=='password'){
                password.type='text';
                show_eye.style.display='none';
                hide_eye.style.display='block';
            }
            else{
                password.type='password';
                show_eye.style.display='block';
                hide_eye.style.display='none';
            }
        }
    </script>
</head>
<body>
    <div class="container-lg">
    <h1 class="text-center">Webboard KakKak</h1>
    <?php include "nav.php"; ?>
    <div class="container-lg">
        <?php
        if (isset($_SESSION['error'])) {
            echo "<div class='alert alert-danger'>ชื่อบัญชีหรือรหัสผ่านไม่ถูกต้อง</div>";
            unset($_SESSION['error']);
        }
        ?>
    </div>
    <div class="card mt-4">
        <h5 class="card-header">เข้าสู่ระบบ</h5>
        <div class="card-body">
            <form action="verify.php" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Login</label>
                    <input type="text" id="username" class="form-control" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" id="password" class="form-control" name="password" required>
                        <span class="input-group-text" onclick="password_show_hide()">
                            <i class="bi bi-eye-fill" id="show_eye"></i>
                            <i class="bi bi-eye-slash-fill d-none" id="hide_eye"></i>
                        </span>
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-success btn-sm me-2">Login</button>
                    <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                </div>
            </form>
        </div>
    </div>
    <div class="text-center mt-3">
        ถ้ายังไม่ได้สมัครสมาชิก <a href="register.php">กรุณาสมัครสมาชิก</a>
    </div>
    </div>
</body>
</html>
