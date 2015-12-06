<?php $this->load->view('logged/components/header', $this->data);?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $title; ?></h1>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Điền theo mẫu đơn bên dưới
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <form action="/api/form_submit/send.html" method="post">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                                        Nội dung:
                                    </label>
                                    <div class="col-xs-12 col-sm-8 col-md-6 col-lg-9">
                                        <textarea name="rqf_body" class="form-control tinymce" rows="7" required="required"><?php echo $form->form_body; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                                        <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user')['id'] ?>">
                                    </label>
                                    <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4">
                                        <button type="submit" class="btn btn-primary" data-loading-text="Đang gửi...">Gửi</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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