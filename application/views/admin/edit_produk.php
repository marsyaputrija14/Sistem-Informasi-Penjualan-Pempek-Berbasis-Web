<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">Edit Produk</h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit Produk </li>
        </ol>
      </nav>
    </div>
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4">Edit Produk</h4>
            <form action="" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <input type="hidden" name="id" value="<?php echo $produkid['produk_id']; ?>">
                <label class="mb-3" class="mb-3">Nama Produk</label>
                <input type="text" class="form-control" name="nama-produk" value="<?php echo $produkid['produk_name']; ?>" placeholder="" />
              </div>
              <div class="form-group">
                <label class="mb-3">Harga Produk</label>
                <input type="number" class="form-control" name="harga-produk" value="<?php echo $produkid['produk_price']; ?>" placeholder="" />
              </div>
              <div class="form-group">
                <label class="mb-3">Stok</label>
                <input type="number" class="form-control" name="stok-produk" value="<?php echo $produkid['produk_stok']; ?>" placeholder="" />
              </div>
              <div class="form-group">
                <label class="mb-3">Berat produk dalam satuan gram</label>
                <input type="number" class="form-control" name="berat-produk" value="<?php echo $produkid['produk_weight']; ?>" />
              </div>
              <div class="form-group">
                <label class="mb-3">Dekripsi Produk</label>
                <textarea class="form-control" cols="30" name="deskripsi-produk" rows="10" placeholder=""><?php echo $produkid['produk_description']; ?></textarea>
              </div>
              <div class="form-group">
                <label class="mb-3">Upload gambar</label><br>
                <input type="file" name="gambar">
                <input type="hidden" name="gambar_old" value="<?php echo $produkid['produk_image']; ?>">
              </div>
              <div class="float-right">
                <button type="submit" class="btn btn-primary mr-2"> Simpan </button>
                <button class="btn btn-light" onclick="goBack()">Batal</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>