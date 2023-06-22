<section class="banner-area banner-area2 blog-page text-center">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1><i>Produk Detail</i></h1>
				<a href="index.html">home</a>
				<span class="mx-2">/</span>
				<a href="blog-details.html">blog details</a>
			</div>
		</div>
	</div>
</section>

<section class="blog_area section-padding">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 posts-list">
				<div class="single-post row">
					<div class="col-lg-12">
						<div class="feature-img">
							<img style="width: 80%;height:500px;" class="img-fluid" src="<?php echo base_url(); ?>upload/foto/<?php echo $detail['produk_image']; ?>" alt="<?php echo $detail['produk_name']; ?>" alt="">
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="blog_right_sidebar">
					<aside class="single_sidebar_widget search_widget text-center">
						<h5><?php echo $detail['produk_name']; ?></h5>
						<div class="br"></div>
					</aside>
					<aside class="single_sidebar_widget author_widget">

						<p><b>Rp <?php echo number_format($detail['produk_price'], 0, ',', '.'); ?></b></p><br>
						<p>Deskripsi :</p>
						<p><?php echo $detail['produk_description']; ?></p>
						<div class="br"></div>
					</aside>
					<form action="<?php echo base_url(); ?>keranjang/add_cart" method="post" class="single_sidebar_widget search_widget text-center">
						<div class="pd_clr_qntty_dtls fix">
							<div class="pd_qntty_area">
								<p>Jumlah :</p>
								<div class="pd_qty fix">
									<input value="1" name="qttybutton" min="1" max="<?php echo $detail['produk_stok']; ?>" class="form-control" type="number">
									<input type="hidden" name="produkid" value="<?php echo $detail['produk_id']; ?>">
								</div>
							</div>
						</div>
						<br>
						<div class="pd_btn fix">
							<button type="submit" class="genric-btn primary circle">Tambah Ke Keranjang</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>