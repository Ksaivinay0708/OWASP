<?php
function create_PDO(){
  $host = 'localhost';
  $dbname = 'Test';
  $user = 'root';
  $pass = 'root';

  $dsn = "mysql:dbname=$dbname; host:$host"; //Data Source Name
  $pdo = new PDO($dsn, $user, $pass);
  return $pdo;
}

function get_all_data($name, $hash){
  $pdo = create_PDO();
  $name = (string)$name;
  $hash = (string)$hash;
  $sth = $pdo -> prepare("SELECT * FROM `Names` WHERE (`First name` = :name AND `hash` = :hash)"); //Statement Handler
  $sth -> execute([':name' => $name, ':hash' => $hash]);
  return $result = $sth -> fetchAll(PDO::FETCH_ASSOC);
}

function take_hash($name){
  $pdo = create_PDO();
  $name = (string)$name;
  $sth = $pdo -> prepare("SELECT hash FROM `Names` WHERE `First name` = :name"); //Statement Handler
  $sth -> execute([':name' => $name]);
  return $query = $sth -> fetchAll(PDO::FETCH_ASSOC);
}

function cookie($action = "foo", $value = "0", $name = "bar"){
  $pdo = create_PDO();
  $action = (string)$action;
  $value = (string)$value;
  $name = (string)$name;
  if($value != "0"){
    if($action == "write"){
      $sth = $pdo -> prepare("UPDATE `Names` SET `cookie` = :value WHERE `First name` = :name"); //Statement Handler
      $sth -> execute([':value' => $value, ':name' => $name]);
      return(1);
    }
    elseif($action == "read"){
      $sth = $pdo -> prepare("SELECT `First Name` FROM `Names` WHERE `cookie` = :value"); //Statement Handler
      $sth -> execute([':value' => $value]);
      return $result = $sth -> fetchAll(PDO::FETCH_ASSOC);
    }
    else
      return "Method was not pointed";
    }
  else
    return "Value was not pointed";
}

function counter($name, $action = "show"){
  $pdo = create_PDO();
  $name = (string)$name;
  $action = (string)$action;

  if($action == "clear"){
    $sth = $pdo -> prepare("UPDATE `Names` SET `counter` = 0 WHERE `First name` = :name");
    $sth -> execute([':name' => $name]);
    return;
  }

  if($action == "add"){
    $sth = $pdo -> prepare("UPDATE `Names` SET `counter` = `counter` + 1 WHERE `First name` = :name");
    $sth -> execute([':name' => $name]);
    return;
  }

  $sth = $pdo -> prepare("SELECT counter FROM `Names` WHERE `First name` = :name"); //Statement Handler
  $sth -> execute([':name' => $name]);
  return $query = $sth -> fetchAll(PDO::FETCH_ASSOC);
}
?>
