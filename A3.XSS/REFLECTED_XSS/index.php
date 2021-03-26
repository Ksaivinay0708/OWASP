<?php
require_once(__DIR__ . "/Model/model.php");

// This function used for escape special chars before inserting to page
function str_escape($str, $type="none"){
  $str = str_split($str);
  $out_str = "";
  foreach($str as $key => $val){
    $a = ord($val);
    if (($a <= 47 | ($a > 57 & $a < 65)) & $a != 38 & $a != 35 & $a != 59){
      if($type == "url"){
        $out_str = $out_str . "%" . dechex($a);
      }
      else{
        $out_str = $out_str . "&#" . $a . ";";
      }
    }
    else{
      $out_str = $out_str . $val;
    }
  }
  return $out_str;
}

session_name("ID");
session_start();

$url = "0";
if(isset($_GET['url'])){
  $url = $_GET['url'];
}
if (isset($_GET['q']) && isset($_GET['p']) && empty($_SESSION)){//empty($_COOKIE['logged'])){
  $q = $_GET['q'];
  $p = $_GET['p'];
  if (sizeof($hash = take_hash($q))){
    $is_blocked = counter($q);
    if($is_blocked[0]['counter'] <= "4"){
      if(password_verify($p, $hash[0]['hash'])){
        counter($q, "clear");
        if(isset($_GET['remember_me']) && ($_GET['remember_me'] == "true")){
          session_regenerate_id(true);
          $_SESSION['logged'] = true;
          $_SESSION['name'] = $q;
          /*$coo = md5($p) . $hash[0]['hash'];
          setcookie("logged", $coo, time()+300, "/");
          $data = cookie("write", $coo, $q);*/
          $q = htmlentities($q, ENT_QUOTES);
          include(__DIR__ . "/View/logged_user.php");
          exit();
          }
        else
          /*$LastName = get_all_data($q, $hash[0]['hash']);
          $LastName = $LastName[0]['Last Name'];*/
          $q = htmlentities($q, ENT_QUOTES);
          include(__DIR__ . "/View/logged_user.php");
          exit();
        }
      else{
        counter($q, "add");
        $q = htmlentities($q, ENT_QUOTES);
        $p = htmlentities($p, ENT_QUOTES);
        if($url != "0"){
          $url = str_escape($url, "url");
        }
        $data = "Invalid name: " . $q . " or Password: " . $p;
        include (__DIR__ . "/View/main_page.php");
        exit();
      }
    }
    else{
      $q = htmlentities($q, ENT_QUOTES);
      if($url != "0"){
        $url = str_escape($url, "url");
      }
      $data = "Your account was blocked: " . $q;
      include (__DIR__ . "/View/main_page.php");
      exit();
    }
  }
  else{
    $q = htmlentities($q, ENT_QUOTES);
    $q = str_escape($q);
    $p = htmlentities($p, ENT_QUOTES);
    $p = str_escape($p);
    if($url != "0"){
      $url = str_escape($url, "url");
    }
    $data = "Invalid name: " . $q . " or Password: " . $p;
    include (__DIR__ . "/View/main_page.php");
    exit();
  }
}

elseif(!empty($_SESSION)){//isset($_COOKIE['logged'])){
  if(isset($_GET['remember_me']) && ($_GET['remember_me'] == "false")){
    session_destroy();
    $data = "You logged out!";
    if($url != "0"){
      $url = str_escape($url, "url");
    }
    include(__DIR__ . "/View/main_page.php");
    exit();
  }
  $q = $_SESSION['name'];
  $q = htmlentities($q, ENT_QUOTES);
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
  if($url != "0"){
    $url = str_escape($url, "url");
  }
  include (__DIR__ . "/View/main_page.php");
  exit();
}
?>
