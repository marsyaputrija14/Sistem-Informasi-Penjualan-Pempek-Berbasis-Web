<section class="banner-area text-center">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1>Selamat Datang <span class="prime-color">Di</span><br>
					<span class="style-change">Pempek Ce'ta </span>
				</h1>
			</div>
		</div>
	</div>
</section>

<section class="welcome-area section-padding2">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 align-self-center">
				<div class="welcome-img">
					<img src="<?= base_url('assets_home/images/a1.jpeg') ?>" class="img-fluid" alt="">
				</div>
			</div>
			<div class="col-md-6 align-self-center">
				<div class="welcome-text mt-5 mt-md-0">
					<h3><span class="style-change">Selamat Datang</span> <br>Pempek Ce'ta</h3>
					<p class="pt-3">Pempek Ce'ta adalah usaha kuliner keluarga dari cece Erita dan suami, usaha kuliner ini menyediakan berbagai macam kuliner khas palembang yang terdiri dari macam-macam pempek seperti pempek kapal selam,pempek ada an,pempek lenjer, pempek kulit dan lain lain.</p>
					<p>Usaha pempek Ce'ta ini didirikan pada September 2022, yang beralamatkan Jl. Pondok Ungu Permai, Marakash, Kec.Babelan, Bekasi, Jawa Barat, 17215. Usaha yang didirikan hampir 10 bulan ini sudah berhasil mengembangkan meliputi pelanggan di sekitar daerah kabupaten maupun kota Bekasi. </p>
					<a href="<?php echo base_url(); ?>kontak" class="template-btn mt-3">Selengkapnya</a>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="food-area section-padding">
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<div class="section-top">
					<h3><span class="style-change">Kita Menyajikan</span> <br>Berbagai Macam Pempek</h3>
					<p class="pt-3">Usaha kami ini juga menerima pesanan partai kecil dan besar,seperti acara pernikahan,ulang tahun,hajatan dll.kami mampu memberikan pelayanan yang baik dan membuat pelanggan puas atas rasa pempek yang kami sajikan. Disini kami juga menyediakan testi terlebih dahulu sebelum memesan partai besar, untuk testimoni sebelum melakukan pemesanan kami menyediakan berbagai macam pempek seperti kulit,keriting,selam,ada'an,dan kami juga menyediakan tekwan,lenggang,dan model,sehingga customer bisa memilih yang mana yang hendak di pesan.</p>
				</div>
			</div>
		</div>
		<div class="row">
			<?php foreach ($produk as $pro) : ?>
				<div class="col-md-4 mb-5">
					<div class="single-food">
						<div class="food-img">
							<img style="width:100%;height:300px;" src="<?php echo base_url(); ?>upload/foto/<?php echo $pro['produk_image']; ?>" class="img-fluid" alt="">
						</div>
						<div class="food-content">
							<div class="d-flex justify-content-between">
								<h5><a href="<?php echo base_url(); ?>p/<?php echo $pro['produk_id']; ?>/<?php echo $pro['url']; ?>/<?php echo $pro['produk_url']; ?>"><?php echo $pro['produk_name']; ?></a></h5>
								<span class="style-change">Rp <?php echo number_format($pro['produk_price'], 0, ',', '.'); ?></span>
							</div>
							<p class="pt-3">Semua Variant Best Seller</p>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<div class="reservation-area section-padding text-center">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2>Pempek adalah salah satu makanan khas Palembang yang populer.</h2>
				<h4 class="mt-4">Olahan Pempek Khas Palembang</h4>
				<a href="<?php echo base_url(); ?>produkdaftar" class="template-btn template-btn2 mt-4">Selengkapnya</a>
			</div>
		</div>
	</div>
</div>