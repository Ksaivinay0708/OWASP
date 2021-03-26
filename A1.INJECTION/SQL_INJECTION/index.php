<?php
require_once(__DIR__ . "/Model/model.php");

if (isset($_GET['q']) && isset($_GET['p'])){
    $data = get_data_PDO($_GET['q'], $_GET['p']);
    if(empty($data)){
    $data = "Invalid name: " . $_GET['q'] . " or Id: " . $_GET['p'];
  }
  /*else{
    $col = count($data);
    if($col > 1){
      $data = "Invalid name: " . $_GET['q'] . " or Id: " . $_GET['p'];
    }
  }*/
}

else{
  $data = "Please, input name!";
}
include (__DIR__ . "/View/view.php");
?>
