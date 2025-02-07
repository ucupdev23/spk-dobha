  <!-- General JS Scripts -->
  <script src="assets/modules/jquery.min.js"></script>
  <script src="assets/modules/popper.js"></script>
  <script src="assets/modules/tooltip.js"></script>
  <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="assets/modules/moment.min.js"></script>
  <script src="assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="assets/modules/simple-weather/jquery.simpleWeather.min.js"></script>
  <script src="assets/modules/chart.min.js"></script>
  <script src="assets/modules/jqvmap/dist/jquery.vmap.min.js"></script>
  <script src="assets/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="assets/modules/summernote/summernote-bs4.js"></script>
  <script src="assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="assets/js/page/index-0.js"></script>

  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-sparklines/2.1.2/jquery.sparkline.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://office.katib.id/assets/vendor/datatables/DataTables-1.10.22/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://office.katib.id/assets/vendor/datatables/Select-1.3.1/js/dataTables.select.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
  <script src="https://office.katib.id/assets/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <script src="https://office.katib.id/assets/vendor/select2/dist/js/select2.full.min.js"></script>
  <script src="https://office.katib.id/assets/vendor/jquery-selectric/public/jquery.selectric.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>

  <?php
    if ($page) {
        $data_script = "module/$page/script.php";
    } else {
        $data_script = "";
    }

    if (file_exists($data_script)) {
        include_once($data_script);
    } else {
        include 'dashboard/script.php';
    }
    ?>
    
      <script>
      document.addEventListener('DOMContentLoaded', function() {
          // Trigger modal when logout link is clicked
          document.querySelector('.dropdown-item.has-icon.text-danger').addEventListener('click', function(event) {
              event.preventDefault();
              $('#logoutModal').modal('show');
          });

          // Handle logout confirmation
          document.getElementById('confirmLogout').addEventListener('click', function() {
              window.location.href = 'logout.php';
          });
      });
  </script>