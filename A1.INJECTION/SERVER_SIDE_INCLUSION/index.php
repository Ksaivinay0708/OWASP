<?php
$preLine='<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>SSI</title>
 </head>
 <body>';
 $postline = '</body>
</html>

<form action="index.php" method="GET">
 <input type="text" name="q">
 <input type="submit">
</form>
';
if (empty($_GET['q'])) {
  $line = "Please, input your name";
  $all = $preLine . $line . $postline;
  echo($all);
  die();
}
else{
  $line = '<p> Hello, ' . htmlspecialchars($_GET['q']) . ', </p><p> Your IP address is' . '</p><h1><!--#echo var="REMOTE_ADDR"--></h1>'; //if you want to exploit SSI, replace htmlspecialchars($_GET['q']) to $_GET['q']
  $all = $preLine . $line . $postline;
  $fp = fopen("index.shtml", "w"); // Keep in mind, that you must have permission to write index.shtml
  fputs($fp, $all);
  fclose($fp);

  header("Location: index.shtml");
}
?>
