<?php $this->load->view('logged/components/header', $this->data);?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $title; ?></h1>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Nhận xét của công ty
                    </div>
                    <div class="panel-body">
                    <div class="form-group">
                        <?php echo $report->company_cmt; ?>
                    </div>
<?php if ($this->session->userdata('user')['type'] == 3): ?>
    <form action="/api/practice_report/add_comment" method="post" accept-charset="utf-8">
        <div class="form-group">
            <label>Nội dung nhận xét</label>
            <textarea name="content" class="form-control" rows="5" required="required"></textarea>
            <input type="hidden" name="type" value="3">
            <input type="hidden" name="pr_id" value="<?php echo $report->pr_id; ?>">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Gửi</button>
        </div>
    </form>
<?php endif?>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Nhận xét của giáo viên phụ trách
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <?php echo $report->teacher_cmt; ?>
                        </div>
<?php if ($this->session->userdata('user')['type'] == 2): ?>
    <form action="/api/practice_report/add_comment" method="post" accept-charset="utf-8">
        <div class="form-group">
            <label>Nội dung nhận xét</label>
            <textarea name="content" class="form-control" rows="5" required="required"></textarea>
            <input type="hidden" name="type" value="2">
            <input type="hidden" name="pr_id" value="<?php echo $report->pr_id; ?>">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Gửi</button>
        </div>
    </form>
<?php endif?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<?php $this->load->view('logged/components/footer', $this->data);?>