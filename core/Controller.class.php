<?php
namespace core;
class Controller 
{
  public function getHeader()
  {
    return "Content-type: text/json;";
  }
  
  public function getPage()
  {
    echo "Impossible entrance";
  }
  
}
?>
