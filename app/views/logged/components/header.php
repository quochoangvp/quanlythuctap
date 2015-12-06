<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $title; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="/public/admin/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/public/admin/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="/public/admin/bower_components/bootstrap3-dialog/dist/css/bootstrap-dialog.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/public/admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/public/admin/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <?php if (isset($css_array)): ?>
    <?php foreach ($css_array as $css): ?>
    <link href="/public/admin/<?php echo $css; ?>" rel="stylesheet" type="text/css"/>
    <?php endforeach?>
    <?php endif?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo site_url(); ?>">DevTeam</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <?php echo $_SESSION['user']['username']; ?> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo site_url('logout'); ?>"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a></li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
<?php
$menu = array(
    array(
        'title' => 'Trang chủ',
        'url' => 'dashboard',
        'icon' => '<i class="fa fa-dashboard fa-fw"></i>',
        'type' => array(
            '1', //Sinh viên
            '2', // Giảng viên phụ trách
            '3', // Công ty thực tập
            '4', // Giáo vụ
            '5', // Quản trị
            '6', // Bộ phận phụ trách
        ),
    ),
    array(
        'title' => 'Điền mẫu đơn',
        'icon' => '<i class="fa fa-pencil fa-fw"></i>',
        'url' => 'form_submit',
        'type' => array(
            '1', // Sinh viên
        ),
    ),
    array(
        'title' => 'Nhận mẫu đơn',
        'icon' => '<i class="fa fa-calendar fa-fw"></i>',
        'url' => 'form_receive',
        'type' => array(
            '1', // Sinh viên
        ),
    ),
    array(
        'title' => 'Giảng viên',
        'icon' => '<i class="fa fa-user fa-fw"></i>',
        'url' => 'lecturers',
        'type' => array(
            '1', // Sinh viên
            '3', // Công ty thực tập
        ),
    ),
    array(
        'title' => 'Công ty',
        'icon' => '<i class="fa fa-institution fa-fw"></i>',
        'url' => 'companies',
        'type' => array(
            '1', // Sinh viên
            '2', // Giảng viên phụ trách
        ),
    ),
    array(
        'title' => 'Đăng ký thực tập',
        'icon' => '<i class="fa fa-pencil-square-o fa-fw"></i>',
        'url' => 'register_internship',
        'type' => array(
            '1', // Sinh viên
        ),
    ),
    array(
        'title' => 'Báo các thực tập',
        'icon' => '<i class="fa fa-file-text-o fa-fw"></i>',
        'url' => 'practice_report',
        'type' => array(
            '1', // Sinh viên
            '2', // Giảng viên phụ trách
            '3', // Công ty thực tập
        ),
    ),
    array(
        'title' => 'Người dùng',
        'icon' => '<i class="fa fa-user fa-fw"></i>',
        'url' => 'user',
        'type' => array(
            '5', // Quản trị
        ),
    ),
    array(
        'title' => 'Duyệt đơn',
        'icon' => '<i class="fa fa-file-text-o fa-fw"></i>',
        'url' => 'required_forms',
        'type' => array(
            '4', // Giáo vụ
        ),
    ),
    array(
        'title' => 'Lớp',
        'icon' => '<i class="fa fa-university fa-fw"></i>',
        'url' => 'classes',
        'type' => array(
            '5', // Quản trị
        ),
    ),
    array(
        'title' => 'Ngành',
        'icon' => '<i class="fa fa-briefcase fa-fw"></i>',
        'url' => 'department',
        'type' => array(
            '5', // Quản trị
        ),
    ),
    array(
        'title' => 'Sinh viên',
        'icon' => '<i class="fa fa-graduation-cap fa-fw"></i>',
        'url' => 'student',
        'type' => array(
            '2', // Giảng viên phụ trách
            '3', // Công ty thực tập
            '5', // Quản trị
        ),
    ),
    array(
        'title' => 'Công ty',
        'icon' => '<i class="fa fa-suitcase fa-fw"></i>',
        'url' => 'companies',
        'type' => array(
            '5', // Quản trị
        ),
    ),
    array(
        'title' => 'Mẫu đơn',
        'icon' => '<i class="fa fa-file-text-o fa-fw"></i>',
        'url' => 'form',
        'type' => array(
            '5', // Quản trị
        ),
    ),
    array(
        'title' => 'Phân công thực tập',
        'icon' => '<i class="fa fa-briefcase fa-fw"></i>',
        'url' => 'assigning_practice',
        'type' => array(
            '6', // Quản trị
        ),
    ),
);
echo make_adminmenu($menu);
?>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>