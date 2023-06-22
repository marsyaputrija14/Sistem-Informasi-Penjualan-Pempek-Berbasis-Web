<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">Kategori</h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page"> Kategori </li>
        </ol>
      </nav>
    </div>

    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
          <h5>Data Kategori</h5><br>
          <a href="<?php echo base_url(); ?>admin/add_kategori" class="btn btn-primary mr-2">Tambah Kategori</a><br><br>
          <div class="widget">
            <div class="table-responsive">
              <table class="table table-striped">
                <tr>
                  <th>No</th>
                  <th>Nama Kategori</th>
                  <th>Url Kategori</th>
                  <th>Opsi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($kategori as $pro) : ?>
                    <tr>
                      <td><?php echo $i . '.'; ?></td>
                      <td><span><?php echo $pro['kategori']; ?></span></td>
                      <td><?php echo $pro['url']; ?></td>
                      <td>
                        <a href="<?php echo base_url(); ?>admin/edit_kategori/<?php echo $pro['id_kategori']; ?>" class="btn btn-warning mr-2">Edit</a>
                        <a href="<?php echo base_url(); ?>admin/hapus_kategori/<?php echo $pro['id_kategori']; ?>" class="btn btn-danger mr-2 bdel">Hapus</a>
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