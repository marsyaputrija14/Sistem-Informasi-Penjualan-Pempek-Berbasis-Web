<?php
$this->db->where('produk_stok <=', 3);
$cekstok = $this->db->get('tb_produk')->result_array();
// print_r($cekstok);
?>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">Produk</h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page"> Produk </li>
        </ol>
      </nav>
    </div>
    <?php if (!empty($cekstok)) { ?>
      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Peringatan Stock</h4>
              <ul>
                <?php foreach ($cekstok as $stok) { ?>
                  <li class="text-danger">- Stok <?= $stok['produk_name'] ?> Tinggal Bersisa <?= $stok['produk_stok'] ?></li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      <?php } ?>
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
            <h5>Data Produk</h5><br>
            <a href="<?php echo base_url(); ?>admin/add_produk" class="btn btn-primary mr-2">Tambah Produk</a><br><br>
            <div class="widget">
              <div class="table-responsive">
                <table class="table table-striped">
                  <tr>
                    <th>No</th>
                    <th>Nama Item</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <!--<th>Status</th>-->
                    <th>Foto</th>
                    <th>Opsi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($produk as $pro) : ?>
                      <tr>
                        <td><?php echo $i . '.'; ?></td>
                        <td><span><?php echo $pro['produk_name']; ?></span></td>
                        <td><?php echo $pro['produk_price']; ?></td>
                        <td><?php echo $pro['produk_stok']; ?></td>
                        <td><img src="<?php echo base_url(); ?>upload/foto/<?php echo $pro['produk_image']; ?>" width="40" alt="<?php echo $pro['produk_name']; ?>"></td>
                        <td>
                          <a href="<?php echo base_url(); ?>admin/edit_produk/<?php echo $pro['produk_id']; ?>" class="btn btn-warning mr-2">Edit</a>
                          <a href="<?php echo base_url(); ?>admin/hapus_produk/<?php echo $pro['produk_id']; ?>" class="btn btn-danger mr-2 bdel">Hapus</a>
                        </td>
                      </tr>
                      <?php $i++; ?>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->