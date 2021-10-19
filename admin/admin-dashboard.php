<?php
    require_once 'assets/php/admin-header.php';
    require_once 'assets/php/admin-db.php';
    $count = new Admin();
?>


<div class="row row-cols-1 row-cols-md-3 mt-3">
  <div class="col mb-4">
    <div class="card bg-primary">
    <div class="card-header">Total Users</div>
        <div class="card-body">
          <h1 class="display-4">
          <?php echo $count->totalCount('users'); ?>
          </h1>
        </div>
    </div>
  </div>

  <div class="col mb-4">
    <div class="card bg-danger">
    <div class="card-header">Total Notes</div>
      <div class="card-body">
        <h1 class="display-4">
        <?php echo $count->totalCount('notes'); ?>
        </h1>
      </div>
    </div>
  </div>

  <div class="col mb-4">
    <div class="card bg-success">
    <div class="card-header">Total feedback</div>
      <div class="card-body">
        <h1 class="display-4">
        <?php echo $count->totalCount('feedback'); ?>
        </h1>
      </div>
    </div>
  </div>

  <div class="col mb-4">
    <div class="card bg-info">
    <div class="card-header">Total Notification</div>
      <div class="card-body">
        <h1 class="display-4">
        <?php echo $count->totalCount('notification'); ?>
        </h1>
      </div>
    </div>
  </div>
</div>
  
<div class="row mt-3">
    <div class="col mb-4">
    <div class="card bg-success">
    <div class="card-header bg-success text-center text-white">Male / Female User percentage</div>
     <div id="chartOne" style="width: 99%; height:400px;"></div>
    </div>
  </div>
</div>


</div>
</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});

// Set a callback to run when the Google Visualization API is loaded.
google.charts.setOnLoadCallback(drawChart);

// Callback that creates and populates a data table,
// instantiates the pie chart, passes in the data and
// draws it.
function drawChart() {

  // Create the data table.
  var data = new google.visualization.DataTable();
  data.addColumn('string', 'Gender');
  data.addColumn('number', 'people');
  data.addRows([
    ['Male', <?php echo $count->noOfMaleUsers(); ?>],
    ['Female',  <?php echo $count->noOfFemaleUsers(); ?>]
  ]);

  // Set chart options
  var options = {'title':'Percentage of Male / Female users',
                 'width':400,
                 'height':300};

  // Instantiate and draw our chart, passing in some options.
  var chart = new google.visualization.PieChart(document.getElementById('chartOne'));
  chart.draw(data, options);
}
</script>
</body>
</html>