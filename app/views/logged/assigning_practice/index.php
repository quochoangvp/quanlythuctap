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
                                Các công việc thực tập đã phân
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">
                                <a href="<?php echo logged_url('assigning_practice/add'); ?>" class="btn btn-sm btn-primary">Phân công</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables" data-url-process-delete="<?php echo api_url('assigning_practice/delete') ?>">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Sinh viên</th>
                                        <th>Giảng viên</th>
                                        <th>Công ty</th>
                                        <th>Ngày bắt đầu</th>
                                        <th>Ngày kết thúc</th>
                                        <th>Quản lý</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($assigned as $ap): ?>
                                    <tr>
                                        <td><?php echo $ap->ap_id; ?></td>
                                        <td><?php echo $ap->student; ?></td>
                                        <td><?php echo $ap->teacher; ?></td>
                                        <td><?php echo $ap->company; ?></td>
                                        <td><?php echo date_format(date_create($ap->created_at), 'd/m/Y'); ?></td>
                                        <td><?php echo date_format(date_create($ap->ended_at), 'd/m/Y'); ?></td>
                                        <td class="text-center">
                                            <a href="<?php echo logged_url('assigning_practice/edit'); ?>?id=<?php echo $ap->ap_id; ?>" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                            <a href="javascript:;" data-action="delete" data-id="<?php echo $ap->ap_id; ?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
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