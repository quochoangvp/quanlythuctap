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
                                Danh sách lớp
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">
                                <?php if (is_admin()): ?>
                                <a class="btn btn-sm btn-primary" href="<?php echo logged_url('student/add'); ?>">Thêm mới</a>
                                <a class="btn btn-sm btn-info" href="<?php echo logged_url('student/excel_import'); ?>">Excel import</a>
                                <?php endif?>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables" data-url-process-delete="<?php echo api_url('student/delete') ?>">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Mã sinh viên</th>
                                        <th>Họ tên</th>
                                        <th>Ngày sinh</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Lớp</th>
                                        <?php if (is_admin()): ?>
                                        <th>Quản lý</th>
                                        <?php endif;?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($students as $student): ?>
                                    <tr>
                                        <td><?php echo $student->id; ?></td>
                                        <td><?php echo $student->mssv; ?></td>
                                        <td><?php echo $student->name; ?></td>
                                        <td><?php echo date_format(date_create($student->birthday), 'd/m/Y'); ?></td>
                                        <td><?php echo $student->email; ?></td>
                                        <td><?php echo $student->phonenumber; ?></td>
                                        <td><?php echo $student->className; ?></td>
                                        <?php if (is_admin()): ?>
                                        <td class="text-center">
                                            <a href="<?php echo logged_url('student/edit'); ?>?id=<?php echo $student->id; ?>" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                            <a href="javascript:;" data-action="delete" data-id="<?php echo $student->id; ?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
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