        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper pb-0">
            <div class="page-header flex-wrap">
              <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
                <div class="d-flex align-items-center">
                  <a href="#">
                    <p class="m-0 pr-3">Dashboard</p>
                  </a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body p-0">
                    <img class="img-fluid w-100" src="../assets/images/dashboard/img_1.jpg" alt="" />
                  </div>
                  <div class="card-body px-3 text-dark">
                    <div class="d-flex justify-content-between">
                      <p class="text-muted font-13 mb-0"></p>
                      <i class="mdi mdi-arrange-bring-forward"></i>
                    </div>
                    <h5 class="font-weight-semibold"> Pendapatan Bersih </h5>
                    <div class="d-flex justify-content-between font-weight-semibold">
                      <p class="mb-0">Rp. <?php echo number_format($profit, 0, ',', '.'); ?></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body p-0">
                    <img class="img-fluid w-100" src="../assets/images/dashboard/img_2.jpg" alt="" />
                  </div>
                  <div class="card-body px-3 text-dark">
                    <div class="d-flex justify-content-between">
                      <p class="text-muted font-13 mb-0"></p>
                      <i class="mdi mdi-briefcase"></i>
                    </div>
                    <h5 class="font-weight-semibold"> Total Produk </h5>
                    <div class="d-flex justify-content-between font-weight-semibold">
                      <p class="mb-0"><?php echo $totalproduk; ?></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body p-0">
                    <img class="img-fluid w-100" src="../assets/images/dashboard/img_3.jpg" alt="" />
                  </div>
                  <div class="card-body px-3 text-dark">
                    <div class="d-flex justify-content-between">
                      <p class="text-muted font-13 mb-0"></p>
                      <i class="mdi mdi-account"></i>
                    </div>
                    <h5 class="font-weight-semibold">Total User</h5>
                    <div class="d-flex justify-content-between font-weight-semibold">
                      <p class="mb-0"><?php echo $totaluser; ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- table row starts here -->

            <div class="row">
              <div class="col-sm-12 stretch-card grid-margin">
                <div class="card">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="card border-0">
                        <div class="card-body">
                          <div class="card-title">Transaksi Terbaru</div>
                          <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
                          <div class="widget">
                            <div class="table-responsive">
                              <table class="table table-striped">
                                <tr>
                                  <th>No</th>
                                  <th>Tgl</th>
                                  <th>Dari</th>
                                  <th>Total</th>
                                  <th>Tujuan</th>
                                  <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                  <?php $i = 1; ?>
                                  <?php foreach ($transaksi as $pro) : ?>
                                    <tr>
                                      <td><?php echo $i . '.'; ?></td>
                                      <td><span><?php echo date('d-m-Y H:i:s', strtotime($pro['transaksi_time'])); ?></span></td>
                                      <td><?php echo $pro['user_nama']; ?></td>
                                      <td><?php echo number_format($pro['transaksi_total'], 0, ',', '.'); ?></td>
                                      <td><?php echo $pro['transaksi_tujuan']; ?></td>
                                      <td><?php echo ucwords($pro['transaksi_status']); ?></td>
                                    </tr>
                                    <?php $i++; ?>
                                  <?php endforeach; ?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>