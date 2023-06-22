<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required Meta Tags -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<!-- Page Title -->
	<title>Pempek Ce'ta</title>

	<!-- Favicon -->
	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets_login/images/inilogo.jpeg">

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?php echo base_url('assets_home/css/animate-3.7.0.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets_home/css/font-awesome-4.7.0.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets_home/css/bootstrap-4.1.3.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets_home/css/owl-carousel.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets_home/css/jquery.datetimepicker.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets_home/css/style.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets_home/css/style.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/fonts/flat-icon/flaticon.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/nice-select.css'); ?>">

</head>

<body>
	<!-- Preloader Starts -->
	<div class="preloader">
		<div class="spinner"></div>
	</div>
	<header class="header-area header-area2">
		<div class="container">
			<div class="row">
				<div class="col-lg-2">
					<div class="logo-area">
						<a href="<?php echo base_url(); ?>"><img style="width: 60%;height:80px;border-radius:10%;" src="<?= base_url('assets_home/images/inilogo.jpeg') ?>" alt="logo"></a>
					</div>
				</div>
				<div class="col-lg-10">
					<div class="custom-navbar">
						<span></span>
						<span></span>
						<span></span>
					</div>
					<div class="main-menu main-menu2">
						<ul>
							<li class="active"><a href="<?php echo base_url(); ?>">home</a></li>
							<li><a href="<?php echo base_url(); ?>produkdaftar">Produk</a></li>
							<li><a href="#">Kategori</a>
								<ul class="sub-menu">
									<?php foreach ($kategori as $tag) : ?>
										<li><a href="<?php echo base_url(); ?>kategori/<?php echo $tag['url'] ?>"><?php echo $tag['kategori'] ?></a></li>
									<?php endforeach; ?>
								</ul>
							</li>
							<li><a href="<?php echo base_url(); ?>kontak">Kontak</a></li>
							<?php if ($this->session->userdata('loginstatus') != '6484bbvnvfdswuieywor3443993') { ?>
								<li><a href="<?php echo base_url(); ?>home/akun">Akun Saya</a></li>
							<?php } else { ?>
								<li class="lan_area"><a href="#"><i class="fa fa-user"></i> <?php echo $this->session->userdata('username'); ?> <i class="fa fa-caret-down"></i></a>
									<ul class="sub-menu">
										<li><a href="<?php echo base_url(); ?>user">Dashboard</a></li>

										<li><a href="<?php echo base_url(); ?>user/transaksi">Transaksi</a></li>
										<li><a href="<?php echo base_url(); ?>user/profil">Profil</a></li>
										<li><a href="<?php echo base_url(); ?>user/ganti_password">Ganti Sandi</a></li>
										<li><a href="<?php echo base_url(); ?>logout">Keluar</a></li>
									</ul>
								</li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</header>