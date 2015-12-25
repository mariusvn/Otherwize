<?php
  include('variables.php');
  $db = connectDB();
  $posts = $db->query("SELECT * FROM `articles` ORDER BY `id` DESC;")->fetchAll();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style/mainStyle.css" />
    <link rel="stylesheet" href="style/index.css" />
    <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="javascript/mainJQuery.js"></script>
    <script src="javascript/index.js"></script>
    <title>Otherwize - Acceuil</title>
    <style>
      #imageBack{
        background-image: <?php echo('url(\'http://otherwize.fr/images/'.$posts[0]['image'].'\')') ?>;
      }
    </style>
  </head>
  <body>
    <?php include('header.php'); ?>
    <a href="article.php?ide=<?php echo($posts[0]['id']) ?>">
      <div id="lastPost">
        <div id="imageBack"></div>
          <div id="ref">
            <h3><?php echo($posts[0]['name']); ?></h3>
            <p><?php echo(substr($posts[0]['text'], 0, 110) . " ..."); ?></p>
          </div>
        
      </div>
    </a>
    <!-- basePage -->
    <div id="center">
      <?php
        for($i = 1; $i < count($posts); $i++){
          ?>
            <div class="article baseHidden" style="background-image: url('http://otherwize.fr/images/<?php echo($posts[$i]['image']); ?>')">
              <div class="description">
                <h4><?php echo($posts[$i]['name']); ?></h4>
                <a href="article.php?ide=<?php echo($posts[$i]['id']) ?>" class="readMore">
                  <label>Lire la suite ></label>
                </a>
              </div>
            </div>
          <?php
        }
      ?>
    </div>
    <hr>
    <label>Site créé par Marius Van Nieuwenhuyse</label>
  </body>
</html>