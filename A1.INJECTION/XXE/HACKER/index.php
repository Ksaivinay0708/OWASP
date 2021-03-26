<?php
// Used to retrieve information from GET requests
if (!empty($_GET["read"])){
  file_put_contents("requests.txt", (string)$_GET["read"] . "\n", FILE_APPEND);
}

?>
