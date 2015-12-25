<?php
  include('variables.php');
  $db = connectDB();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style/mainStyle.css" />
    <link rel="stylesheet" href="style/connection.css" />
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="javascript/mainJQuery.js"></script>
    <script src="javascript/connection.js"></script>
    <title>Otherwize - Connection</title>
  </head>
  <body>
    <?php include('header.php'); ?>
    <div id="body">
      <form action="traitement/connect.php" method="POST" id="connectForm">
        <label>E-mail : </label><input type="mail" placeholder="E-mail" id="mail_input"/><br/>
        <label>Mot de passe : </label><input type="password" placeholder="Mot de passe" id="pass_input"/><br/>
        <a class="normal_button" id="submit_btn" href="#">Se connecter</a>
      </form>
    </div>
  </body>
</html>
