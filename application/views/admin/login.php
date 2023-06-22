<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <title><?php echo $title; ?> - Pempek Ce'ta</title>
  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets_home/logo.png">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets_login/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets_login/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets_login/css/animate.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets_login/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets_login/css/color.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets_login/css/responsive.css">
</head>

<body>
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
  </div>
  <div class="panel-layout">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="admin-lock vh100">
            <div class="admin-form">
              <!-- <div class="logo"><img src="<?php echo base_url(); ?>assets_login/images/logo-login-admin.png" alt=""></div> -->
              <h4>Login</h4>
              <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
              <div class="flash-data-error" data-flashdata="<?php echo $this->session->flashdata('error'); ?>"></div>
              <form action="" method="post">
                <label><i class="fa fa-envelope"></i></label>
                <input type="text" name="email" placeholder="Email">
                <p class="mt-3"><small class="text-danger"><?php echo form_error('email'); ?></small></p>
                <label><i class="fa fa-unlock-alt"></i></label>
                <input type="password" name="sandi" placeholder="Password">
                <p class="mt-3"><small class="text-danger"><?php echo form_error('sandi'); ?></small></p>
                <!-- <input type="checkbox" id="remember"> -->
                <!-- <label for="remember">Ingat saya <a href="#" title="">Forgot password?</a></label> -->
                <button type="submit">Login</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="<?php echo base_url(); ?>assets_login/js/jquery.js"></script>
  <script src="<?php echo base_url(); ?>assets_login/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets_login/js/custom.js"></script>
  <script src="<?php echo base_url(); ?>assets_home/js/sweetalert2.all.min.js"></script>
  <script>
    const flashData = $('.flash-data').data('flashdata');
    // console.log(flashData);
    if (flashData) {
      Swal.fire({
        position: 'top-end',
        title: 'Berhasil !',
        text: '' + flashData,
        icon: 'success',
        showConfirmButton: false,
        timer: 3500
      });
    }
  </script>
  <script>
    const flashDataError = $('.flash-data-error').data('flashdata');
    // console.log(flashData);
    if (flashDataError) {
      Swal.fire({
        position: 'top-end',
        title: 'Gagal !',
        text: '' + flashDataError,
        icon: 'error',
        showConfirmButton: false,
        timer: 3500
      });
    }
  </script>
  <script>
    $('.bdel').on('click', function(e) {
      e.preventDefault();
      const href = $(this).attr('href');
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      });
      swalWithBootstrapButtons.fire({
        position: 'top-end',
        title: 'Yakin data ini akan dihapus?',
        text: "Data tidak akan bisa dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal',
        reverseButtons: true
      }).then((result) => {
        if (result.value) {
          document.location.href = href;
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Dibatalkan',
            '',
            'error'
          )
        }
      });
    });
  </script>
  <script>
    $('.bconfir').on('click', function(e) {
      e.preventDefault();
      const href = $(this).attr('href');
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      });
      swalWithBootstrapButtons.fire({
        position: 'top-end',
        title: 'INFO',
        text: "Dengan mengklik tombol 'Ya', notifikasi tagihan SPP akan masuk ke ruang orang tua/wali.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya !',
        cancelButtonText: 'Batal',
        reverseButtons: true
      }).then((result) => {
        if (result.value) {
          document.location.href = href;
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Dibatalkan',
            '',
            'error'
          )
        }
      });
    });
  </script>
  <script>
    function goBack() {
      window.history.back();
    }
  </script>
</body>

</html>