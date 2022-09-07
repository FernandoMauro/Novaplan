<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Novaplan - Erro 404</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/style.css">
    <style>
        .login-page {
            background: #4B9943;
        }
        .login-logo {
            color: #fff;
        }
    </style>

</head>

<body class="hold-transition login-page sidebar-mini">

<div class="login-box">
    <div class="login-box-body text-center">
        <p class="login-box-msg">
            <img src="<?php echo base_url(); ?>public/uploads/<?php echo $setting['logo']; ?>" alt="Logo" width="100%">
        </p>
        <button class="btn btn-link" onclick="goBack()">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Retorna
        </button>
    </div>
    <div class="login-logo">
        <h1 style="font-size: 72px">Oops!</h1>
        <h1>Erro 404</h1>
        <h2>Página não localizada</h2>
        
    </div>
</div>


<script src="<?php echo base_url(); ?>public/admin/js/jquery-2.2.3.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/js/bootstrap.min.js"></script>
<script>
    function goBack() {
        window.history.back()
    }
</script>
</body>
</html>