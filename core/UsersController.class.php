<?php
namespace core;

class UsersController extends \core\Controller {
  public function getPage()
  {
    //echo "<h1>Users page</h1>";
    $arr = array();
    $arr["id"] = 5;
    $arr["images"] = array();
    $arr["images"][] = array("id"=>7, "url"=>"госуслуги.ру");
    $arr["images"][] = array("id"=>8, "url"=>"yandex.ru");
    
    echo json_encode($arr, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
  }
  
}

?>
