<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Data Pengguna</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Data Pengguna </li>
                </ol>
            </nav>
        </div>

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
                    <a href="<?php echo base_url(); ?>admin/penggunatambah" class="btn btn-primary mr-2"> Tambah Pengguna</a><br><br>
                    <div class="widget">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Level</th>
                                    <th>Opsi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($pengguna as $pro) : ?>
                                        <tr>
                                            <td><?php echo $i . '.'; ?></td>
                                            <td><span><?php echo $pro['admin_nama']; ?></span></td>
                                            <td><?php echo $pro['admin_email']; ?></td>
                                            <td><?php echo $pro['admin_username']; ?></td>
                                            <td><?= $pro['level'] ?></td>
                                            <td>
                                                <a href="<?php echo base_url(); ?>admin/penggunaedit/<?php echo $pro['admin_id']; ?>" class="btn btn-primary mr-2">Edit</a>
                                                <a href="<?php echo base_url(); ?>admin/penggunahapus/<?php echo $pro['admin_id']; ?>" class="btn btn-danger mr-2">Hapus</a>
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