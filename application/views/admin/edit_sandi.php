<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">Perbaharui Kata Sandi Saya</h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Perbaharui Kata Sandi Saya </li>
        </ol>
      </nav>
    </div>
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4">Perbaharui Kata Sandi Saya</h4>
            <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
            <div class="flash-data-error" data-flashdata="<?php echo $this->session->flashdata('error'); ?>"></div>
            <form action="" method="post">
              <div class="form-group">
                <label class="mb-3" class="mb-3">Sandi Baru</label>
                <input type="text" class="form-control" name="sandi2" type="password">
                <small class="text-danger"><?php echo form_error('sandi2'); ?></small>
              </div>
              <div class="form-group">
                <label class="mb-3">Konfirmasi Sandi Baru </label>
                <input type="text" class="form-control" name="sandi1" type="password">
                <small class="text-danger"><?php echo form_error('sandi1'); ?></small>
              </div>
              <div class="form-group">
                <label class="mb-3">Konfirmasi Sandi Lama</label>
                <input type="password" class="form-control" name="sandi" type="password">
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