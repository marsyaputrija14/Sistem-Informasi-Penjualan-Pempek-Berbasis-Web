<div id="page_item_area">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 text-left">
				<h3><?php echo $title; ?> '<?php echo $key; ?>'</h3>
			</div>

			<div class="col-sm-6 text-right">
				<ul class="p_items">
					<li><a href="#">home</a></li>
					<li><span><?php echo $title; ?></span></li>
				</ul>
			</div>



		</div>
	</div>
</div>



<div class="shop_page_area">
	<div class="container">

		<div class="shop_details text-center">
			<div class="row">
				<?php if (count($produk) > 0) { ?>
					<?php foreach ($produk as $pro) : ?>
						<div class="col-md-3 col-sm-6">
							<div class="single_product">
								<div class="product_image">
									<img src="<?php echo base_url(); ?>upload/foto/<?php echo $pro['produk_image']; ?>" alt="<?php echo $pro['produk_name']; ?>" />
									<div class="box-content">
										<a href="<?php echo base_url(); ?>cart/add/<?php echo $pro['produk_id']; ?>"><i class="fa fa-cart-plus"></i></a>
										<a href="<?php echo base_url(); ?>p/<?php echo $pro['produk_id']; ?>/<?php echo $pro['url']; ?>/<?php echo $pro['produk_url']; ?>"><i class="fa fa-search"></i></a>
									</div>
								</div>

								<div class="product_btm_text">
									<h4><a href="<?php echo base_url(); ?>p/<?php echo $pro['produk_id']; ?>/<?php echo $pro['url']; ?>/<?php echo $pro['produk_url']; ?>"><?php echo $pro['produk_name']; ?></a></h4>
									<span class="price"><?php echo number_format($pro['produk_price'], 0, ',', '.'); ?></span>
								</div>
							</div>
						</div> <!-- End Col -->

					<?php endforeach; ?>
				<?php } else { ?>
					<div class="col-md-12 text-center">
						Hasil pencarian tidak ditemukan
					</div>
				<?php } ?>

			</div>
		</div>


	</div>
</div>