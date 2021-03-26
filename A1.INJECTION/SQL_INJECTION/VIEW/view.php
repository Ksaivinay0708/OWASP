<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
	  <link rel="stylesheet" href="css/styles.css" type="text/css">
    <title>SQLi</title>
  </head>
  <body>
    <div id="wrapper">
      <header>
        <form name="search" action="./index.php" method="get">
        <input type="text" name="q" placeholder="Input Name">
        <input type="text" name="p" placeholder="Input ID">
        <button type="submit">GO</button>
        </form>
      </header>
      <? if (is_array($data)):?>
      <table border="8" cellpadding="10">
        <tr>
          <td>ID</td>
          <td>First_Name</td>
          <td>Last_Name</td>
          <td>Login</td>
          <td>Password</td>
        </tr>
            <?foreach ($data as $key => $va):?>
            <tr>
              <? foreach
              ($data[$key] as $val): ?>
            <td><?=$val; ?></td>
          <? endforeach;?>
          </tr>
        <? endforeach;?>
      </table>
      <?else:
        echo("$data");
      endif;?>
	  </div>
    <footer>
      <p>
        Vulnerable Page <br>
        Copyright &copy; 2017
      </p>
    </footer>
  </body>
  </html>
