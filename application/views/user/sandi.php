<section class="banner-area banner-area2 contact-bg text-center">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1><i><?php echo $title; ?></i></h1>
			</div>
		</div>
	</div>
</section>

<div class="whole-wrap">
	<div class="container">
		<div class="section-top-border">
			<div class="row">
				<div class="col-md-12">
					<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
					<div class="flash-data-error" data-flashdata="<?php echo $this->session->flashdata('error'); ?>"></div>
					<form action="" method="post">
						<div class="mt-10">
							<label>Password Baru</label>
							<input type="password" name="sandi2" placeholder="Password baru" class="single-input">
						</div>
						<br>
						<div class="mt-10">
							<label>Konfirmasi Password Baru</label>
							<input type="password" name="sandi1" placeholder="Konfirmasi password baru" class="single-input">
						</div>
						<br>
						<div class="mt-10">
							<label>Konfirmasi Password Lama</label>
							<input type="password" name="sandi" placeholder="Konfirmasi password lama" class="single-input">
						</div>
						<br>
						<button class="genric-btn primary circle float-right" type="submit">
							<span> Simpan </span>
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Align Area -->