<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="/public/assets/css/pace.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="16x16" href="/public/assets/demo/favicon.png">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Danh sách đơn xin nghỉ phép</title>
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-footable/3.1.4/footable.bootstrap.min.css"
          rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.15/css/jquery.dataTables.min.css"
          rel="stylesheet" type="text/css">
    <link href="/public/assets/css/style.css" rel="stylesheet" type="text/css">
    <!-- Head Libs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
</head>

<body class="header-light sidebar-dark sidebar-expand">
<div id="wrapper" class="wrapper">
    <!-- HEADER & TOP NAVIGATION -->
    <nav class="navbar">
        <!-- Logo Area -->
        <div class="navbar-header">
            <a href="/" class="navbar-brand">
                <img class="logo-expand" alt="" src="/public/assets/demo/logo-expand.png">
                <img class="logo-collapse" alt="" src="/public/assets/demo/logo-collapse.png">
                <!-- <p>OSCAR</p> -->
            </a>
        </div>
        <!-- /.navbar-header -->
        <!-- Left Menu & Sidebar Toggle -->
        <ul class="nav navbar-nav">
            <li class="sidebar-toggle"><a href="javascript:void(0)" class="ripple"><i class="material-icons list-icon">menu</i></a>
            </li>
        </ul>
        <!-- /.navbar-left -->
        <div class="spacer"></div>


        <!-- User Image with Dropdown -->
        <ul class="nav navbar-nav">
            <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle ripple"
                                    data-toggle="dropdown"><span class="avatar thumb-sm"><img
                                src="/public/assets/demo/users/user-image.png" class="rounded-circle" alt=""> <i
                                class="material-icons list-icon">expand_more</i></span></a>
                <div
                        class="dropdown-menu dropdown-left dropdown-card dropdown-card-wide dropdown-card-dark text-inverse">
                    <div class="card">
                        <header class="card-heading-extra">
                            <div class="row">
                                <div class="col-8">
                                    <h3 class="mr-b-10 sub-heading-font-family fw-300"><?php echo htmlspecialchars($data["user_info"]["Name"]); ?></h3>
                                    <span class="user--online"><?php if ($data["user_info"]["State"] === "online") {
                                            echo "ONLINE";
                                        } else {
                                            echo "OFFLINE";
                                        } ?>
                                </div>
                                <div class="col-4 d-flex justify-content-end"><a href="/logout" class="mr-t-10"><i
                                                class="material-icons list-icon">power_settings_new</i> Đăng xuất</a>
                                </div>
                            </div>
                        </header>
                    </div>
                </div>
            </li>
        </ul>
        <!-- /.navbar-right -->
    </nav>
    <!-- /.navbar -->
    <div class="content-wrapper">
        <!-- SIDEBAR -->
        <aside class="site-sidebar scrollbar-enabled clearfix">
            <!-- User Details -->
            <div class="side-user">
                <a class="col-sm-12 media clearfix" href="javascript:void(0);">
                    <figure class="media-left media-middle user--online thumb-sm mr-r-10 mr-b-0">
                        <img src="/public/assets/demo/users/user-image.png" class="media-object rounded-circle" alt="">
                    </figure>
                    <div class="media-body hide-menu">
                        <h4 class="media-heading mr-b-5 text-uppercase"><?php echo htmlspecialchars($data["user_info"]["Name"]); ?></h4>
                        <span class="user-type fs-12"><?php if ($_SESSION["permission"] === "admin") {
                                echo "Quản trị";
                            } else if ($_SESSION["permission"] === "manager") {
                                echo "Quản lý";
                            } else {
                                echo "Nhân viên";
                            } ?></span>
                    </div>
                </a>
            </div>
            <!-- /.side-user -->
            <!-- Sidebar Menu -->
            <nav class="sidebar-nav">
                <ul class="nav in side-menu">
                    <li class="menu-item-has-children"><a href="javascript:void(0);" class="ripple"><i
                                    class="list-icon material-icons">time_to_leave</i> <span
                                    class="hide-menu">Đơn xin nghỉ phép</span></a>
                        <ul class="list-unstyled sub-menu">
                            <li><a href="<?php $link1 = '/listed/my_leave_form/' . $_SESSION['user_id'];
                                echo $link1 ?>">Danh sách đơn xin nghỉ phép</a>
                            </li>
                            <li><a href="/create_form/leave_day">Tạo đơn xin nghỉ phép mớim</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="<?php $link = '/setting/account/' . $_SESSION['user_id'];
                        echo $link; ?>"><i class="material-icons list-icon">settings</i> <span
                                    class="hide-menu">Cài đặt tài khoản</span></a>
                    <li><a href="/logout"><i class="list-icon material-icons">settings_power</i> <span
                                    class="hide-menu">Đăng xuất</span></a>
                    <li class="list-divider"></li>
                </ul>
                <!-- /.side-menu -->
            </nav>
            <!-- /.sidebar-nav -->
        </aside>
        <!-- /.site-sidebar -->
        <main class="main-wrapper clearfix">
            <!-- Page Title Area -->
            <div class="row page-title clearfix">
                <div class="page-title-left">
                    <h5 class="mr-0 mr-r-5">Danh sách đơn xin nghỉ phép</h5>
                    <p class="mr-0 text-muted hidden-sm-down"></p>
                </div>
                <!-- /.page-title-left -->
                <div class="page-title-right d-inline-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Trang chủ</a>
                        </li>
                        <li class="breadcrumb-item">Đơn xin nghỉ phép</a>
                        </li>
                        <li class="breadcrumb-item active">Danh sách đơn xin nghỉ phép</li>
                    </ol>
                </div>
                <!-- /.page-title-right -->
            </div>
            <!-- /.page-title -->
            <!-- =================================== -->
            <!-- Different data widgets ============ -->
            <!-- =================================== -->
            <div class="widget-list">
                <div class="row">
                    <div class="col-md-12 widget-holder">
                        <div class="widget-bg">
                            <div class="widget-heading clearfix">
                                <h5>Leave Day Form List</h5>
                            </div>
                            <!-- /.widget-heading -->
                            <div class="widget-body clearfix">
                                <table class="table table-editable" data-toggle="datatables">
                                    <thead>
                                    <tr>
                                        <th>ID Đơn</th>
                                        <th>Ngày bắt đầu</th>
                                        <th>Ngày kết thúc</th>
                                        <th>Lý do</th>
                                        <th>Trạng thái</th>
                                        <th class="tabledit-toolbar-column">Tác vụ</th>
                                    </tr>
                                    </thead>
                                    <?php
                                    $result = $data["lea_form_list"];
                                    foreach ($result as $key => $value) {
                                        $parament = $value['IdForm'];
                                        $link1 = '/view/leave_day_form/' . $parament;
                                        $link2 = '/delete/leave_day_form/' . $parament;
                                        ?>
                                        <tbody>
                                        <tr>
                                            <td><?php echo htmlspecialchars($value['IdForm']); ?></td>
                                            <td><?php echo htmlspecialchars(date('d/m/Y', strtotime($value['Start_Date']))); ?></td>
                                            <td><?php echo htmlspecialchars(date('d/m/Y', strtotime($value['End_Date']))); ?></td>
                                            <td><?php echo htmlspecialchars($value['Reason']); ?></td>
                                            <td><?php
                                                if ($value['Form_Status'] === 'Approved') echo "Đã duyệt";
                                                else echo "Đang chờ";
                                                ?></td>
                                            <td style="white-space: nowrap; width: 1%;">
                                                <div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                                                    <div class="btn-group btn-group-sm" style="float: none;">
                                                        <a href="<?php echo $link1; ?>" button type="button"
                                                           class="tabledit-edit-button btn btn-sm btn-default"
                                                           style="float: none;"><span
                                                                    class="glyphicon glyphicon-pencil"></span></a>
                                                        <a href="<?php echo $link2; ?>" button type="button"
                                                           class="tabledit-edit-button btn btn-sm btn-default"
                                                           style="float: none;"><span
                                                                    class="glyphicon glyphicon-trash"></span></a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    <?php } ?>
                                </table>
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.widget-bg -->
                    </div>
                    <!-- /.widget-holder -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.widget-list -->
        </main>
        <!-- /.main-wrappper -->
        <!-- FOOTER -->
        <footer class="footer text-center clearfix"></footer>
    </div>
    <!--/ #wrapper -->
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.2/umd/popper.min.js"></script>
    <script src="/public/assets/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mediaelement/4.1.3/mediaelementplayer.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.7.0/metisMenu.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.7.0/js/perfect-scrollbar.jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.4/sweetalert2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="/public/assets/js/theme.js"></script>
    <script src="/public/assets/js/custom.js"></script>
</body>

</html>