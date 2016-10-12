<?php
/**
 index.php
	bootstrap the MVC
	
 coder: Aysad Kozanoglu 
 email: aysadx@gmail.com
 web: http://onweb.pe.hu

**/
  require_once('errorhandling.php');

  require_once('config.php');

  require_once('class/dbconn.php');

 
$DB = new DBPDO();

  if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action     = $_GET['action'];
  } else {
    $controller = 'pages';
    $action     = 'home';
  }

  require_once('views/layout.php');

  //debug
 // print_r(DBCONF);
?>