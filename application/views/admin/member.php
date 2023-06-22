<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">Data Member / Pelanggan</h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page"> Data Member / Pelanggan </li>
        </ol>
      </nav>
    </div>

    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
          <h5>Data Member / Pelanggan</h5><br>
          <?php
          function waktu_lalu($timestamp)
          {
            $selisih = time() - strtotime($timestamp);
            $detik = $selisih;
            $menit = round($selisih / 60);
            $jam = round($selisih / 3600);
            $hari = round($selisih / 86400);
            $minggu = round($selisih / 604800);
            $bulan = round($selisih / 2419200);
            $tahun = round($selisih / 29030400);
            if ($detik <= 60) {
              $waktu = $detik . ' detik yang lalu';
            } else if ($menit <= 60) {
              $waktu = $menit . ' menit yang lalu';
            } else if ($jam <= 24) {
              $waktu = $jam . ' jam yang lalu';
            } else if ($hari <= 7) {
              $waktu = $hari . ' hari yang lalu';
            } else if ($minggu <= 4) {
              $waktu = $minggu . ' minggu yang lalu';
            } else if ($bulan <= 12) {
              $waktu = $bulan . ' bulan yang lalu';
            } else {
              $waktu = $tahun . ' tahun yang lalu';
            }
            return $waktu;
          }
          ?>
          <div class="widget">
            <div class="table-responsive">
              <table class="table table-striped">
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>No. KTP</th>
                  <th>No. HP</th>
                  <th>Email</th>
                  <th>Foto
                  <th>Opsi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($member as $pro) : ?>
                    <tr>
                      <td><?php echo $i . '.'; ?></td>
                      <td><span><?php echo $pro['user_nama']; ?></span></td>
                      <td><span><?php echo $pro['alamat']; ?></span></td>
                      <td><span><?php echo $pro['noktp']; ?></span></td>
                      <td><span><?php echo $pro['nohp']; ?></span></td>
                      <td><?php echo $pro['user_email']; ?></td>
                      <td>
                        <?php if ($pro['fotoprofil'] != "") { ?>
                          <img width="150px" src="<?= base_url('upload/fotoprofil/' . $pro['fotoprofil']) ?>">
                        <?php } else { ?>
                          <img width="150px" src="<?= base_url('upload/fotoprofil/user.png') ?>">
                        <?php } ?>
                      </td>
                      <td>
                        <?php if ($pro['user_status'] == 0) { ?>
                          Belum Aktif
                        <?php } elseif ($pro['user_status'] == 1) { ?>
                          <a href="<?php echo base_url(); ?>admin/pelangganhapus/<?php echo $pro['user_id']; ?>" class="btn btn-danger mr-2">Hapus</a>
                        <?php } ?>
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