<?php $this->load->view('logged/components/header', $this->data);?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $title; ?></h1>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Nội dung
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <?php if (count($regs) == 0): ?>
                            <form action="<?php echo api_url('register_internship/add'); ?>" method="post" accept-charset="utf-8" role="form" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                                            Phiếu đăng ký thực tập:
                                        </label>
                                        <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4">
                                            <input type="file" name="attachment" class="form-control" value="" required="required">
                                            <i class="help-block">Hỗ trợ các tập tin: (doc,docx,pdf,xlsx,xls,ppt,pptx)</i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                                            &nbsp;
                                        </label>
                                        <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4">
                                            <button type="submit" class="btn btn-primary" data-loading-text="Đang lưu...">Lưu</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        <?php else: ?>
                            <?php if ($regs[0]->reg_status == 0): ?>
                                <p class="text-center text-danger">Bạn đã nộp phiếu đăng ký thực tập, xin chờ phản hồi từ bộ phận phụ trách</p>
                            <?php else: ?>
                                <p class="text-center text-success">Xin chúc mừng, phiếu đăng ký của bạn đã được duyệt</p>
                            <?php endif?>
                        <?php endif?>
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