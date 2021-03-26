<?php
/*---------------------GET VARIANT----------------*//*
print("Please, input filename to read");  //input the hello.txt
print("<p>");
if (isset($_GET['q'])){
    $have_dot = strpbrk(htmlspecialchars($_GET['q']), "&;|"); //set false if string has not special chars as &;|
    if($have_dot === false){
      $file = $_GET['q'];
      system("cat $file");
      //echo(shell_exec("cat $file"));
      //echo(exec("cat $file"));
    }
    else {
      print("Input name without special characters");
    }
}*//*--------------------------------------------------*/

//----------------------POST VARIANT-------------------
print("Please, input filename to read");
print("<p>");
if (isset($_POST['q'])){
  /*$a = urldecode($_POST['q']);
  echo($a . "<br>");
  print(utf8_decode("&#x007C"));
  //print(html_entity_decode("&#x007C", ENT_NOQUOTES, 'UTF-8'));
  die();*/
    $have_special_chars = strpbrk(htmlspecialchars($_POST['q']), ";|");
    if($have_special_chars === false){
      $file = $_POST['q'];
      system("cat $file");
      //echo(shell_exec("cat $file"));
      //echo(exec("cat $file"));
    }
    else {
      print("Input name without special characters");
    }
}
//-----------------------------------------------
?>
<form name="search" action="index.php" method="post">
<input type="text" name="q" placeholder="Input Name">
