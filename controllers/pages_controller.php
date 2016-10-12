<?php
/**
 pages_controller.php
 example of pages controller
 coder: Aysad Kozanoglu 
 email: aysadx@gmail.com
 web: http://onweb.pe.hu

**/
  class PagesController {
    public function home() {
      $first_name = 'Aysad';
      $last_name  = 'Kozanoglu';
      require_once('views/pages/home.php');
    }

    public function error() {
      require_once('views/pages/error.php');
    }
  }
?>