<?php
header("Content-type: text/html;");
header("Charset: UTF-8;");

$db = array(
"Омск", 
  "Новосиб", 
  "Томск", 
  "Екб"
);

// isset // empty
if (!empty($_GET["q"]))
{
  $filt_db = array();
  
  foreach ($db as $elem)
  {
    if (strpos(strtolower($elem), strtolower($_GET["q"]))!==false)
    {
      $filt_db[] = "<span>".$elem."</span>";
      
    }
  }
  
  echo implode("", $filt_db);
}


?>
