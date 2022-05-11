<?php include_once('inc/db.php'); ?>
<?php

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="/css/accounts.css">
    <title>OSRS Accounts</title>
  </head>
  <body>
    <div class="header">
      <h1>OSRS Bot Farm - Accounts</h1>
    </div>
    <div class="main">
      <div class="sidebar">
        <ul class="sidemenu">
          <a href="index.php"><li>Home</li></a>
          <a href="index.php"><li>Add Account</li></a>
        </ul>
      </div>
      <div class="content">
        <div id="add-account" class="">
          <form class="" action="add-account.php" method="post">
            <label for="name">Name:</label>
            <input type="text" name="name" value="" placeholder="Name...">
            <label for="login">Login:</label>
            <input type="text" name="login" value="" placeholder="Login...">
            <label for="pass">Password:</label>
            <input type="text" name="pass" value="" placeholder="Password...">
          </form>
        </div>
        <?php
        try {
          $stmt = $conn->prepare("SELECT * FROM accounts");
          $stmt->execute();

          // set the resulting array to associative
          $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
          echo '<table style="width:80%; margin-top: 2%; text-align:center;">';
          echo '<tr ><th style="width:20%;">Name</th><th style="width:60%">Login</th><th style="width:20%">Password</th></tr>';
          foreach($stmt->fetchAll() as $k=>$v) {
            echo '<tr style=""><td style="padding:15px">'.$v['name']. '</td><td>' . $v['login']. '</td><td>'. $v['pass'].'</td></tr>';
          }
          echo '</table>';
        } catch(PDOException $e) {
          echo "Error: " . $e->getMessage();
          }

         ?>
      </div>
    </div>

    <div class="footer">

    </div>
    <?php $conn = null; ?>
  </body>
</html>
