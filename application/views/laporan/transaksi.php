<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">Laporan Penjualan</h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page"> Laporan Penjualan </li>
        </ol>
      </nav>
    </div>

    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
          <h5>Laporan Penjualan</h5><br>
          <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
          <div class="flash-data-error" data-flashdata="<?php echo $this->session->flashdata('error'); ?>"></div>
          <form action="<?php echo base_url(); ?>laporan/lihat_transaksi" method="post">
            <br>
            <div class="row">
              <div class="col-md-4">
                <label>Mulai</label>
                <input type="date" name="start" value="<?php echo $start; ?>" class="form-control" required="">
              </div>
              <div class="col-md-4">
                <label>Sampai</label>
                <input type="date" name="end" value="<?php echo $end; ?>" class="form-control" required="">
              </div>
              <div class="col-md-4">
                <button type="submit" class="btn btn-primary" style="margin-top:35px">Lihat</button>
                <?php if ($start == '') { ?>
                  <a href="<?php echo base_url(); ?>laporan/pdf_trx" target="_blank" class="btn btn-danger" style="margin-top:35px"> Unduh PDF</a>
                <?php } else { ?>
                  <a href="<?php echo base_url(); ?>laporan/pdf_transaksi/<?php echo $start; ?>/<?php echo $end; ?>" target="_blank" class="btn btn-danger" style="margin-top:35px"> Unduh PDF</a>
                <?php } ?>
              </div>
            </div>
          </form>
          <br><br>
          <div class="widget">
            <div class="table-responsive">
              <table class="table table-striped">
                <tr>
                  <th>No</th>
                  <th>Tgl Pesan</th>
                  <th>Dari</th>
                  <th>Total</th>
                  <th>Tujuan</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php $pendapatan = 0; ?>
                  <?php foreach ($transaksi as $pro) : ?>
                    <tr>
                      <td><?php echo $i . '.'; ?></td>
                      <td><span><?php echo date('d-m-Y H:i:s', strtotime($pro['transaksi_time'])); ?></span></td>
                      <td><?php echo $pro['user_nama']; ?></td>
                      <td><?php echo number_format($pro['transaksi_total'], 0, ',', '.'); ?></td>
                      <td><?php echo $pro['transaksi_tujuan']; ?></td>
                      <td><?php echo ucwords($pro['transaksi_status']); ?></td>
                    </tr>
                    <?php $pendapatan += $pro['transaksi_total']; ?>
                    <?php $i++; ?>
                  <?php endforeach; ?>
                </tbody>
                <tfoot class="bg-secondary text-white">
                  <th colspan="2"></th>
                  <th>Grandtotal</th>
                  <th colspan="3">Rp. <?php echo number_format($pendapatan, 0, ',', '.'); ?></th>
                </tfoot>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->