<?php
$str = str_split("Hello, ;&world!]+");
$out_str = "";
foreach($str as $key => $val){
  $a = ord($val);
  if (($a < 47 | ($a > 57 & $a < 65)) & $a != 38 & $a != 35 & $a != 59){
    $out_str = $out_str . "&#" . $a . ";";
  }
  else{
    $out_str = $out_str . $val;
  }
}

var_dump($out_str);
/*
if (isset($_GET['p']) && isset($_GET['q'])){
  $p = $_GET['p'];
  $q = $_GET['q'];
  $role = "user";
}

$role = "user";
$a = extract($_GET);
var_dump($a);
print("You put some info " . $q . " and " . $p . " and your role: " . $role . $g);
*/
?>
