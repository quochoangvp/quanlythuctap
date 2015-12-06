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
                                Danh sách giảng viên
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">
                                <?php if (is_admin()): ?>
                                    <a class="btn btn-sm btn-primary" href="<?php echo logged_url('lecturers/add'); ?>">Thêm mới</a>
                                <?php endif?>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables" data-url-process-delete="<?php echo api_url('lecturers/delete') ?>">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Họ tên</th>
                                        <th>Ngày sinh</th>
                                        <th>Email</th>
                                        <th>Thuộc khoa</th>
                                        <?php if (is_admin()): ?>
                                        <th>Quản lý</th>
                                        <?php endif;?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($lecturers as $lecturer): ?>
                                    <tr>
                                        <td><?php echo $lecturer->id; ?></td>
                                        <td><?php echo $lecturer->user_name; ?></td>
                                        <td><?php echo date_format(date_create($lecturer->birthday), 'd/m/Y'); ?></td>
                                        <td><?php echo $lecturer->user_email; ?></td>
                                        <td><?php echo $lecturer->departmentName; ?></td>
                                        <?php if (is_admin()): ?>
                                        <td class="text-center">
                                            <a href="<?php echo logged_url('lecturers/edit'); ?>?id=<?php echo $lecturer->id; ?>" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                            <a href="javascript:;" data-action="delete" data-id="<?php echo $lecturer->id; ?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                                        </td>
                                        <?php endif;?>
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