<?php
namespace core;
class FactoryRouting 
{
    static function getController($uri) : \core\Controller
    {
      $parts = explode("/", $uri);
      
      if (!empty($parts[1]) )
      {
        
       $cname = "\\core\\".UCFirst($parts[1])."Controller";
       
       return new $cname();
        
      }

      return new \core\C404Controller();
      
      
    }
}

?>
