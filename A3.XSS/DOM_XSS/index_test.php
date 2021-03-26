<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
	  <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
	  <link rel="stylesheet" href="css/styles.css" type="text/css">
    <title>DOM XSS</title>
  </head>
<?php
if (isset($_GET['str'])){
  echo ("<a href=" . $_GET['str'] . ">foo</a>");
}

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
</html>
