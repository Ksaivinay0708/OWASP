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
  $sth = $pdo -> prepare("SELECT * FROM `Names` WHERE (`First Name` = :name AND `hash` = :hash)"); //Statement Handler
  $sth -> execute([':name' => $name, ':hash' => $hash]);
  return $result = $sth -> fetchAll(PDO::FETCH_ASSOC);
}

function take_hash($name){
  $pdo = create_PDO();
  $name = (string)$name;
  $sth = $pdo -> prepare("SELECT hash FROM `Names` WHERE `First Name` = :name"); //Statement Handler
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
      $sth = $pdo -> prepare("UPDATE `Names` SET `cookie` = :value WHERE `First Name` = :name"); //Statement Handler
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
    $sth = $pdo -> prepare("UPDATE `Names` SET `counter` = 0 WHERE `First Name` = :name");
    $sth -> execute([':name' => $name]);
    return;
  }

  if($action == "add"){
    $sth = $pdo -> prepare("UPDATE `Names` SET `counter` = `counter` + 1 WHERE `First Name` = :name");
    $sth -> execute([':name' => $name]);
    return;
  }

  $sth = $pdo -> prepare("SELECT counter FROM `Names` WHERE `First Name` = :name"); //Statement Handler
  $sth -> execute([':name' => $name]);
  return $query = $sth -> fetchAll(PDO::FETCH_ASSOC);
}

/*
function add_hash($name, $password){
  $pdo = create_PDO();
  $name = (string)$name;
  $password = (string)$password;
  $hash = password_hash($password, PASSWORD_BCRYPT);
  password_verify();
  $sth = $pdo -> prepare("UPDATE `Names` SET `hash` = :hash WHERE (`First name` = :name AND `Password` = :password)"); //Statement Handler
  $sth -> execute([':hash' => $hash, ':name' => $name, ':password' => $password]);
  return $result = $sth -> fetchAll(PDO::FETCH_ASSOC);
}
*/

// If you don't want use Database to store CSRF token, this may be made by write token to session
function CSRFToken($action = "foo", $name = "bar", $value = "0"){
  $pdo = create_PDO();
  $value = (string)$value;
  $action = (string)$action;
  $name = (string)$name;
  if ($action == "set"){
    $sth = $pdo -> prepare("UPDATE `Names` SET `CSRFToken` = :value WHERE `First Name` = :name"); //Statement Handler
    $sth -> execute([':value' => $value, ':name' => $name]);
  }
  elseif($action == "get"){
    $sth = $pdo -> prepare("SELECT `CSRFToken` FROM `Names` WHERE `First Name` = :name"); //Statement Handler
    $sth -> execute([':name' => $name]);
    return $result = $sth -> fetchAll(PDO::FETCH_ASSOC);
  }
}
?>
