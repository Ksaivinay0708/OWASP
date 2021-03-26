<?php
// This document use sessions to identification of logged user. You may uncomment commented strings to use identification by cookie
require_once(__DIR__ . "/Model/model.php");
session_name("ID");
session_start();

if (isset($_GET['q']) && isset($_GET['p']) && empty($_SESSION)){//empty($_COOKIE['logged'])){
  $q = $_GET['q'];
  $p = $_GET['p'];

  if (sizeof($hash = take_hash($q))){
    $is_blocked = counter($q);
    if($is_blocked[0]['counter'] <= "4"){
      if(password_verify($p, $hash[0]['hash'])){
        counter($q, "clear");
        if(isset($_GET['remember_me']) && ($_GET['remember_me'] == "true")){
          session_regenerate_id(true);  //This is use to prevent session fixation attack. See OWASP for more information
          $_SESSION['logged'] = true;
          $_SESSION['name'] = $q;
          $_SESSION['timestamp'] = time();
          /*$coo = md5($p) . $hash[0]['hash'];
          setcookie("logged", $coo, time()+300, "/");
          $data = cookie("write", $coo, $q);*/
          include(__DIR__ . "/View/logged_user.php");
          exit();
          }
        else
          include(__DIR__ . "/View/logged_user.php");
          exit();
        }
      else{
        counter($q, "add");
        $data = "Invalid name: " . $q . " or Password: " . $p;
        include (__DIR__ . "/View/main_page.php");
        exit();
      }
    }
    else{
      $data = "Your account was blocked: " . $q;
      include (__DIR__ . "/View/main_page.php");
      exit();
    }
  }
  else{
    $data = "Invalid name: " . $q . " or Password: " . $p;
    include (__DIR__ . "/View/main_page.php");
    exit();
  }
}

elseif(!empty($_SESSION)){//isset($_COOKIE['logged'])){
  if(isset($_GET['remember_me']) && ($_GET['remember_me'] == "false") || (($_SESSION['timestamp'] + 300) < time())){
    session_destroy();
    $data = "You logged out!";
    include(__DIR__ . "/View/main_page.php");
    exit();
  }
  $q = $_SESSION['name'];
  include(__DIR__ . "/View/logged_user.php");
  /*$data = cookie("read",$_COOKIE['logged']);
  if (!empty($data)){
    $q = $data[0]['First Name'];
    setcookie("logged", $_COOKIE['logged'], time()+300, "/");
    cookie("write", $_COOKIE['logged'], $q);
    include(__DIR__ . "/View/logged_user.php");
  }
  else
    include (__DIR__ . "/View/main_page.php");*/
}

else{
  $data = "Please, input name!";
  include (__DIR__ . "/View/main_page.php");
  exit();
}
?>
