<?php
function vd($s)
{
  echo "<pre>";
  var_dump($s); 
  echo "</pre>";
}

function __autoload($classname)
{
  
  $classname = str_replace("\\", "/", $classname);
  
  $parts = explode("/", $classname);
  $last_name = $parts[count($parts)-1];
  $last_name = UCFirst($last_name);
  $classname = implode("/", $parts);
  
   var_dump("{$classname}");
  
   if (!empty($classname) )
      {
       $cname = $classname;
    
     if (file_exists($cname.".class.php"))
        {
           require_once("{$cname}.class.php");
        }
        
      }
}

$ctl = \core\FactoryRouting::getController($_SERVER["REQUEST_URI"]);

$ctl->getPage();

?>
