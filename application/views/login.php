<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Administrator Pance Shop">
    <meta name="author" content="PANCE SHOP">
    <link rel="shortcut icon" href="<?= base_url('/img/header/1.png')  ?>" style="background-color: white;">
    <link rel="stylesheet" href="<?= base_url('asset/')  ?>css/login.css">
    <link rel="stylesheet" href="<?= base_url('asset/')  ?>css/fontawesome-free-6.1.1-web/css/all.min.css">
    <title>Shop Administrator</title>
</head>

<body>
    <div class="cek" data-cek="<?= $this->session->flashdata("message")  ?>"></div>
    <div class="oke" data-cek="<?= $this->session->flashdata("warn")  ?>"></div>
    <div class="login-div">
        <div class="logo"></div>
        <div class="title">Pance Shop </div>
        <div class="sub-tittle">Administrator</div>
        <div class="form-container">
            <form method="POST" autocomplete="off">
                <div class="username">
                    <i class="fas fa-user"></i>
                    <input type="email" class="user-input" placeholder="username" name="name" id="name" autocomplete="off" required value="<?php echo set_value('name'); ?>">
                </div>
                <div class="password">
                    <i class="fa-solid fa-unlock-keyhole"></i>
                    <input type="password" class="pass-input" placeholder="Password" name="pass" required autocomplete="off">
                </div>
                <div class="pass-link"><a href="<?= base_url('login/forgot') ?>">Forgot password?</a></div>
                <button type="submit" class="sign-btn"> masuk</button>
            </form>
        </div>
    </div>
    <script src="<?= base_url('asset/plugins/jq/jquery-3.6.0.js') ?>"></script>
    <script src="<?= base_url('asset/plugins/sweetalert2/sweetalert2.all.min.js')  ?>"></script>
    <script src="<?= base_url('asset/js/login.js') ?>"></script>
</body>

</html>