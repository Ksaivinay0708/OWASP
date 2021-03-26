<?php
// This example without PDO! Uncomment this and comment PDO section to get vulnerable code
/*
function db_connect(){
  return mysqli_connect('localhost', 'root', 'root', 'Test');
}

function get_data($name, $id){
  $names = [];
  $pre = "SELECT * FROM `Names` WHERE (`First name` = '" . $name . "' AND `id` = '" . $id . "')";
  if($con = db_connect()){
    $query = mysqli_query($con, $pre);//"SELECT * FROM `Names` WHERE `First name`='$name'");
    if (!$query) {
      echo mysqli_error($con);
      die;
    }
    mysqli_close($con);
    while (false != ($b = mysqli_fetch_assoc($query))){
      $names[] = $b;
    }
    return $names;
  }
  else{
    mysqli_close($con);
    die("connection_Error");
  }
}
*/
// PDO Section
function get_data_PDO($name, $id){
  $host = 'localhost';
  $dbname = 'Test';
  $user = 'root'; // This is FOR EXAMPLE! Don't use root:root credentials on production DB
  $pass = 'root';

  $dsn = "mysql:dbname=$dbname; host:$host"; //Data Source Name
  $pdo = new PDO($dsn, $user, $pass);

  $name = (string)$name;
  $id = (int)$id;
/* -----------------------------UNSECURE REQUEST-----------------------------
  */$sth = $pdo -> prepare("SELECT * FROM `Names` WHERE (`First name` = '$name' AND `id` = '$id')"); //Statement Handler
  $sth -> execute();/*
  --------------------------------------------------------------------------*/
  /*----------------------------SECURE REQUEST VAR1---------------------------
  $sth = $pdo -> prepare("SELECT * FROM `Names` WHERE (`First name` = :name AND `id` = :id)"); //Statement Handler
  $sth -> execute([':name' => $name, ':id' => $id]);
  --------------------------------------------------------------------------*/
  /*----------------------------SECURE REQUEST VAR2-----------------------*/
  /*$sth = $pdo -> prepare("SELECT * FROM `Names` WHERE (`First name` = :name AND `id` = :id)"); //Statement Handler
  $sth -> bindParam(':name', $name);
  $sth -> bindParam(':id', $id);
  $sth -> execute();*/
  return $result = $sth -> fetchAll(PDO::FETCH_ASSOC);
}

?>
