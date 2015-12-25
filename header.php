<?php
  session_start();
  $db = connectDB();
  if(!isset($_SESSION["isConnected"])){
    $_SESSION["isConnected"] = false;
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style/header.css" />
    <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="javascript/header.js"></script>
  </head>
  <body>
    <header>
      <table>
        <tr>
          <td>
            <a href="index.php">
              <div id="title">
                <h1>Otherwize</h1>
                <h4>ça se discute</h4>
              </div>
            </a>
          </td>
          <td id="tableSearch">
            <div id="connect">
              <?php if(!$_SESSION["isConnected"]){ ?>
                <a class="normal_button" href="connection.php?from=<?php echo(basename($_SERVER['PHP_SELF']) . "?" . $_SERVER['QUERY_STRING']); ?>">Connection</a>
              <?php }else{ ?>
                <label><?php echo($_SESSION["user"]['name'] . " " . $_SESSION['user']['lastName']); ?></label> <a class="normal_button" id="disconnect_button" href="#">Déconnection</a>
              <?php } ?>
            </div>
            <div id="search">
              <form method="POST" action="">
                <input type="text" placeholder="Recherche"/>
                <a class="searchButton" href="#" onclick='this.parentNode.submit(); return false;'><img src="images/assets/search.png" height="18"></img></a>
              </form>
            </div>
          </td>
        </tr>
      </table>
    </header>
  </body>
</html>
