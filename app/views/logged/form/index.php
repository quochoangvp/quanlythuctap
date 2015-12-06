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
                                Danh sách mẫu đơn
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">
                                <a href="<?php echo logged_url('form/add'); ?>" class="btn btn-sm btn-primary">Thêm mới</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables" data-url-process-delete="<?php echo api_url('form/delete') ?>">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tiêu đề</th>
                                        <th>Trạng thái</th>
                                        <th>Quản lý</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($forms as $form): ?>
                                    <tr>
                                        <td><?php echo $form->form_id; ?></td>
                                        <td><?php echo $form->form_title; ?></td>
                                        <td>
<?php
switch ($form->form_status) {
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
                                            <a href="<?php echo logged_url('form/edit'); ?>?id=<?php echo $form->form_id; ?>" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                            <a href="javascript:;" data-action="delete" data-id="<?php echo $form->form_id; ?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
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