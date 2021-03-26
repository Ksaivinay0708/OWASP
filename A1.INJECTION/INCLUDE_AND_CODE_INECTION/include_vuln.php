<?php
/*---------------------GET VARIANT----------------*/
print("Please, input filename to read");
print("<p>");
/*print(utf8_decode("&#x002E&#x002E&#x002F&#x002E&#x002E&#x002F&#x002E&#x002E&#x002F&#x002E&#x002E&#x002F&#x002E&#x002E&#x002F&#x002E&#x002E&#x002Fetc&#x002Fpasswd"));
die();*/
if (!empty($_GET['q'])){
  $have_special_chars = strpbrk(htmlspecialchars($_GET['q']), ";|");
  if(($have_special_chars === false) &&(substr_count($_GET['q'], "../") == 0)){
    $file = __DIR__ . "/" . $_GET['q'];
    if (@fopen($file,"r"))
      include $file;
    else
      print("File Not Exist");
  }

  else {
    print("Input name without special characters");
  }
}/*--------------------------------------------------*/

/*/----------------------POST VARIANT-------------------
print("Please, input filename to execute");
print("<p>");
if (isset($_POST['q'])){
    $have_special_chars = strpbrk(htmlspecialchars($_POST['q']), ";|");
    if($have_special_chars === false){
      $file = __DIR__ . "/" . $_POST['q'];
      if (@fopen($file,"r"))
        include $file;
      else
        print("File Not Exist");
    }
    else {
      print("Input name without special characters");
    }
}
//-----------------------------------------------*/
?>
<form name="search" action="/include_vuln.php" method="get">
<input type="text" name="q" placeholder="Input Name">
