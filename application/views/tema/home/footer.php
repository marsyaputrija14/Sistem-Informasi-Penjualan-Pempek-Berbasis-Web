    <!-- Footer Area Starts -->
    <footer class="footer-area">
      <div class="footer-widget section-padding">
        <div class="container">
          <div class="row justify-content-between">
            <div class="col-md-4">
              <div class="single-widget single-widget2 my-5 my-md-0">
                <h5 class="mb-4">Kontak Kami</h5>
                <div class="d-flex">
                  <div class="into-icon">
                    <i class="fa fa-map-marker"></i>
                  </div>
                  <div class="info-text">
                    <p>Jl. Pondok Ungu Permai, Marakash, Kec.Babelan, Bekasi, Jawa Barat, 17215. </p>
                  </div>
                </div>
                <div class="d-flex">
                  <div class="into-icon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <div class="info-text">
                    <p>0857 7197 2782</p>
                  </div>
                </div>
                <div class="d-flex">
                  <div class="into-icon">
                    <i class="fa fa-envelope-o"></i>
                  </div>
                  <div class="info-text">
                    <p>pempekceta@gmail.com</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="single-widget single-widget3">
                <h5 class="mb-4">Jam Buka</h5>
                <p>Setiap Hari...........Jam 12.00 - 18.00</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="container">
          <div class="row">
            <div class="col-lg-7 col-md-6">
              <span>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Dibuat Oleh &copy;<script>
                  document.write(new Date().getFullYear());
                </script></a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- Footer Area End -->


    <!-- Javascript -->
    <script type="text/javascript">
      $('#pay-button').click(function(event) {
        event.preventDefault();
        $(this).attr("disabled", "disabled");

        $.ajax({
          url: '<?php echo base_url(); ?>token',
          cache: false,

          success: function(data) {
            //location = data;

            console.log('token = ' + data);

            var resultType = document.getElementById('result-type');
            var resultData = document.getElementById('result-data');

            function changeResult(type, data) {
              $("#result-type").val(type);
              $("#result-data").val(JSON.stringify(data));
              //resultType.innerHTML = type;
              //resultData.innerHTML = JSON.stringify(data);
            }

            snap.pay(data, {

              onSuccess: function(result) {
                changeResult('success', result);
                console.log(result.status_message);
                console.log(result);
                $("#payment-form").submit();
              },
              onPending: function(result) {
                changeResult('pending', result);
                console.log(result.status_message);
                $("#payment-form").submit();
              },
              onError: function(result) {
                changeResult('error', result);
                console.log(result.status_message);
                $("#payment-form").submit();
              }
            });
          }
        });
      });
    </script>
    <script src="<?php echo base_url('assets_home/js/vendor/jquery-2.2.4.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets_home/js/vendor/bootstrap-4.1.3.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets_home/js/vendor/wow.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets_home/js/vendor/owl-carousel.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets_home/js/vendor/jquery.datetimepicker.full.min.js'); ?>"></script>
    <!-- <script src="<?php echo base_url('assets_home/js/vendor/jquery.nice-select.min.js'); ?>"></script> -->
    <script src="<?php echo base_url(); ?>assets_home/js/sweetalert2.all.min.js"></script>
    <script src="<?php echo base_url(); ?>assets_home/js/materialize.min.js"></script>
    <script src="<?php echo base_url('assets_home/js/main.js'); ?>"></script>
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
    </script>
    <script type="text/javascript">
      $(".button-collapse").sideNav();
      $(".modal").modal();

      $(document).ready(function() {
        <?php //if($this->uri->segment(1) == 'checkout' || $this->uri->segment(1) == 'Checkout') { 
        ?>

        $('#prov').change(function() {
          var prov = $('#prov').val();
          var province = prov.split(',');

          $.ajax({
            url: "<?php echo base_url(); ?>home/city",
            method: "POST",
            data: {
              prov: province[0]
            },
            success: function(obj) {
              $('#kota').html(obj);
            }
          });
        });

        $('#kota').change(function() {
          var kota = $('#kota').val();
          var dest = kota.split(',');
          var kurir = $('#kurir').val()

          $.ajax({
            url: "<?php echo base_url(); ?>home/getcost",
            method: "POST",
            data: {
              dest: dest[0],
              kurir: kurir
            },
            success: function(obj) {
              $('#layanan').html(obj);
            }
          });
        });

        $('#kurir').change(function() {
          var kota = $('#kota').val();
          var dest = kota.split(',');
          var kurir = $('#kurir').val()

          $.ajax({
            url: "<?php echo base_url(); ?>home/getcost",
            method: "POST",
            data: {
              dest: dest[0],
              kurir: kurir
            },
            success: function(obj) {
              $('#layanan').html(obj);
            }
          });
        });

        $('#layanan').change(function() {
          var layanan = $('#layanan').val();

          $.ajax({
            url: "<?php echo base_url(); ?>home/cost",
            method: "POST",
            data: {
              layanan: layanan
            },
            success: function(obj) {
              var hasil = obj.split(",");

              $('#ongkir').val(hasil[0]);
              $('#total').val(hasil[1]);
            }
          });
        });

        <?php //} 
        ?>
        $(window).scroll(function() {
          if ($(this).scrollTop() > 100) {
            $('.back-top').fadeIn();
          } else {
            $('.back-top').fadeOut();
          }
        });
        $('.back-top').click(function() {
          $("html, body").animate({
            scrollTop: 0
          }, 600);
          return false;
        });
      });
    </script>
    <!-- Google Map APi
		============================================ -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwIQh7LGryQdDDi-A603lR8NqiF3R_ycA"></script>
    <script>
      function initialize() {
        var mapOptions = {
          zoom: 15,

          scrollwheel: false,
          center: new google.maps.LatLng(-7.3929748, 109.3480009),

        };
        var map = new google.maps.Map(document.getElementById('contact_map_area'),
          mapOptions);
        var marker = new google.maps.Marker({
          position: map.getCenter(),
          icon: '<?php echo base_url(); ?>assets_home/img/map_pin.png',
          map: map,

        });

      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    </body>

    </html>