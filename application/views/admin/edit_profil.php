<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">Perbaharui Profil Saya</h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Perbaharui Profil Saya </li>
        </ol>
      </nav>
    </div>
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4">Perbaharui Profil Saya</h4>
            <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
            <div class="flash-data-error" data-flashdata="<?php echo $this->session->flashdata('error'); ?>"></div>
            <form action="" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label class="mb-3" class="mb-3">Nama Lengkap</label>
                <input type="text" class="form-control" value="<?php echo $profilsaya['admin_nama']; ?>" name="nama" />
                <small class="text-danger"><?php echo form_error('nama'); ?></small>
              </div>
              <div class="form-group">
                <label class="mb-3">Email </label>
                <input type="text" class="form-control" value="<?php echo $profilsaya['admin_email']; ?>" name="email" />
                <small class="text-danger"><?php echo form_error('email'); ?></small>

              </div>
              <div class="form-group">
                <label class="mb-3">Username</label>
                <input type="text" class="form-control" value="<?php echo $profilsaya['admin_username']; ?>" name="username" />
                <small class="text-danger"><?php echo form_error('username'); ?></small>
              </div>
              <div class="form-group">
                <label class="mb-3">Upload gambar</label><br>
                <input type="file" name="gambar">
                <input type="hidden" name="gambar_old" value="<?php echo $profilsaya['admin_foto']; ?>">
              </div>
              <div class="form-group">
                <label class="mb-3">Konfirmasi Password</label>
                <input name="sandi" type="password" class="form-control">
                <small class="text-danger"><?php echo form_error('sandi'); ?></small>
              </div>
              <div class="float-right">
                <button type="submit" class="btn btn-primary mr-2"> Simpan </button>
                <button class="btn btn-light" onclick="goBack()">Batal</button>
              </div>
            </form>
          </div>
        </div>
      </div>