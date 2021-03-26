<?php
/*--------------------DOM XML PARSING-------------------------*/
if(empty($_GET['UserName']) OR empty($_GET['Password'])){
  echo("Please, input Username and Password");
}
else {
  $UserName = $_GET['UserName'];
  $Password = $_GET['Password'];

  //PROTECTION
  //$UserName = htmlspecialchars($_GET['UserName'], ENT_QUOTES);
  //$Password = htmlspecialchars($_GET['Password'], ENT_XML1);

  $doc = new DomDocument;

  // Check the document before refer to id
  $doc->validateOnParse = true;
  $doc->preserveWhiteSpace = false;
  $doc->Load('example.xml');

  $xpath = new DOMXPath($doc);
  //$query = "//Employee[UserName/text()='ABaker' and string-length(//Employee[position()=1]/child::node()[position()=2])=5 and '1'='1']";
  $query = "//Employee[UserName/text()='" . $UserName . "' and Password/text()='" . $Password . "']";
  //var_dump($query);
  $entries = $xpath->evaluate($query);
  var_dump ($entries[0]);
  /*$name = $entries[0]->nodeValue;
  $query = "substring(//Employee[position()=1]/child::node()[position()=2], 1, 1) = \"A\"";
  $entries = $xpath->evaluate($query);
  echo ("<br>");
  var_dump ($entries);*/
}

/*foreach ($entries as $entry) {
  echo "Found {$entry->previousSibling->previousSibling->nodeValue}," . " by {$entry->previousSibling->nodeValue}\n";
}
echo "The element whose id is myelement is: " .
$doc->getElementsByTagName("foo")[0]->nodeValue . "\n";*/
/*--------------------------------------------------------------*/

?>
<form action="index.php" method="GET">
  <input type="text" name="UserName" placeholder="UserName">
  <input type="text" name="Password" placeholder="Password">
  <input type="submit">
</form>
