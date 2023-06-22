<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">Detail Transaksi</h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page"> Detail Transaksi </li>
        </ol>
      </nav>
    </div>
    <?php $tr = $dtransaksi->row_array(); ?>
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <form>
            <div class="row">
              <div class="col-md-6">
                <h4>Invoice info</h4>
                <ul class="some-about">
                  <li><span>Tanggal Pesan :</span><?php echo date('d-m-Y', strtotime($tr['transaksi_tgl_pesan'])); ?></li>
                  <li><span>Status Pesanan:</span><i><?php echo ucwords($tr['transaksi_status']); ?></i></li>
                  <li><span>Kurir:</span><?php echo strtoupper($tr['transaksi_kurir']); ?></li>
                  <li><span>Layanan:</span><?php echo $tr['transaksi_service']; ?></li>
                </ul>
              </div>
              <div class="col-md-6">
                <h4>Invoice No: <span>#<?php echo $tr['transaksi_id']; ?></span></h4>
                <p><?php echo $tr['user_nama']; ?>
                  <br>
                  <?php echo $tr['transaksi_tujuan']; ?>, <?php echo $tr['transaksi_kota']; ?>, <?php echo $tr['transaksi_prov']; ?>, <?php echo $tr['transaksi_pos']; ?>
                </p>
                <ul class="some-about">
                  <li><span>No. HP / No. WA :</span><?php echo $tr['transaksi_note']; ?></li>
                  <li><span>E-mail:</span><?php echo $tr['user_email']; ?></li>
                </ul>
              </div>
            </div>
          </form>
        </div>

        <div class="card-body">
          <form>
            <div class="row">
              <div class="col-md-6">
                <h4>Bukti Pembayaran</h4>
                <img style="width: 70%;height:500px;" src="<?php echo base_url('upload/buktipembayaran/' . $tr['buktipembayaran']) ?>" alt="">
              </div>
              <div class="col-md-6">
                <?php if ($tr['transaksi_status'] != 'Belum Mengupload Bukti Pembayaran') { ?>
                  <a class="btn btn-success mr-2" href="<?php echo base_url(); ?>admin/cetak_invoice/<?php echo $tr['transaksi_id']; ?>" title="Cetak">Lihat Invoice</a>
                <?php } ?><br><br>
              </div>
            </div>
          </form>
        </div>
        <div class="card-body">
          <div class="widget">
            <div class="table-responsive">
              <table class="table table-striped">
                <tr>
                  <th>No.</th>
                  <th>Item</th>
                  <th>Harga</th>
                  <th>Quantity</th>
                  <th>Subtotal</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php $ongkir = $tr['transaksi_total']; ?>
                  <?php foreach ($dtransaksi->result_array() as $trs) : ?>
                    <?php $ongkir -= $trs['d_transaksi_biaya']; ?>
                    <tr>
                      <td><span><?php echo $i . '.'; ?></span></td>
                      <td><?php echo $trs['produk_name']; ?></td>
                      <td><ins><?php echo number_format($trs['produk_price'], 0, ',', '.'); ?></ins></td>
                      <td><?php echo $trs['d_transaksi_qty']; ?></td>
                      <td><?php echo number_format($trs['d_transaksi_biaya'], 0, ',', '.'); ?></td>
                    </tr>
                    <?php $i++; ?>
                  <?php endforeach; ?>
                  <tr>
                    <td colspan="4">Ongkos Kirim</td>
                    <td colspan="4">Rp. <?php echo number_format($ongkir, 0, ',', '.'); ?></td>
                  </tr>
                  <tr>
                    <td colspan="4">Total</td>
                    <td colspan="4">Rp. <?php echo number_format($tr['transaksi_total'], 0, ',', '.'); ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <?php if ($trs['transaksi_status'] != 'Belum Mengupload Bukti Pembayaran') { ?>
                <form action="<?= base_url('admin/konfirmasi_transaksi') ?>" method="post">
                  <div class="form-group">
                    <label>Status Transaksi</label>
                    <input type="hidden" name="idtransaksi" value="<?= $trs['transaksi_id'] ?>">
                    <select class="form-control" name="transaksi_status">
                      <option <?php if ($trs['transaksi_status'] == 'Sedang Di Kemas') echo 'selected'; ?> value="Sedang Di Kemas">Sedang Di Kemas</option>
                      <option <?php if ($trs['transaksi_status'] == 'Dikirim') echo 'selected'; ?> value="Dikirim">Dikirim</option>
                      <option <?php if ($trs['transaksi_status'] == 'Selesai') echo 'selected'; ?> value="Selesai">Selesai</option>
                      <option <?php if ($trs['transaksi_status'] == 'Di Tolak') echo 'selected'; ?> value="Di Tolak">Di Tolak</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Masukkan Nomor Resi</label>
                    <input type="text" class="form-control" value="<?= $trs['noresi'] ?>" name="noresi">
                  </div>
                  <div class="form-group float-right">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <button class="btn btn-light" onclick="goBack();" title="Back">Kembali</button>
                  </div>
                </form>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>