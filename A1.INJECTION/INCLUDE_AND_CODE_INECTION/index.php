<?php
// DON'T use eval in your code eval() function! It is dangerous!
$myvar = "a";
if (!empty($_GET['q'])){
  $x = $_GET['q'];
  eval("\$myvar = $x;");
  echo $myvar;
}
else{
    echo "Please input number to print";
}

?>
<form name="search" action="/index.php" method="GET">
<input type="text" name="q" placeholder="Input Name">
