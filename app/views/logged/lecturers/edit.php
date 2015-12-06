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
                                Thông tin giảng viên
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">
                                <a href="<?php echo logged_url('lecturers'); ?>" class="btn btn-sm btn-primary">Danh sách giảng viên</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <form action="<?php echo api_url('lecturers/edit'); ?>" method="post" accept-charset="utf-8" role="form">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                                        Tài khoản:
                                    </label>
                                    <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4">
                                        <select name="userid" class="form-control" required="required">
                                            <option value="">Chọn người dùng</option>
                                            <?php foreach ($users as $user): ?>
                                                <option <?php echo ($user->id == $lecturer->userid) ? 'selected="selected"' : ''; ?> value="<?php echo $user->id; ?>"><?php echo $user->name; ?></option>
                                            <?php endforeach?>
                                        </select>
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
                                            <option value="">Chọn khoa của giảng viên</option>
                                            <?php foreach ($departments as $department): ?>
                                                <option <?php echo ($department->departmentid == $lecturer->departmentid) ? 'selected="selected"' : ''; ?> value="<?php echo $department->departmentid; ?>"><?php echo $department->name; ?></option>
                                            <?php endforeach?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                                        Giới tính:
                                    </label>
                                    <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4">
                                        <select name="gender" class="form-control" required="required">
                                            <option value="">Giới tính</option>
                                            <option <?php echo ($lecturer->gender == 1) ? 'selected="selected"' : ''; ?> value="1">Nam</option>
                                            <option <?php echo ($lecturer->gender == 0) ? 'selected="selected"' : ''; ?> value="2">Nữ</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                                        Ngày sinh:
                                    </label>
                                    <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4">
                                        <input type="text" name="birthday" class="form-control" value="<?php echo date_format(date_create($lecturer->birthday), 'd/m/Y'); ?>" required="required" placeholder="Nhập ngày sinh giảng viên">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                                        Địa chỉ:
                                    </label>
                                    <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4">
                                        <input type="text" name="address" class="form-control" value="<?php echo $lecturer->address; ?>" required="required" placeholder="Nhập địa chỉ của giảng viên">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                                        <input type="hidden" name="id" value="<?php echo $lecturer->id; ?>">
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