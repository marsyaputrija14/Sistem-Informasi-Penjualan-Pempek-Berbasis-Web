<section class="banner-area banner-area2 contact-bg text-center">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1><i>Akun</i></h1>
			</div>
		</div>
	</div>
</section>

<div class="whole-wrap">
	<div class="container">
		<div class="section-top-border">
			<div class="row">
				<div class="col-lg-6 col-md-8">
					<h3 class="mb-30 title_color">Buat Akun</h3>
					<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
					<div class="flash-data-error" data-flashdata="<?php echo $this->session->flashdata('error'); ?>"></div>
					<form action="<?php echo base_url(); ?>register" method="post">
						<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
						<div class="mt-10">
							<label>Nama</label>
							<input type="text" name="nama" value="<?php echo set_value('nama'); ?>" autofocus="" class="single-input">
							<small class="text-danger"><?php echo form_error('nama'); ?></small>
						</div>
						<div class="mt-10">
							<label>No. KTP</label>
							<input type="text" name="noktp" value="<?php echo set_value('noktp'); ?>" class="single-input">
							<small class="text-danger"><?php echo form_error('noktp'); ?></small>
						</div>
						<div class="mt-10">
							<label>No. HP</label>
							<input type="text" name="nohp" value="<?php echo set_value('nohp'); ?>" autofocus="" class="single-input">
							<small class="text-danger"><?php echo form_error('nohp'); ?></small>
						</div>
						<div class="mt-10">
							<label>Alamat</label>
							<input type="text" name="alamat" value="<?php echo set_value('alamat'); ?>" autofocus="" class="single-input">
							<small class="text-danger"><?php echo form_error('alamat'); ?></small>
						</div>
						<div class="mt-10">
							<label>Email</label>
							<input type="email" name="email_reg" value="@gmail.com" class="single-input">
							<small class="text-danger"><?php echo form_error('email_reg'); ?></small>
						</div>
						<div class="mt-10">
							<label>Sandi</label>
							<input type="password" name="password1" class="single-input">
							<small class="text-danger"><?php echo form_error('password1'); ?></small>
						</div>
						<div class="mt-10">
							<label>Konfirmasi Ulang Sandi</label>
							<input type="password" name="password2" class="single-input">
							<small class="text-danger"><?php echo form_error('password2'); ?></small>
						</div>
						<br>
						<button class="genric-btn primary circle float-right" type="submit" id="acc_Create">
							<span> <i class="fa fa-user btn_icon"></i> Buat akun </span>
						</button>
					</form>
				</div>
				<div class="col-lg-6 col-md-4 mt-sm-30 element-wrap">
					<div class="single-element-widget">
						<h3 class="mb-30 title_color">Sudah Terdaftar ?</h3>
						<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
						<form action="<?php echo base_url(); ?>login" method="post">
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
							<div class="mt-10">
								<label>Email</label>
								<input type="email" name="email" class="single-input">
								<small class="text-danger"><?php echo form_error('email'); ?></small>
							</div>
							<div class="mt-10">
								<label>Sandi</label>
								<input type="password" name="password" class="single-input">
								<small class="text-danger"><?php echo form_error('password'); ?></small>
							</div>
							<br>
							<button class="genric-btn primary circle float-right" type="submit" id="acc_Login">
								<span> <i class="fa fa-lock btn_icon"></i> Login </span>
							</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Align Area -->