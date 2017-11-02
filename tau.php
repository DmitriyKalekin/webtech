<?php

function x($t)
{
  if ($t < 0) return 0;
  
  return 1;
}



function yy($k, $T, $tmin, $tmax) : array
{
  $data  = array();
  

  $y = 0;
  $dt = 0.0001;

  $t = $tmin;
  $i=0;

  while ($t <= $tmax)
  {
    //  dy   = (k x(t) - y(t) ) /T * dt
    
    
    $dy  = ($k/$T *x($t) - $y/$T) * $dt; 
    $y = $y + $dy;
    $t = $t + $dt;
    $data[$i] = array();
    $data[$i]["t"] = $t;
    $data[$i]["x"] = x($t);
    $data[$i]["y"] = $y;
    $i++;

  }
  
  return $data;
   
}

function t_perehod(array $data)
{
  
  $l = count($data);
  $y_ust = $data[$l-1]["y"];
  
  $epsilon = 0.05;
  
  for ($i=0; $i<$l; $i++)
  {
    if ( abs(($data[$i]["y"]-$y_ust)/$y_ust) < $epsilon )
    {
      return $data[$i]["t"];
    }
    
  }
  
}




$data = yy(1,0.1, -0.1, 1);








?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['t', 'x', 'y'],
<?php          
for ($i=0; $i<count($data); $i++)
{
          
      echo    "[".$data[$i]["t"].",  ".$data[$i]["x"].",     ".$data[$i]["y"]."],";

}          
?>         
        ]);

        var options = {
          title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
      google.charts.setOnLoadCallback(drawChart);

      

      
      
    </script>
  </head>
  <body>
    <div id="curve_chart" style="width: 900px; height: 500px"></div>
    
    

<?php

    $tt = t_perehod($data);
    
    echo "<h1>{$tt}</h1>";

echo "<table border=1>";
  echo "<tr>";
  echo "<td>t</td><td>x</td><td>y</td>";
  echo "</tr>";
for ($i=0; $i<count($data); $i++)
{
  
  echo "<tr>";
  echo "<td>{$data[$i]["t"]}</td><td>{$data[$i]["x"]}</td><td>{$data[$i]["y"]}</td>";
  echo "</tr>";
  
}
echo "</table>";
    
    
    
?>

    
  </body>
</html>    
