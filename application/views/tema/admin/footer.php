<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="<?php echo base_url(); ?>assets_admin/assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="<?php echo base_url(); ?>assets_admin/assets/vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
<script src="<?php echo base_url(); ?>assets_admin/assets/vendors/chart.js/Chart.min.js"></script>
<script src="<?php echo base_url(); ?>assets_admin/assets/vendors/flot/jquery.flot.js"></script>
<script src="<?php echo base_url(); ?>assets_admin/assets/vendors/flot/jquery.flot.resize.js"></script>
<script src="<?php echo base_url(); ?>assets_admin/assets/vendors/flot/jquery.flot.categories.js"></script>
<script src="<?php echo base_url(); ?>assets_admin/assets/vendors/flot/jquery.flot.fillbetween.js"></script>
<script src="<?php echo base_url(); ?>assets_admin/assets/vendors/flot/jquery.flot.stack.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="<?php echo base_url(); ?>assets_admin/assets/js/off-canvas.js"></script>
<script src="<?php echo base_url(); ?>assets_admin/assets/js/hoverable-collapse.js"></script>
<script src="<?php echo base_url(); ?>assets_admin/assets/js/misc.js"></script>
<script src="<?php echo base_url(); ?>assets_admin/assets/js/settings.js"></script>
<script src="<?php echo base_url(); ?>assets_admin/assets/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="<?php echo base_url(); ?>assets_admin/assets/js/dashboard.js"></script>
<script src="<?php echo base_url(); ?>assets_home/js/sweetalert2.all.min.js"></script>

<script>
  const flashData = $('.flash-data').data('flashdata');
  // console.log(flashData);
  if (flashData) {
    Swal.fire({

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

  function addlist(obj, out) {
    var grup = obj.form[obj.name];
    var len = grup.length;
    var list = new Array();

    if (len > 1) {
      for (var i = 0; i < len; i++) {
        if (grup[i].checked) {
          list[list.length] = grup[i].value;
        }
      }
    } else {
      if (grup.checked) {
        list[list.length] = grup.value;
      }
    }

    document.getElementById(out).value = list.join(', ');

    return;
  }
</script>
<script>
  var $submit = $('#btn_simpan');

  $(document).ready(function() {
    var i = 1;
    $('#tambahdinamis').click(function() {

      i++;
      html = "";
      html += '<tr id="row' + i + '">' +

        '<td width="30%">' +
        '<div class="form-group namabarangharga">' +
        '<label>Nama Produk</label>' +
        '<select name="namabarang[]" class="form-control namabarang" required>' +
        '<option value="">Pilih Produk</option>' +
        '<?php foreach ($dataproduk as $produk) : ?>' +
        '<option value="<?php echo $produk['produk_name']; ?>"><?php echo $produk['produk_name']; ?></option>' +
        '<?php endforeach; ?>' +
        '</select>' +
        '</div>' +
        '</td>' +
        '<td>' +
        '<div class="form-group">' +
        '<label>Harga</label>' +
        '<input type="text" id="harga' + i + '" name="harga[]" class="form-control" oninput="check()" onchange="check()" required>' +
        '</div>' +
        '</td>' +

        '<td width="15%">' +
        '<div class="form-group">' +
        '<label>Jumlah</label>' +
        '<input type="number" value="1" min="0" id="jumlah' + i + '" name="jumlah[]" class="form-control" oninput="check()" onchange="check()" required>' +
        '</div>' +
        '</td>' +

        '<td>' +
        '<div class="form-group">' +
        '<label>Total</label>' +
        '<input type="text" id="total' + i + '" name="total[]" class="form-control total" value="0" readonly>' +
        '</div>' +
        '</td>' +

        '<td>' +
        '<div class="form-group">' +
        '<button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove mt-4">X</button>' +
        '</div>' +
        '</td>' +


        '</tr>';

      $('#dynamic_field').append(html);
    });

  });
  $(document).on('click', '.btn_remove', function() {
    var button_id = $(this).attr("id");
    $('#row' + button_id + '').remove();
  });

  $(document).ready(function() {
    $(".total").each(function() {
      setInterval(hitunggrandtotal, 100);
    });

  });

  function hitunggrandtotal() {
    var sum = 0;
    $(".total").each(function() {
      if (!isNaN(this.value) && this.value.length != 0) {
        sum += parseFloat(this.value);
      }

    });
    document.getElementById('grandtotal').value = sum.toFixed(2);
    document.getElementById('grandtotalnon').value = sum;

    var jumlah1 = document.getElementById('jumlah1').value;
    var harga1 = document.getElementById('harga1').value;
    var total1 = parseInt(jumlah1) * parseInt(harga1);
    if (!isNaN(total1)) {
      document.getElementById('total1').value = total1;
    } else {
      document.getElementById('total1').value = 0;
    }

    var jumlah2 = document.getElementById('jumlah2').value;
    var harga2 = document.getElementById('harga2').value;
    var total2 = parseInt(jumlah2) * parseInt(harga2);
    if (!isNaN(total2)) {
      document.getElementById('total2').value = total2;
    } else {
      document.getElementById('total2').value = 0;
    }

    var jumlah3 = document.getElementById('jumlah3').value;
    var harga3 = document.getElementById('harga3').value;
    var total3 = parseInt(jumlah3) * parseInt(harga3);
    if (!isNaN(total3)) {
      document.getElementById('total3').value = total3;
    } else {
      document.getElementById('total3').value = 0;
    }

    var jumlah4 = document.getElementById('jumlah4').value;
    var harga4 = document.getElementById('harga4').value;
    var total4 = parseInt(jumlah4) * parseInt(harga4);
    if (!isNaN(total4)) {
      document.getElementById('total4').value = total4;
    } else {
      document.getElementById('total4').value = 0;
    }

    var jumlah5 = document.getElementById('jumlah5').value;
    var harga5 = document.getElementById('harga5').value;
    var total5 = parseInt(jumlah5) * parseInt(harga5);
    if (!isNaN(total5)) {
      document.getElementById('total5').value = total5;
    } else {
      document.getElementById('total5').value = 0;
    }

    var jumlah6 = document.getElementById('jumlah6').value;
    var harga6 = document.getElementById('harga6').value;
    var total6 = parseInt(jumlah6) * parseInt(harga6);
    if (!isNaN(total6)) {
      document.getElementById('total6').value = total6;
    } else {
      document.getElementById('total6').value = 0;
    }

    var jumlah7 = document.getElementById('jumlah7').value;
    var harga7 = document.getElementById('harga7').value;
    var total7 = parseInt(jumlah7) * parseInt(harga7);
    if (!isNaN(total7)) {
      document.getElementById('total7').value = total7;
    } else {
      document.getElementById('total7').value = 0;
    }

    var jumlah8 = document.getElementById('jumlah8').value;
    var harga8 = document.getElementById('harga8').value;
    var total8 = parseInt(jumlah8) * parseInt(harga8);
    if (!isNaN(total8)) {
      document.getElementById('total8').value = total8;
    } else {
      document.getElementById('total8').value = 0;
    }

    var jumlah9 = document.getElementById('jumlah9').value;
    var harga9 = document.getElementById('harga9').value;
    var total9 = parseInt(jumlah9) * parseInt(harga9);
    if (!isNaN(total9)) {
      document.getElementById('total9').value = total9;
    } else {
      document.getElementById('total9').value = 0;
    }
  }
</script>
<script>
  $(document).ready(function() {
    $('#tabel').DataTable();
  });
</script>
<!-- End custom js for this page -->