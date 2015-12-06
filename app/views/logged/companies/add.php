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
                                Thông tin công ty
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">
                                <a href="<?php echo logged_url('companies'); ?>" class="btn btn-sm btn-primary">Danh sách công ty</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <form action="<?php echo api_url('companies/add'); ?>" method="post" accept-charset="utf-8" role="form">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                                        Tên công ty:
                                    </label>
                                    <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4">
                                        <input type="text" name="name" class="form-control" value="" required="required" placeholder="Nhập tên công ty">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                                        Địa chỉ:
                                    </label>
                                    <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4">
                                        <input type="text" name="address" class="form-control" value="" required="required" placeholder="Nhập địa chỉ công ty">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                                        Người quản lý:
                                    </label>
                                    <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4">
                                        <select name="userid" class="form-control" required="required">
                                            <option value="">Chọn người quản lý</option>
                                            <?php foreach ($users as $item): ?>
                                                <option value="<?php echo $item->id; ?>"><?php echo $item->name; ?></option>
                                            <?php endforeach?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                                        &nbsp;
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