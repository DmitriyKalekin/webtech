<?php
namespace core;

class UsersController extends \core\Controller 
{
  public  $model = null; //\core\UsersModel
  
  public function __construct()
  {
    $this->model = new \core\UsersModel();
    
  }
  
  public function index()
  {
    $data = $this->model->getAll();
    
    echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
  }
  
  public function delete()
  {
    echo "<h1>Deleting user</h1>";
   
  }
  
}

?>
