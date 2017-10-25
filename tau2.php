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


$plot = array();

$T1 = 0.1;
for ($i=1; $i<=4; $i++)
{
 $T = $T1*$i;
 $data = yy(5,$T, -0.1, $i); 
  var_dump($data[count($data)-1]["t"]);
 $tt = t_perehod($data);
 
 $plot[] = array("x"=>$i, "tt"=>$tt);
  
}


?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['i', 'tt'],
<?php          
for ($i=0; $i<count($plot); $i++)
{
          
      echo    "[".$plot[$i]["x"].",  ".$plot[$i]["tt"]."],";

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

   
    
    echo "<h1>{$tt}</h1>";

echo "<table border=1>";
  echo "<tr>";
  echo "<td>x</td><td>tt</td>";
  echo "</tr>";
for ($i=0; $i<count($plot); $i++)
{
  
  echo "<tr>";
  echo "<td>{$plot[$i]["x"]}</td><td>{$plot[$i]["tt"]}</td>";
  echo "</tr>";
  
}
echo "</table>";
    
    
    
?>

    
  </body>
</html>    
