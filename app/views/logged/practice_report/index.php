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
                                <?php if ($this->session->userdata('user')['type'] == 1 && !count($reports)): ?>
                                <a href="<?php echo logged_url('practice_report/add'); ?>" class="btn btn-sm btn-primary">Thêm mới</a>
                                <?php endif?>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tiêu đề</th>
                                        <?php if ($this->session->userdata('user')['type'] != 1): ?>
                                        <th>Sinh viên</th>
                                        <?php endif;?>
                                        <th>Tập tin báo cáo</th>
                                        <?php if ($this->session->userdata('user')['type'] == 1): ?>
                                        <th>Quản lý</th>
                                        <?php endif?>
                                        <?php if ($this->session->userdata('user')['type'] != 1): ?>
                                        <th class="text-center">Nhận xét</th>
                                        <?php endif?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($reports[0])): ?>
                                        <?php foreach ($reports as $report): ?>
                                        <tr>
                                            <td><?php echo $report->pr_id; ?></td>
                                            <td><?php echo $report->pr_title; ?></td>
                                            <?php if ($this->session->userdata('user')['type'] != 1): ?>
                                                <td><?php echo $report->student_name; ?></td>
                                            <?php endif?>
                                            <td><a href="<?php echo base_url() . 'uploads/' . $report->pr_attachment; ?>">Tải xuống</a></td>
                                            <?php if ($this->session->userdata('user')['type'] == 1): ?>
                                            <td class="text-center">
                                                <a href="<?php echo logged_url('practice_report/edit'); ?>?id=<?php echo $report->pr_id; ?>" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                            </td>
                                            <?php endif?>
                                            <?php if ($this->session->userdata('user')['type'] != 1): ?>
                                                <td class="text-center">
                                                    <a href="<?php echo logged_url('practice_report/comment/' . $report->pr_id) ?>">Nhận xét</a>
                                                </td>
                                            <?php endif?>
                                        </tr>
                                        <?php endforeach?>
                                    <?php endif?>
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
            <?php if ($this->session->userdata('user')['type'] == 1): ?>
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Nhận xét của công ty
                    </div>
                    <div class="panel-body">
<?php
if (isset($reports[0])) {
    echo $reports[0]->company_cmt;
}
?>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Nhận xét của giáo viên phụ trách
                    </div>
                    <div class="panel-body">
<?php
if (isset($reports[0])) {
    echo $reports[0]->teacher_cmt;
}
?>
                    </div>
                </div>
            </div>
            <?php endif?>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<?php $this->load->view('logged/components/footer', $this->data);?>