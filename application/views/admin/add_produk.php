<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">Tambah Produk</h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Tambah Produk </li>
        </ol>
      </nav>
    </div>
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4">Tambah Produk Baru</h4>
            <form action="" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label class="mb-3" class="mb-3">Nama Produk</label>
                <input type="text" class="form-control" name="nama-produk" value="<?php echo set_value('nama-produk'); ?>" placeholder="" required />
              </div>
              <div class="form-group">
                <label class="mb-3">Harga Produk</label>
                <input type="number" class="form-control" name="harga-produk" value="<?php echo set_value('harga-produk'); ?>" placeholder="" required />
              </div>
              <div class="form-group">
                <label class="mb-3">Stok</label>
                <input type="number" class="form-control" name="stok-produk" value="<?php echo set_value('stok-produk'); ?>" placeholder="" required />
              </div>
              <div class="form-group">
                <label class="mb-3">Kategori</label>
                <select name="kategori-produk" class="form-control" required>
                  <?php foreach ($kat as $k) : ?>
                    <option value="<?php echo $k['id_kategori']; ?>"><?php echo $k['kategori']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label class="mb-3">Berat produk dalam satuan gram</label>
                <input type="text" class="form-control" name="berat-produk" value="<?php echo set_value('berat-produk'); ?>" placeholder="1000" required />
              </div>
              <div class="form-group">
                <label class="mb-3">Deskripsi Produk</label>
                <textarea cols="30" class="form-control" name="deskripsi-produk" rows="10" placeholder="" required><?php echo set_value('deskripsi-produk'); ?></textarea>
              </div>
              <div class="form-group">
                <label class="mb-3">Upload gambar</label><br>
                <input type="file" name="gambar" required />
              </div>
              <div class="float-right">
                <button type="submit" class="btn btn-primary mr-2"> Simpan </button>
                <button class="btn btn-light" onclick="goBack()">Batal</button>
              </div>
            </form>
          </div>
        </div>
      </div>