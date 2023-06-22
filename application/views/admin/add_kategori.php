<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Tambah Kategori</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Kategori </li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Tambah Kategori</h4>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="mb-3" class="mb-3">Nama Kategori</label>
                                <input type="text" class="form-control" name="kategori" placeholder="" required />
                                <small class="text-danger"><?php echo form_error('kategori'); ?></small>
                            </div>
                            <div class="form-group">
                                <label class="mb-3">Url Kategori</label>
                                <input type="text" class="form-control" name="url" placeholder="" required />
                                <small class="text-danger"><?php echo form_error('url'); ?></small>
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