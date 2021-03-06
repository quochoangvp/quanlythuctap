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
                                Thông tin chi tiết thành viên
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">
                                <a href="<?php echo logged_url('user'); ?>" class="btn btn-sm btn-primary">Danh sách thành viên</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <form action="<?php echo api_url('user/edit'); ?>" method="post" accept-charset="utf-8" role="form">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                                        Tên người dùng:
                                    </label>
                                    <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4">
                                        <input type="text" name="username" class="form-control" value="<?php echo $user->username; ?>" required="required" placeholder="Nhập tên người dùng">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                                        Họ tên:
                                    </label>
                                    <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4">
                                        <input type="text" name="name" class="form-control" value="<?php echo $user->name; ?>" required="required" placeholder="Nhập họ tên">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                                        Email:
                                    </label>
                                    <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4">
                                        <input type="email" name="email" class="form-control" value="<?php echo $user->email; ?>" required="required" placeholder="Nhập email">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                                        Mật khẩu:
                                    </label>
                                    <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4">
                                        <input type="password" name="password" class="form-control" value="" required="required" placeholder="******">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                                        Nhóm thành viên:
                                    </label>
                                    <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4">
                                        <select name="type" class="form-control" required="required">
                                            <option value="">Chọn nhóm thành viên</option>
                                            <option <?php echo ($user->type == 1) ? 'selected="selected"' : ''; ?> value="1">Sinh viên</option>
                                            <option <?php echo ($user->type == 2) ? 'selected="selected"' : ''; ?> value="2">Giảng viên phụ trách</option>
                                            <option <?php echo ($user->type == 3) ? 'selected="selected"' : ''; ?> value="3">Công ty thực tập</option>
                                            <option <?php echo ($user->type == 4) ? 'selected="selected"' : ''; ?> value="4">Giáo vụ</option>
                                            <option <?php echo ($user->type == 6) ? 'selected="selected"' : ''; ?> value="6">Bộ phận phụ trách</option>
                                            <option <?php echo ($user->type == 5) ? 'selected="selected"' : ''; ?>value="5">Quản trị</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                                        Khoa (nếu có):
                                    </label>
                                    <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4">
                                        <select name="departmentid" class="form-control">
                                            <option value="">Chọn khoa</option>
                                            <?php foreach ($departments as $item): ?>
                                                <option <?php echo ($item->departmentid == $user->departmentid) ? 'selected="selected"' : ''; ?> value="<?php echo $item->departmentid; ?>"><?php echo $item->name; ?></option>
                                            <?php endforeach?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                                        Trạng thái:
                                    </label>
                                    <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4">
                                        <select name="status" class="form-control" required="required">
                                            <option value="">Chọn trạng thái</option>
                                            <option <?php echo ($user->status == 1) ? 'selected="selected"' : ''; ?> value="1">Hoạt động</option>
                                            <option <?php echo ($user->status == 0) ? 'selected="selected"' : ''; ?> value="0">Không hoạt động</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                                        <input type="hidden" name="id" value="<?php echo $user->id; ?>">
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