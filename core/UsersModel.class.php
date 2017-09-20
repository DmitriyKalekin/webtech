<?php
namespace core; /// new \core\UsersModel()

class UsersModel // extends Model // implements IModel
{
  protected $mysqli; // 
  
  public function __construct()
  {
    // Pattern Singleton
    $this->mysqli = new \mysqli("localhost", "root", "", "quest");
    $this->mysqli->query("SET NAMES utf8;");

    /* проверка соединения */
    if ($this->mysqli->connect_errno) {
        printf("Не удалось подключиться: %s\n", $mysqli->connect_error);
        exit();
    }
    
  }
  
  public function getAll() : array
  {
    $ret = array();
    
     if ($result = $this->mysqli->query("SELECT * FROM users LIMIT 10;")) 
     {
        //printf("Select вернул %d строк.\n", $result->num_rows);
       
        while  ($row = $result->fetch_array(MYSQLI_ASSOC)) // array OR false
        {
          $ret[] = $row;
          
        }  

        /* очищаем результирующий набор */
        $result->close();
      } 
    
    return $ret;
    
  }
  
  
}
