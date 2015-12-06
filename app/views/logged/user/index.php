<?php $this->load->view('logged/components/header', $this->data);?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $title; ?></h1>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                Danh sách thành viên
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">
                                <a href="<?php echo logged_url('user/add'); ?>" class="btn btn-sm btn-primary">Thêm mới</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables" data-url-process-delete="<?php echo api_url('user/delete') ?>">
                                <thead>
                                    <tr>
                                        <th>Tên người dùng</th>
                                        <th>Họ tên</th>
                                        <th>Email</th>
                                        <th>Nhóm</th>
                                        <th>Khoa</th>
                                        <th>Trạng thái</th>
                                        <th>Quản lý</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td><?php echo $user->username; ?></td>
                                        <td><?php echo $user->name; ?></td>
                                        <td><?php echo $user->email; ?></td>
                                        <td>
                                            <span class="label label-<?php
switch ($user->type) {
    case '1':
        echo 'default';
        break;
    case '2':
        echo 'info';
        break;
    case '3':
        echo 'primary';
        break;
    case '4':
        echo 'warning';
        break;
    case '6':
        echo 'warning';
        break;
    default:
        echo 'danger';
        break;
}
?>"><?php
switch ($user->type) {
    case '1':
        echo 'Sinh viên';
        break;
    case '2':
        echo 'Giảng viên phụ trách';
        break;
    case '3':
        echo 'Công ty thực tập';
        break;
    case '4':
        echo 'Giáo vụ';
        break;
    case '6':
        echo 'Bộ phận phụ trách';
        break;
    default:
        echo 'Quản trị';
        break;
}
?></span>
                                        </td>
                                        <td><?php echo $user->department_name; ?></td>
                                        <td>
<?php
switch ($user->status) {
    case '1':
        echo '<span class="label label-success">Hoạt động</span>';
        break;
    default:
        echo '<span class="label label-danger">Không hoạt động</span>';
        break;
}
?>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?php echo logged_url('user/edit'); ?>?id=<?php echo $user->id; ?>" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                            <?php if ($user->type != '5'): ?>
                                                <a href="javascript:;" data-action="delete" data-id="<?php echo $user->id; ?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                                            <?php endif?>
                                        </td>
                                    </tr>
                                    <?php endforeach?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<?php $this->load->view('logged/components/footer', $this->data);?>