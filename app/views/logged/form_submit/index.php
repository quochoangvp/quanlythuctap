<?php $this->load->view('logged/components/header', $this->data);?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $title; ?></h1>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Danh sách mẫu đơn
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables" data-url-process-delete="<?php echo api_url('user/delete') ?>">
                                <thead>
                                    <tr>
                                        <th style="width: 20%">Mẫu đơn</th>
                                        <th>Tóm tắt nội dung</th>
                                        <th style="width: 8%">Gửi đơn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($forms as $form): ?>
                                        <tr>
                                            <td><?php echo $form->form_title; ?></td>
                                            <td><?php echo limit_to_numwords($form->form_body, 60); ?></td>
                                            <td class="text-center">
                                                <a href="<?php echo logged_url('form_submit/send'); ?>?id=<?php echo $form->form_id; ?>">
                                                    <span class="label label-success"><i class="fa fa-send"></i></span>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach?>
                                </tbody>
                            </table>
                        </div>
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