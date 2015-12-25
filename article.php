<?php
	include('variables.php');
		$db = connectDB();
		if(!isset($_GET['ide'])){
			die("variable not set");
		}
		$id = $_GET['ide'];
		$post = $db->query("SELECT * FROM `articles` WHERE `id`=$id;")->fetchAll();
		$post = $post[0];
		if($lastPost = $db->query("SELECT * FROM `articles` ORDER BY `id` DESC LIMIT 1;")->fetchAll()){
			$lastPost = $lastPost[0];
		}else{
			die("a");
		}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="style/mainStyle.css" />
		<link rel="stylesheet" href="style/article.css" />
		<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
		<script src="javascript/mainJQuery.js"></script>
		<title>Otherwize - <?php echo( $post['name']); ?></title>
		<script>
			function compte(){
				var txt = document.getElementById('comm').value;
				document.getElementById('rsp').innerHTML=   'Nombre de caractères : '+(500 - txt.replace(/\[\/?\w+\]/g,'').length);
			}
		</script>
	</head>
	<body>
		<?php include('header.php'); ?>
		<div id="corps">
			<div id="article_title">
				<?php echo($post['name']); ?>
			</div>
			<div id="image" style="background-image: url('http://otherwize.fr/images/<?php echo($post['image']); ?>')"></div>
			<div id="container">
				<div id="article_text">
				<?php echo(nl2br($post['text']));?>
				</div>
				<div id="suggests">
					<?php if($id != $lastPost['id']){ ?>
					<a href="article.php?ide=<?php echo($lastPost['id']) ?>" id="lastPostSug">
						<label>Dernier article :</label>
						<div id="cont">
							<div id="img" style="background-image: url('http://otherwize.fr/images/<?php echo($lastPost['image']); ?>')"></div>
							<p><?php echo($lastPost['name']); ?></p>
						</div>
					</a>
					<?php } ?>
				</div>
			</div>
			<div id="comments">
				<div id="commentForm">
					<h2>Commentaires :</h2>
					<form id="commentForm1" method="post" action="">
							<textarea name="text" cols="65" rows="6" placeholder="Commentaire ..." id="comm" onKeyUp="compte()" maxlength="500" required></textarea><p id="rsp">Nombre de caractères : 500</p>
								<input type="submit" value="Commenter" name="formComment"/>
					</form>
				</div>
				<?php
					$queryCom = "SELECT * FROM `comments` WHERE `topic`=" . $id . " ORDER BY `topicCommentId` DESC";
					$isCommented = false;
					foreach ($db->query($queryCom) as $row) {
						$isCommented = true;
						echo('<div class="commentUnit" >');
						echo($row['username'] . ' :<br/>');
						echo(nl2br('<p id="text" >' . $row['text'] . '</p>'));
						echo($row['date']);
						echo("</div>");
					}
				?>
			</div>
		</div>
	</body>
</html>
