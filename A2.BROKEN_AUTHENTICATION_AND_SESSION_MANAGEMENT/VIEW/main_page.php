<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
	  <link rel="stylesheet" href="css/styles.css" type="text/css">
    <title>Session Management</title>
  </head>
  <body>
    <div id="wrapper">
      <header>
        <form name="search" action="./index.php" method="get">
          <input type="text" name="q" placeholder="Input Name">
          <input type="text" name="p" placeholder="Password">
          <input type="checkbox" name="remember_me" value="true">
          <label for="hash">Remember Me</label>
          <button type="submit">GO</button>
        </form>
      </header>
      <? echo("$data");?>
	  </div>
    <footer>
      <p>
        Vulnerable Page <br>
        Copyright &copy; 2017
      </p>
    </footer>
  </body>
</html>
