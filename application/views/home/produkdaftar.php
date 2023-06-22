<section class="banner-area banner-area2 blog-page text-center">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1><i>Menu</i></h1>
				<a href="<?php echo base_url(); ?>">home</a>
				<span class="mx-2">/</span>
				<a>Menu</a>
			</div>
		</div>
	</div>
</section>
<section class="food-area section-padding">
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<div class="section-top">
					<h3><span class="style-change">Kami Menyajikan</span> <br>Berbagai Macam Pempek</h3>
				</div>
			</div>
		</div>
		<div class="row">
			<?php foreach ($produk as $prod) : ?>
				<div class="col-md-4 col-sm-6 mb-5">
					<div class="single-food">
						<div class="food-img">
							<img style="width:100%;height:300px;" src="<?php echo base_url(); ?>upload/foto/<?php echo $prod['produk_image']; ?>" class="img-fluid" alt="">
						</div>
						<div class="food-content">
							<div class="d-flex justify-content-between">
								<h5><a href="<?php echo base_url(); ?>p/<?php echo $prod['produk_id']; ?>/<?php echo $prod['url']; ?>/<?php echo $prod['produk_url']; ?>"><?php echo $prod['produk_name']; ?></a></h5>
								<span class="style-change">Rp <?php echo number_format($prod['produk_price'], 0, ',', '.'); ?></span>
							</div>
							<p class="pt-3">Semua Variant Best Seller</p>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>