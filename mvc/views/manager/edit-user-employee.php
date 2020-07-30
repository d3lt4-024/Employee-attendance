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
    <title>Sửa thông tin tài khoản</title>
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.min.css" rel="stylesheet"
          type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.css" rel="stylesheet"
          type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.25/daterangepicker.min.css"
          rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css"
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
                    <?php
                    $parament = "";
                    if ($data["user_info"]["Department_Name"] === "An toàn ứng dụng") $parament = "1";
                    if ($data["user_info"]["Department_Name"] === "Kinh doanh") $parament = "2";
                    if ($data["user_info"]["Department_Name"] === "Phân tích mã độc") $parament = "3";
                    if ($data["user_info"]["Department_Name"] === "Nhân sự") $parament = "4";
                    $link = '/department/view/' . $parament;
                    ?>
                    <li><a href="<?php echo $link; ?>"><i class="material-icons list-icon">business</i> <span
                                    class="hide-menu">Quản lý phòng ban</span></a>
                    <li class="menu-item-has-children"><a href="javascript:void(0);" class="ripple"><i
                                    class="list-icon material-icons">time_to_leave</i> <span
                                    class="hide-menu">Đơn xin nghỉ phép</span></a>
                        <ul class="list-unstyled sub-menu">
                            <li><a href="<?php $link1 = '/listed/department_leave_form/' . $parament;
                                echo $link1 ?>">Danh sách đơn xin nghỉ phép trong phòng ban</a>
                            </li>
                            <li><a href="<?php $link2 = '/listed/my_leave_form/' . $_SESSION['user_id'];
                                echo $link2; ?>">Danh sách đơn xin nghỉ phép</a>
                            </li>
                            <li><a href="/create_form/leave_day">Tạo đơn xin nghỉ phép mới</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="<?php $link3 = '/setting/account/' . $_SESSION['user_id'];
                        echo $link3; ?>"><i class="material-icons list-icon">settings</i> <span
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
                    <h5 class="mr-0 mr-r-5">Sửa thông tin tài khoản</h5>
                </div>
            </div>
            <!-- /.page-title -->
            <!-- =================================== -->
            <!-- Different data widgets ============ -->
            <!-- =================================== -->
            <?php
            if (isset($data["error_msg"])) {
                echo '<script type="text/javascript">';
                echo 'alert("' . $data["error_msg"] . '");';
                echo 'window.location.href = "javascript:history.back()";';
                echo '</script>';
            }
            ?>
            <?php
            $arr = explode("/", filter_var(trim($_SERVER['REQUEST_URI'], "/")));
            $parament = $arr[2];
            $link4 = '/edit/employee/' . $parament;
            ?>
            <div class="widget-list">
                <div class="row">
                    <div class="col-md-12 widget-holder">
                        <div class="widget-bg">
                            <div class="widget-body clearfix">
                                <form action="<?php echo $link4 ?>" method="POST">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" for="l10">ID Tài khoản</label>
                                        <div class="col-md-9">
                                            <input class="form-control" readonly="readonly" name="IdAccount"
                                                   placeholder="IdAccount" type="number"
                                                   value="<?php echo htmlspecialchars($data["default"]["IdAccount"]); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" for="l0">ID Nhân viên</label>
                                        <div class="col-md-9">
                                            <div class="input-group"><span class="input-group-addon"><i
                                                            class="list-icon fa fa-vcard"></i> </span>
                                                <input class="form-control" placeholder="Employee ID"
                                                       maxlength="10" name="EmployeeID" type="text"
                                                       value="<?php echo htmlspecialchars($data["default"]["Username"]); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" for="l0">Họ tên</label>
                                        <div class="col-md-9">
                                            <div class="input-group"><span class="input-group-addon"><i
                                                            class="material-icons list-icon">person</i> </span>
                                                <input class="form-control" placeholder="Name" maxlength="20"
                                                       name="Name" type="text"
                                                       value="<?php echo htmlspecialchars($data["default"]["Name"]); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" for="l2">Email</label>
                                        <div class="col-md-9">
                                            <div class="input-group"><span class="input-group-addon"><i
                                                            class="material-icons list-icon">mail_outline</i> </span>
                                                <input class="form-control" placeholder="Email Address"
                                                       type="email" maxlength="45" name="Email"
                                                       value="<?php echo htmlspecialchars($data["default"]["Email"]); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" for="l0">Số điện thoại</label>
                                        <div class="col-md-9">
                                            <div class="input-group"><span class="input-group-addon"><i
                                                            class="material-icons list-icon">contact_phone</i> </span>
                                                <input class="form-control" placeholder="Phone Number"
                                                       type="tel" maxlength="10" name="PhoneNum"
                                                       value="<?php echo htmlspecialchars($data["default"]["PhoneNum"]); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" for="l13">Giới tính</label>
                                        <div class="col-md-9">
                                            <div class="input-group"><span class="input-group-addon"><i
                                                            class="material-icons list-icon">wc</i> </span>
                                                <select class="form-control" name="Gender">
                                                    <option selected disabled
                                                            hidden><?php echo htmlspecialchars($data["default"]["Gender"]); ?></option>
                                                    <option>Nam</option>
                                                    <option>Nữ</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" for="l13">Ngày bắt đầu làm việc</label>
                                        <div class="col-md-9">
                                            <div class="input-group"><span class="input-group-addon"><i
                                                            class="list-icon material-icons">date_range</i></span>
                                                <input type="text" class="form-control datepicker" name="Hire_Date"
                                                       value="<?php echo htmlspecialchars(date('m/d/Y', strtotime($data["default"]["Hire_Date"]))); ?>"
                                                       data-plugin-options='{"autoclose": true}'
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" for="l0">Công việc</label>
                                        <div class="col-md-9">
                                            <div class="input-group"><span class="input-group-addon"><i
                                                            class="material-icons list-icon">supervisor_account</i> </span>
                                                <input class="form-control" name="Job" placeholder="Job"
                                                       maxlength="45" type="text"
                                                       value="<?php echo htmlspecialchars($data["default"]["Job"]); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" for="l13">Ngày sinh</label>
                                        <div class="col-md-9">
                                            <div class="input-group"><span class="input-group-addon"><i
                                                            class="material-icons list-icon">date_range</i> </span>
                                                <input type="text" class="form-control datepicker" name="Birth_Date"
                                                       value="<?php echo htmlspecialchars(date('m/d/Y', strtotime($data["default"][0]["Birth_Date"]))); ?>"
                                                       data-plugin-options='{"autoclose": true}'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" for="l0">Phòng ban</label>
                                        <div class="col-md-9">
                                            <div class="input-group"><span class="input-group-addon"><i
                                                            class="material-icons list-icon">business</i> </span>
                                                <input class="form-control" placeholder="Department Manage"
                                                       maxlength="45" name="Department_Name" type="text"
                                                       readonly="readonly"
                                                       value="<?php echo htmlspecialchars($data["default"]["Department_Name"]); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" for="l2">Username</label>
                                        <div class="col-md-9">
                                            <div class="input-group"><span class="input-group-addon"><i
                                                            class="material-icons list-icon">account_box</i> </span>
                                                <input class="form-control" name="Username"
                                                       placeholder="Username" maxlength="10"
                                                       value="<?php echo htmlspecialchars($data["default"]["Username"]); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" for="l3">Password</label>
                                        <div class="col-md-9">
                                            <div class="input-group"><span class="input-group-addon"><i
                                                            class="material-icons list-icon">lock_open</i></span>
                                                <input class="form-control" name="Password"
                                                       placeholder="Password" type="password"
                                                       value="<?php echo htmlspecialchars($data["default"]["Password"]); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group row">
                                            <div class="col-md-9 ml-md-auto btn-list">
                                                <button class="btn btn-primary btn-rounded" type="submit" value="submit"
                                                        name="submit">Submit
                                                </button>
                                                <a href="javascript: history.back();"
                                                   class="btn btn-outline-default btn-rounded" type="button">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.widget-bg -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </main>
        <!-- /.main-wrapper -->
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.25/daterangepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
    <script src="/public/assets/js/theme.js"></script>
    <script src="/public/assets/js/custom.js"></script>
</body>

</html>