<?php
error_reporting(E_ALL);
header("Content-type: text/html; Charset: utf-8;");

$mysqli = new mysqli("localhost", "root", "", "quest");

$mysqli->query("SET NAMES utf8;");

// $_GET["q"] = "";


// mb_substr($_GET["q"], 0, strlen($_GET["q"])-1)

if ($res = $mysqli->query("SELECT * FROM users 
WHERE info LIKE '%".($_GET["q"])."%' LIMIT 100;"))
{
 
  while ($row = $res->fetch_assoc())
  {
    echo "<pre>";
    var_dump($row);
    echo "</pre>";
  }
  
  
  //$ret = $res->fetch_all(MYSQLI_ASSOC);
  
    
    
  
  
  
}



?>
