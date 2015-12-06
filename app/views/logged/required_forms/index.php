<?php $this->load->view('logged/components/header', $this->data);?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $title; ?></h1>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Danh sách đơn
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Sinh viên gửi</th>
                                        <th>Trạng thái</th>
                                        <th>Quản lý</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($forms as $form): ?>
                                    <tr>
                                        <td><?php echo $form->rqf_id; ?></td>
                                        <td><?php echo $form->student; ?></td>
                                        <td>
<?php
echo ($form->rqf_status == 1) ? '<span class="label label-success">Đã duyệt</span>' : '<span class="label label-warning">Chưa duyệt</span>'
?>
                                        </td>
                                        <td class="text-center">
                                            <a
                                                data-toggle="modal"
                                                href="#approve"
                                                data-id="<?php echo $form->rqf_id; ?>"
                                                class="btn btn-xs btn-success"
                                            >
                                                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                            </a>
                                            <a
                                                href="javascript:;"
                                                data-action="print"
                                                data-id="<?php echo $form->rqf_id; ?>"
                                                class="btn btn-xs btn-info"
                                            >
                                                <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
                                            </a>
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
<div class="modal fade" id="approve">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Chi tiết đơn</h4>
            </div>
            <div class="modal-body">
                <div class="content"></div>
                <hr>
                <div class="receive">
                    <label>Ngày nhận</label>
                    <input type="date" name="receive_date" class="form-control" value="" required="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" data-action="approve">Duyệt</button>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('logged/components/footer', $this->data);?>