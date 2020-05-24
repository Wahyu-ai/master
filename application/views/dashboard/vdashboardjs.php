
<!-- Page level custom scripts -->
<script src="<?=base_url()?>SB-ADMIN-2/js/demo/chart-area-demo.js"></script>
<script type="text/javascript">
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart users Site Count
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {

    labels: [
      <?php
      $result = "";
      foreach ($count_users_per_site as $s) :
        $result .= '"'.$s->st_nama_site.'", ';
      endforeach;
      $trimmed = rtrim($result, ', ');
      echo $trimmed;
      ?>
    ],
    datasets: [{
      data: [
        <?php
        $result = "";
        foreach ($count_users_per_site as $s) :
          $result .= $s->jlh.', ';
        endforeach;
        $trimmed = rtrim($result, ', ');
        echo $trimmed;
        ?>
      ],
      backgroundColor: [
        <?php
        $result = "";
        foreach ($count_users_per_site as $s) :
          $result .= '"'.$s->st_bgcolor.'", ';
        endforeach;
        $trimmed = rtrim($result, ', ');
        echo $trimmed;
        ?>
      ],
      hoverBackgroundColor: [
        <?php
        $result = "";
        foreach ($count_users_per_site as $s) :
          $result .= '"'.$s->st_bgcolor_hover.'", ';
        endforeach;
        $trimmed = rtrim($result, ', ');
        echo $trimmed;
        ?>
      ],
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
</script>
