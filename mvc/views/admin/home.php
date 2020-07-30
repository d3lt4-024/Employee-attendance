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
    <title>Trang chủ</title>
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
    <link href="/public/assets/vendors/weather-icons-master/weather-icons.min.css" rel="stylesheet" type="text/css">
    <link href="/public/assets/vendors/weather-icons-master/weather-icons-wind.min.css" rel="stylesheet"
          type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.25/daterangepicker.min.css"
          rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css" rel="stylesheet"
          type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css" rel="stylesheet"
          type="text/css">
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
        <!-- Button: Create New -->
        <div class="btn-list dropdown hidden-xs hidden-sm-down"><a href="javascript:void(0);"
                                                                   class="btn btn-primary dropdown-toggle ripple"
                                                                   data-toggle="dropdown"><i
                        class="material-icons list-icon fs-24">playlist_add</i> Tạo mới</a>
            <div class="dropdown-menu dropdown-left animated flipInY"><span
                        class="dropdown-header">Tạo mới tài khoản ...</span> <a class="dropdown-item"
                                                                                href="/create_form/manager">Quản lý</a>
                <a
                        class="dropdown-item"
                        href="/create_form/employee">Nhân viên</a>
            </div>
        </div>
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
                                <div class="col-4 d-flex justify-content-end"><a href="/logout"
                                                                                 class="mr-t-10"><i
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
                                    class="list-icon material-icons">apps</i> <span
                                    class="hide-menu">Danh sách</span></a>
                        <ul class="list-unstyled sub-menu">
                            <li><a href="/listed/manager">Quản lý</a>
                            </li>
                            <li><a href="/listed/employee">Nhân viên</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children"><a href="javascript:void(0);" class="ripple"><i
                                    class="list-icon material-icons">business</i> <span
                                    class="hide-menu">Phòng ban</span></a>
                        <ul class="list-unstyled sub-menu">
                            <li><a href="/department/view/1">An toàn ứng dụng</a>
                            </li>
                            <li><a href="/department/view/2">Kinh doanh</a>
                            </li>
                            <li><a href="/department/view/3">Phân tích mã độc</a>
                            </li>
                            <li><a href="/department/view/4">Nhân sự</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children"><a href="javascript:void(0);" class="ripple"><i
                                    class="list-icon material-icons">time_to_leave</i> <span
                                    class="hide-menu">Danh sách đơn xin nghỉ phép</span></a>
                        <ul class="list-unstyled sub-menu">
                            <li><a href="/listed/department_leave_form/1">Phòng An toàn ứng dụng</a>
                            </li>
                            <li><a href="/listed/department_leave_form/2">Phòng Kinh doanh</a>
                            </li>
                            <li><a href="/listed/department_leave_form/3">Phòng Phân tích mã độc</a>
                            </li>
                            <li><a href="/listed/department_leave_form/4">Phòng Nhân sự</a>
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
        <div class="main-wrapper clearfix">
            <!-- Page Title Area -->
            <div class="row">
                <div class="col-md-4 col-6 widget-holder">
                    <div class="widget-bg">
                        <div class="widget-body clearfix">
                            <div class="widget-counter">
                                <h6>Tổng số người dùng <small></small></h6>
                                <h3 class="h1"><span
                                            class="counter"><?php echo htmlspecialchars($data["amount_acc"]); ?></span>
                                </h3><i class="material-icons list-icon">account_box</i>
                            </div>
                            <!-- /.widget-counter -->
                        </div>
                        <!-- /.widget-body -->
                    </div>
                    <!-- /.widget-bg -->
                </div>
                <div class="col-md-4 col-6 widget-holder">
                    <div class="widget-bg bg-color-scheme text-inverse">
                        <div class="widget-body clearfix">
                            <div class="widget-counter">
                                <h6>Tổng số người dùng đang online <small class="text-inverse"></small></h6>
                                <h3 class="h1"><span
                                            class="counter"><?php echo htmlspecialchars($data["amount_acc_onl"]); ?></span>
                                </h3><i class="material-icons list-icon">check_box</i>
                            </div>
                            <!-- /.widget-counter -->
                        </div>
                        <!-- /.widget-body -->
                    </div>
                    <!-- /.widget-bg -->
                </div>
                <div class="col-md-4 col-6 widget-holder">
                    <div class="widget-bg bg-primary text-inverse">
                        <div class="widget-body">
                            <div class="widget-counter">
                                <h6>Tổng số người dùng đang offline <small class="text-inverse"></small></h6>
                                <h3 class="h1"><span
                                            class="counter"><?php echo htmlspecialchars($data["amount_acc_off"]); ?></span>
                                </h3><i
                                        class="material-icons list-icon">indeterminate_check_box</i>
                            </div>
                            <!-- /.widget-counter -->
                        </div>
                        <!-- /.widget-body -->
                    </div>
                    <!-- /.widget-bg -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 widget-holder">
                    <div class="widget-bg bg-color-scheme color-white pd-0">
                        <div class="widget-body clearfix">
                            <div id="custom-clndr" data-toggle="clndr">
                                <script type="text/template" class="template">
                                    <div class="clndr-controls mr-b-20 clearfix">
                                        <h5 class="clndr-title float-left mr-tb-0">Lịch</h5>
                                        <div class="float-right">
                                            <div class="clndr-previous-button float-left"><i class="material-icons">chevron_left</i>
                                            </div>
                                            <div class="clndr-next-button float-right"><i class="material-icons">chevron_right</i>
                                            </div>
                                        </div>
                                        <div class="text-right current-month text-uppercase"><%= month.substr(0,3) %>
                                            <%= year %>
                                        </div>
                                    </div>
                                    <div class="clndr-grid">
                                        <div class="days"> <% _.each(days, function(day) { %>
                                            <div class="text-center <%= day.classes %>" id="<%= day.id %>"><span
                                                        class="day-number"><%= day.day %></span></div>
                                            <% }); %>
                                        </div>
                                    </div><!-- /.clndr-grid --> <% if( !_.isEmpty(extras.selectedDay.events) ) { %>
                                    <!-- /.event-listing --> <% } %>
                                </script>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-8 widget-holder">
                    <div class="widget-bg">
                        <div class="widget-body clearfix">
                            <h5 class="box-title">Tình trạng người dùng hệ thống</h5>
                            <canvas id="chartJsPie" height="64.5"></canvas>
                        </div>
                        <!-- /.widget-body -->
                    </div>
                    <!-- /.widget-bg -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-6 widget-holder">
                    <div class="widget-bg">
                        <div class="widget-body clearfix">
                            <div class="widget-counter">
                                <h6>Tổng số đơn xin nghỉ phép <small></small></h6>
                                <h3 class="h1"><span
                                            class="counter"><?php echo htmlspecialchars($data["amount_form"]); ?></span>
                                </h3><i class="material-icons list-icon">event_note</i>
                            </div>
                            <!-- /.widget-counter -->
                        </div>
                        <!-- /.widget-body -->
                    </div>
                    <!-- /.widget-bg -->
                </div>
                <div class="col-md-4 col-6 widget-holder">
                    <div class="widget-bg bg-color-scheme text-inverse">
                        <div class="widget-body clearfix">
                            <div class="widget-counter">
                                <h6>Tổng số đơn xin nghỉ phép đã duyệt <small class="text-inverse"></small></h6>
                                <h3 class="h1"><span
                                            class="counter"><?php echo htmlspecialchars($data["amount_form_app"]); ?></span>
                                </h3><i class="material-icons list-icon">event_available</i>
                            </div>
                            <!-- /.widget-counter -->
                        </div>
                        <!-- /.widget-body -->
                    </div>
                    <!-- /.widget-bg -->
                </div>
                <div class="col-md-4 col-6 widget-holder">
                    <div class="widget-bg bg-primary text-inverse">
                        <div class="widget-body">
                            <div class="widget-counter">
                                <h6>Tổng số đơn xin nghỉ phép đang chờ duyệt <small class="text-inverse"></small></h6>
                                <h3 class="h1"><span
                                            class="counter"><?php echo htmlspecialchars($data["amount_form_pen"]); ?></span>
                                </h3><i
                                        class="material-icons list-icon">event_busy</i>
                            </div>
                            <!-- /.widget-counter -->
                        </div>
                        <!-- /.widget-body -->
                    </div>
                    <!-- /.widget-bg -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 widget-holder">
                    <div class="widget-bg">
                        <div class="widget-body clearfix">
                            <h5 class="box-title">Danh sách đơn xin nghỉ phép</h5>
                            <div class="padded-reverse">
                                <table class="table table-striped widget-status-table mr-b-0">
                                    <thead>
                                    <tr>
                                        <th class="pd-l-20">ID Đơn</th>
                                        <th class="pd-l-20">ID Nhân viên</th>
                                        <th class="pd-l-20">Họ tên</th>
                                        <th>Trạng thái</th>
                                        <th class="hidden-xs">Ngày bắt đầu</th>
                                        <th class="hidden-xs">Ngày kết thúc</th>
                                        <th class="text-right pd-r-20">Tác vụ</th>
                                    </tr>
                                    </thead>
                                    <?php
                                    $result = $data["all_form"];
                                    foreach ($result as $key => $value) {
                                        $parament = $value['IdForm'];
                                        $link4 = '/view/department_leave_day_form/' . $parament;
                                        $link5 = '/delete/department_leave_day_form/' . $parament;
                                        $link6 = '/approve/leave_day_form/' . $parament;
                                        ?>
                                        <tbody>
                                        <tr>
                                            <th class="pd-l-20"><?php echo htmlspecialchars($value['IdForm']); ?></a>
                                            </th>
                                            <th class="pd-l-20"><?php echo htmlspecialchars($value['Employess_Code']); ?></a>
                                            </th>
                                            <th class="pd-l-20"><?php echo htmlspecialchars($value['Name']); ?></a>
                                            </th>
                                            <?php
                                            if ($value['Form_Status'] === 'Approved') echo "<td><span class=\"badge badge-info text-inverse\">Đã duyệt</span></td>";
                                            else echo "<td><span class=\"badge badge-danger text-inverse\">Đang chờ</span></td>";
                                            ?>
                                            <td class="text-muted hidden-xs"><?php echo htmlspecialchars(date('d/m/Y', strtotime($value['Start_Date']))); ?></td>
                                            <td class="text-muted hidden-xs"><?php echo htmlspecialchars(date('d/m/Y', strtotime($value['End_Date']))); ?></td>
                                            <td class="text-right"><a href="<?php echo $link6; ?>"><i
                                                            class="material-icons list-icon md-18 text-muted">done</i></a>
                                                <a href="<?php echo $link4; ?>"><i
                                                            class="material-icons list-icon md-18 text-muted">edit</i></a>
                                                <a href="<?php echo $link5; ?>"><i
                                                            class="material-icons list-icon md-18 text-muted">delete</i></a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    <?php } ?>
                                </table>
                                <!-- /.widget-status-table -->
                            </div>
                            <!-- /.padded-reverse -->
                        </div>
                        <!-- /.widget-body badge -->
                    </div>
                    <!-- /.widget-bg -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 widget-holder">
                    <div class="widget-bg">
                        <div class="widget-body clearfix">
                            <h5 class="box-title">Tình trạng các đơn xin nghỉ phép</h5>
                            <canvas id="chartJsDoughnut" height="100"></canvas>
                        </div>
                        <!-- /.widget-body -->
                    </div>
                    <!-- /.widget-bg -->
                </div>
            </div>
        </div>
        <!-- /.widget-list -->
        </main>
        <!-- /.main-wrappper -->
    </div>
    <!-- /.content-wrapper -->
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js"></script>
<script src="/public/assets/vendors/charts/utils.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Knob/1.2.13/jquery.knob.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-sparklines/2.1.2/jquery.sparkline.min.js"></script>
<script src="/public/assets/vendors/charts/excanvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mithril/1.1.1/mithril.js"></script>
<script src="/public/assets/vendors/theme-widgets/widgets.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clndr/1.4.7/clndr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.2.7/raphael.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.25/daterangepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>
<script src="/public/assets/js/theme.js"></script>
<script src="/public/assets/js/custom.js?v=101"></script>
</body>

</html>
