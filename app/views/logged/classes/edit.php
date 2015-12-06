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
                                Thông tin lớp
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">
                                <a href="<?php echo logged_url('classes'); ?>" class="btn btn-sm btn-primary">Danh sách lớp</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <form action="<?php echo api_url('classes/edit'); ?>" method="post" accept-charset="utf-8" role="form">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                                        Tên lớp:
                                    </label>
                                    <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4">
                                        <input type="text" name="name" class="form-control" value="<?php echo $class->name; ?>" required="required" placeholder="Nhập tên ngành">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                                        Khoa:
                                    </label>
                                    <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4">
                                        <select name="departmentid" class="form-control" required="required">
                                            <option value="">Chọn ngành</option>
                                            <?php foreach ($departments as $item): ?>
                                                <option <?php echo ($item->departmentid == $class->departmentid) ? 'selected="selected"' : ''; ?> value="<?php echo $item->departmentid; ?>"><?php echo $item->name; ?></option>
                                            <?php endforeach?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                                        <input type="hidden" name="classid" value="<?php echo $class->classid; ?>">
                                    </label>
                                    <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4">
                                        <button type="submit" class="btn btn-primary" data-loading-text="Đang lưu...">Lưu</button>
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