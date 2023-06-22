<section class="banner-area banner-area2 contact-bg text-center">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1><i><?php echo $title; ?></i></h1>
			</div>
		</div>
	</div>
</section>
<!-- Banner Area End -->
<?php
// print_r($profilanda);
// echo $this->session->userdata('userid');
// die();
?>

<div class="whole-wrap">
	<div class="container">
		<div class="section-top-border">
			<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
			<div class="flash-data-error" data-flashdata="<?php echo $this->session->flashdata('error'); ?>"></div>
			<div class="cart-actions cart-button-cuppon">
				<div class="cuppon-wrap text-center">
					<div class="row">
						<div class="col-md-8 text-left">
							<form action="" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label>Nama Lengkap</label>
									<input type="search" name="nama" class="single-input" value="<?php echo $profilanda['user_nama']; ?>">
									<small class="text-danger"><?php echo form_error('nama'); ?></small>
								</div>
								<div class="form-group">
									<label>No. KTP</label>
									<input type="search" name="noktp" class="single-input" value="<?php echo $profilanda['noktp']; ?>">
									<small class="text-danger"><?php echo form_error('noktp'); ?></small>
								</div>
								<div class="form-group">
									<label>No. HP</label>
									<input type="search" name="nohp" class="single-input" value="<?php echo $profilanda['nohp']; ?>">
									<small class="text-danger"><?php echo form_error('nohp'); ?></small>
								</div>
								<div class="form-group">
									<label>Alamat</label>
									<input type="search" name="alamat" class="single-input" value="<?php echo $profilanda['alamat']; ?>">
									<small class="text-danger"><?php echo form_error('alamat'); ?></small>
								</div>
								<div class="form-group">
									<label>Email</label>
									<input type="search" name="email" class="single-input" value="<?php echo $profilanda['user_email']; ?>">
									<small class="text-danger"><?php echo form_error('email'); ?></small>
								</div>
								<div class="form-group">
									<label>Foto Profil</label>
									<input type="file" name="fotoprofil" class="single-input">
									<small class="text-danger"><?php echo form_error('fotoprofil'); ?></small>
								</div>
								<div class="form-group">
									<label>Konfirmasi Password</label>
									<input type="password" name="password" class="single-input" placeholder="Konfirmasi password anda" required>
									<small class="text-danger"><?php echo form_error('password'); ?></small>
								</div>
								<div class="form-group">
									<button type="submit" class="genric-btn primary circle float-right">Simpan</button>
								</div>
							</form>
						</div>
						<div class="col-md-4 mt-4">
							<?php if ($profilanda['fotoprofil'] != "") { ?>
								<img width="100%" src="<?= base_url('upload/fotoprofil/' . $profilanda['fotoprofil']) ?>">
							<?php } else { ?>
								<img width="100%" src="<?= base_url('upload/fotoprofil/user.png') ?>">
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>