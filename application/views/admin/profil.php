<div class="inner-bg">
  <div class="element-title">
    <h4>Edit profil</h4>
    <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
    <div class="flash-data-error" data-flashdata="<?php echo $this->session->flashdata('error'); ?>"></div>
  </div>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="pnl-bdy billing-sec">
      <div class="row">
        <div class="col-md-12 col-sm-12 field">
          <label>Nama Toko</label>
          <input value="<?php echo $profiltoko['profil_nama']; ?>" name="nama" type="text">
          <small class="text-danger"><?php echo form_error('nama'); ?></small>
        </div>
        <div class="col-md-12 col-sm-12 field">
          <label>Email</label>
          <input value="<?php echo $profiltoko['profil_email']; ?>" name="email" type="text">
          <small class="text-danger"><?php echo form_error('email'); ?></small>
        </div>
        <div class="col-md-12 col-sm-12 field">
          <label>No Telepon</label>
          <input value="<?php echo $profiltoko['profil_telp']; ?>" name="telp" type="text">
          <small class="text-danger"><?php echo form_error('telp'); ?></small>
        </div>
        <div class="col-md-12 col-sm-12 field">
          <label>Alamat</label>
          <textarea cols="30" name="alamat" rows="10" placeholder=""><?php echo $profiltoko['profil_alamat']; ?></textarea>
          <small class="text-danger"><?php echo form_error('alamat'); ?></small>
        </div>
        <div class="col-md-12 col-sm-12 field">
          <span class="upload-image">upload logo</span>
          <label class="fileContainer"> <span>upload</span>
            <input type="file" name="gambar">
            <input type="hidden" name="gambar_old" value="<?php echo $profiltoko['profil_logo']; ?>">
          </label>
        </div>
        <div class="col-md-6 col-sm-6 field">
          <label>Facebook</label>
          <input value="<?php echo $profiltoko['profil_fb']; ?>" name="fb" type="text">
          <small class="text-danger"><?php echo form_error('fb'); ?></small>
        </div>
        <div class="col-md-6 col-sm-6 field">
          <label>WhatsApp</label>
          <input value="<?php echo $profiltoko['profil_wa']; ?>" name="wa" type="text">
          <small class="text-danger"><?php echo form_error('wa'); ?></small>
        </div>
        <div class="col-md-6 col-sm-6 field">
          <label>Instagram</label>
          <input value="<?php echo $profiltoko['profil_ig']; ?>" name="ig" type="text">
          <small class="text-danger"><?php echo form_error('ig'); ?></small>
        </div>
        <div class="col-md-6 col-sm-6 field">
          <label>Twitter</label>
          <input value="<?php echo $profiltoko['profil_tw']; ?>" name="tw" type="text">
          <small class="text-danger"><?php echo form_error('tw'); ?></small>
        </div>
        <div class="col-md-12 col-sm-12">
          <button type="submit">Simpan</button>
        </div>
      </div>
    </div>
  </form>
</div>