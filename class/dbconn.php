<?php
/**
  
 coder: Aysad Kozanoglu 
 email: aysadx@gmail.com
 web: http://onweb.pe.hu

**/
class DBPDO {

  public $pdo;
  private $error;


  function __construct() {
    $this->connect();
  }


  function prep_query($query){
    return $this->pdo->prepare($query);
  }


  function connect(){
    if(!$this->pdo){

      $dsn      = 'mysql:dbname=' . DATABASE_NAME . ';host=' . DATABASE_HOST.';charset=utf8';
      $user     = DATABASE_USER;
      $password = DATABASE_PASS;

      try {
        $this->pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_PERSISTENT => true));
        return true;
      } catch (PDOException $e) {
        $this->error = $e->getMessage();
        die($this->error);
        return false;
      }
    }else{
      $this->pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
      return true;
    }
  }


  function table_exists($table_name){
    $stmt = $this->prep_query('SHOW TABLES LIKE ?');
    $stmt->execute(array($table_name));
    return $stmt->rowCount() > 0;
  }


  function execute($query, $values = null){
    if($values == null){
      $values = array();
    }else if(!is_array($values)){
      $values = array($values);
    }
    $stmt = $this->prep_query($query);
    $stmt->execute($values);
    return $stmt;
  }

  function fetch($query, $values = null){
    if($values == null){
      $values = array();
    }else if(!is_array($values)){
      $values = array($values);
    }
    $stmt = $this->execute($query, $values);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  function fetchAll($query, $values = null, $key = null){
    if($values == null){
      $values = array();
    }else if(!is_array($values)){
      $values = array($values);
    }
    $stmt = $this->execute($query, $values);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Allows the user to retrieve results using a
    // column from the results as a key for the array
    if($key != null && $results[0][$key]){
      $keyed_results = array();
      foreach($results as $result){
        $keyed_results[$result[$key]] = $result;
      }
      $results = $keyed_results;
    }
    return $results;
  }

  function lastInsertId(){
    return $this->pdo->lastInsertId();
  }

}


/**
örnekler: 

$DB = new DBPDO();


$DB->execute("UPDATE customers SET email = 'eposta@domain.com' WHERE username = 'xyz123'");

$DB->execute("UPDATE customers SET email = ? WHERE username = ?", array('eposta@domain.com', 'xyz123'));

$user = $DB->fetch("SELECT * FROM users WHERE id = ?", $id); // $id=1234567890

$users = $DB->fetchAll("SELECT * FROM users");

    output:
    --------
      [0] => Array
    (
        [id] => 1
        [name] => hasan
    )

    [1] => Array
    (
        [id] => 2
        [name] => tasan
    )

    [2] => Array
    (
        [id] => 3
        [name] => basan
    )


$users = $DB->fetchAll("SELECT * FROM users", null, 'name');

    output:
    -------
    [hasan] => Array
    (
        [id] => 1
        [name] => hasan
    )

    [tasan] => Array
    (
        [id] => 2
        [name] => tasan
    )

    [basan] => Array
    (
        [id] => 3
        [name] => basan
    )

if( isset ( $users[$raw_data['user_name']] ) ) { //Do something }

**/