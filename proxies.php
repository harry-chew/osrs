<?php include_once('inc/db.php'); ?>
<?php

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="/css/accounts.css">
    <title>OSRS Proxies</title>
  </head>
  <body>
    <div class="header">
      <h1>OSRS Bot Farm - Proxies</h1>
    </div>
    <div class="main">
      <div class="sidebar">
        <ul class="sidemenu">
          <a href="index.php"><li>Home</li></a>
          <a href="index.php"><li>Add Account</li></a>
        </ul>
      </div>
      <div class="content">

        <?php
        try {
          $stmt = $conn->prepare("SELECT * FROM proxies");
          $stmt->execute();

          // set the resulting array to associative
          $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
          echo '<table style="width:80%; margin-top: 2%; text-align:center;">';
          echo '<tr ><th style="">IP</th><th style="">Port</th><th style="">Username</th><th>Password</th></tr>';
          foreach($stmt->fetchAll() as $k=>$v) {
            echo '<tr style=""><td style="padding:15px">'.$v['ip']. '</td><td>' . $v['port']. '</td><td>'. $v['username'].'</td><td>'.$v['password'].'</tr>';
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
