<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Tambah Pengguna</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Pengguna </li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('admin/penggunatambah') ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Pengguna</label>
                                        <input type="text" class="form-control" name="admin_nama" value="<?php echo set_value('admin_nama'); ?>" placeholder="" required>
                                        <small class="text-danger"><?php echo form_error('admin_nama'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Username Pengguna</label>
                                        <input type="text" class="form-control" name="admin_username" value="<?php echo set_value('admin_username'); ?>" placeholder="" required>
                                        <small class="text-danger"><?php echo form_error('admin_username'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email Pengguna</label>
                                        <input type="text" class="form-control" name="admin_email" value="<?php echo set_value('admin_email'); ?>" placeholder="" required>
                                        <small class="text-danger"><?php echo form_error('admin_email'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password Pengguna</label>
                                        <input type="text" class="form-control" name="admin_sandi" value="<?php echo set_value('admin_sandi'); ?>" placeholder="" required>
                                        <small class="text-danger"><?php echo form_error('admin_sandi'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-primary mr-2"> Simpan </button>
                                        <button class="btn btn-light" onclick="goBack()">Batal</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>