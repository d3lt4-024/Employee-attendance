<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="16x16" href="/public/assets/demo/favicon.png">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Đăng nhập</title>
    <!-- CSS -->
    <link href="/public/assets/vendors/material-icons/material-icons.css" rel="stylesheet" type="text/css">
    <link href="/public/assets/vendors/mono-social-icons/monosocialiconsfont.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.4/sweetalert2.css" rel="stylesheet"
          type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet"
          type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mediaelement/4.1.3/mediaelementplayer.min.css" rel="stylesheet"
          type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.7.0/css/perfect-scrollbar.min.css"
          rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,600,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          type="text/css">
    <link href="/public/assets/css/style.css" rel="stylesheet" type="text/css">
    <!-- Head Libs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
</head>

<body class="body-bg-full profile-page" style="background-image: url(/public/assets/demo/night.jpg)">
<div id="wrapper" class="row wrapper">
    <div class="col-10 ml-sm-auto col-sm-6 col-md-4 ml-md-auto login-center mx-auto">
        <div class="navbar-header text-center">
            <a href="index.php">
                <img alt="" src="/public/assets/demo/logo-expand-dark.png">
            </a>
        </div>
        <?php
        //printing error message
        if (isset($data["error_msg"])) {
            echo '<script type="text/javascript">';
            echo 'alert("' . $data["error_msg"] . '");';
            echo 'window.location.href = "/";';
            echo '</script>';
        }
        ?>
        <!-- /.navbar-header -->
        <form action="" method="POST" class="form-material">
            <div class="form-group">
                <input type="text" placeholder="Your Username" class="form-control form-control-line" name="username"
                       id="input1">
                <label for="username">Username</label>
            </div>
            <div class="form-group">
                <input type="password" placeholder="Your Password" class="form-control form-control-line"
                       name="password" id="input1">
                <label>Password</label>
            </div>
            <div class="form-group">
                <button class="btn btn-block btn-lg btn-color-scheme ripple" type="submit" value="login" name="login">
                    Login
                </button>
            </div>
            <!-- /.login-center -->
    </div>
    <!-- /.body-container -->
    <!-- Scripts -->
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript"
            src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/public/assets/js/material-design.js"></script>
</body>

</html>