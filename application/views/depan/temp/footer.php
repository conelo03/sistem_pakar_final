<br>
<br>
<!-- Footer -->
<footer class="text-center text-white fixed-bottom ">

  <!-- Copyright -->
  <div class=" text-center text-dark p-3" style="background-color: slateblue;">
    ©2021 Copyright Sistem Pakar Skripsi 2021 by Muhammad Iqbal Darmawan

  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->



<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/') ?>vendor/chart.js/Chart.min.js"></script>
<script src="<?= base_url('assets/') ?>js/demo/chart-area-demo.js"></script>
<!-- <script src="<?= base_url('assets/') ?>js/demo/chart-pie-demo.js"></script> -->
<script src="<?= base_url('assets/') ?>js/demo/chart-bar-demo.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    // Pie Chart Example
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: [
          <?php
          $get_p = $this->db->get('tingkat_kecemasan')->result_array();
          foreach ($get_p as $p) {
            echo '"' . $p['nama'] . '"' . ',';
          }
          ?>
        ],
        datasets: [{
          data: [
            <?php
            $get_p = $this->db->get('tingkat_kecemasan')->result_array();
            foreach ($get_p as $p) {
              $get_all = $this->db->get_where('hasil')->num_rows();
              $get_jml = $this->db->get_where('hasil', ['kode_tingkat_cemas' => $p['kode_tingkat_cemas']])->num_rows();

              if (empty($get_all) || empty($get_jml)) {
                $jml = 0;
              } else {
                $jml = $get_jml / $get_all * 100;
              }

              echo '"' . intval($jml) . '"' . ',';
            }
            ?>
          ],
          backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
          hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
          hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          caretPadding: 10,
        },
        legend: {
          display: false
        },
        cutoutPercentage: 80,
      },
    });
  });
</script>
</body>

</html>