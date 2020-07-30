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
        <div class="main-wrapper clearfix">
            <!-- Page Title Area -->
            <?php
            $net_salary = intval($data["salary"]["Net_Salary"]);
            $late_day = intval($data["salary"]["Late_day"]);
            $unpaid_leave_day = intval($data["salary"]["Unpaid_leave_day"]);
            $current_max_day = intval(date('t'));
            $total_salary = $net_salary - (($net_salary / $current_max_day) * $unpaid_leave_day) - 50000 * $late_day;
            $view = htmlspecialchars(number_format((float)$total_salary, 0, ",", "."));
            ?>
            <div class="row">
                <!-- Counter: Sales -->
                <div class="col-md-3 col-6 widget-holder">
                    <div class="widget-bg bg-primary text-inverse">
                        <div class="widget-body">
                            <div class="widget-counter">
                                <h6>Lương <small class="text-inverse">Tháng này</small></h6>
                                <h3 class="h1"><span class="text-lg-right"><?php echo $view . ' VND'; ?></span></h3><i
                                        class="material-icons list-icon">work</i>
                            </div>
                            <!-- /.widget-counter -->
                        </div>
                        <!-- /.widget-body -->
                    </div>
                    <!-- /.widget-bg -->
                </div>
                <!-- /.widget-holder -->
                <!-- Counter: Subscriptions -->
                <div class="col-md-3 col-6 widget-holder">
                    <div class="widget-bg bg-color-scheme text-inverse">
                        <div class="widget-body clearfix">
                            <div class="widget-counter">
                                <h6>Số ngày nghỉ có phép <small class="text-inverse">Tháng này</small></h6>
                                <h3 class="h1"><span
                                            class="counter"><?php echo htmlspecialchars($data["leave_day_in_month"]); ?></span>
                                </h3><i class="material-icons list-icon">event_available</i>
                            </div>
                            <!-- /.widget-counter -->
                        </div>
                        <!-- /.widget-body -->
                    </div>
                    <!-- /.widget-bg -->
                </div>
                <!-- /.widget-holder -->
                <!-- Counter: Users -->
                <div class="col-md-3 col-6 widget-holder">
                    <div class="widget-bg">
                        <div class="widget-body clearfix">
                            <div class="widget-counter">
                                <h6>Số ngày đi muộn <small>Tháng này</small></h6>
                                <h3 class="h1"><span
                                            class="counter"><?php echo htmlspecialchars($data["salary"]["Late_day"]); ?></span>
                                </h3><i class="material-icons list-icon">event_available</i>
                            </div>
                            <!-- /.widget-counter -->
                        </div>
                        <!-- /.widget-body -->
                    </div>
                    <!-- /.widget-bg -->
                </div>
                <!-- /.widget-holder -->
                <!-- Counter: Pageviews -->
                <div class="col-md-3 col-6 widget-holder">
                    <div class="widget-bg">
                        <div class="widget-body clearfix">
                            <div class="widget-counter">
                                <h6>Số ngày nghỉ không phép <small>Tháng này</small></h6>
                                <h3 class="h1"><span
                                            class="counter"><?php echo htmlspecialchars($data["salary"]["Unpaid_leave_day"]); ?></span>
                                </h3><i class="material-icons list-icon">event_available</i>
                            </div>
                            <!-- /.widget-counter -->
                        </div>
                        <!-- /.widget-body -->
                    </div>
                    <!-- /.widget-bg -->
                </div>
                <!-- /.widget-holder -->
            </div>
            <div class="row">
                <!-- /.widget-holder -->
                <div class="col-md-12 widget-holder">
                    <div class="widget-bg">
                        <div class="widget-body clearfix">
                            <h5 class="box-title"><?php echo 'Lương năm ' . date('Y') . ' theo từng tháng'; ?></h5>
                            <canvas id="chartJsBar" height="100"></canvas>
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
                            <h5 class="box-title">Danh sách đơn xin nghỉ phép</h5>
                            <div class="padded-reverse">
                                <table class="table table-striped widget-status-table mr-b-0">
                                    <thead>
                                    <tr>
                                        <th class="pd-l-20">ID Đơn</th>
                                        <th>Trạng thái</th>
                                        <th class="hidden-xs">Ngày bắt đầu</th>
                                        <th class="hidden-xs">Ngày kết thúc</th>
                                        <th class="text-right pd-r-20">Tác vụ</th>
                                    </tr>
                                    </thead>
                                    <?php
                                    $result = $data["list_form"];
                                    foreach ($result as $key => $value) {
                                        $parament = $value['IdForm'];
                                        $link1 = '/view/leave_day_form/' . $parament;
                                        $link2 = '/delete/leave_day_form/' . $parament;
                                        ?>
                                        <tbody>
                                        <tr>
                                            <th class="pd-l-20"><?php echo htmlspecialchars($value['IdForm']); ?></a>
                                            </th>
                                            <?php
                                            if ($value['Form_Status'] === 'Approved') echo "<td><span class=\"badge badge-info text-inverse\">Đã duyệt</span></td>";
                                            else echo "<td><span class=\"badge badge-danger text-inverse\">Đang chờ</span></td>";
                                            ?>
                                            <td class="text-muted hidden-xs"><?php echo htmlspecialchars(date('d/m/Y', strtotime($value['Start_Date']))); ?></td>
                                            <td class="text-muted hidden-xs"><?php echo htmlspecialchars(date('d/m/Y', strtotime($value['End_Date']))); ?></td>
                                            <td class="text-right"><a href="<?php echo $link1; ?>"><i
                                                            class="material-icons list-icon md-18 text-muted">edit</i></a>
                                                <a href="<?php echo $link2; ?>"><i
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
        </div>
        <!-- /.widget-list -->
        </main>
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
<script src="/public/assets/js/custom.js?v=225"></script>

</body>

</html>
