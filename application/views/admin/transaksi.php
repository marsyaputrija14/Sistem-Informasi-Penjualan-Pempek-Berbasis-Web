<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">Data Transaksi</h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page"> Data Transaksi </li>
        </ol>
      </nav>
    </div>

    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
          <h5>Data Transaksi</h5><br>
          <div class="widget">
            <div class="table-responsive">
              <table class="table table-striped">
                <tr>
                  <th>No</th>
                  <th>Tgl</th>
                  <th>Dari</th>
                  <th>Total</th>
                  <th>Tujuan</th>
                  <th>Bukti Pembayaran</th>
                  <th>Konfirmasi</th>
                  <th>Detail</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php $pendapatan = 0; ?>
                  <?php foreach ($transaksi as $pro) :
                    $tulisan = $pro['transaksi_status'];
                  ?>
                    <tr>
                      <td><?php echo $i . '.'; ?></td>
                      <td><span><?php echo date('d-m-Y H:i:s', strtotime($pro['transaksi_time'])); ?></span></td>
                      <td><?php echo $pro['user_nama']; ?></td>
                      <td>Rp. <?php echo number_format($pro['transaksi_total'], 0, ',', '.'); ?></td>
                      <td><?php echo $pro['transaksi_tujuan']; ?></td>
                      <td>
                        <?php if ($pro['transaksi_status'] != 'Belum Mengupload Bukti Pembayaran') { ?>
                          <center><img style="width: 200px" src="<?php echo base_url('upload/buktipembayaran/' . $pro['buktipembayaran']) ?>" alt=""><br><br> <a class="btn btn-primary mr-2" target="_blank" href="<?php echo base_url('upload/buktipembayaran/' . $pro['buktipembayaran']) ?>">Lihat</a></center>
                        <?php } ?>
                      </td>
                      <td>
                        <a href="<?php echo base_url(); ?>admin/detail_transaksi/<?php echo $pro['transaksi_id']; ?>" title="" class="btn btn-primary mr-2"><?= $tulisan ?></a>
                      </td>
                      <td>
                        <a href="<?php echo base_url(); ?>admin/transaksihapus/<?php echo $pro['transaksi_id']; ?>" class="btn btn-danger mr-2">Hapus</a>
                      </td>
                    </tr>
                    <?php $pendapatan += $pro['transaksi_total']; ?>
                    <?php $i++; ?>
                  <?php endforeach; ?>
                </tbody>
                <tfoot class="bg-secondary text-white">
                  <th colspan="2"></th>
                  <th>Grandtotal</th>
                  <th colspan="5">Rp. <?php echo number_format($pendapatan, 0, ',', '.'); ?></th>
                </tfoot>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->