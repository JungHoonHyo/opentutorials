<?php
$link=mysql_connect('localhost','root','darim4113!');
if(!$link){
	die('Could not connect: '.mysql_error());
}

mysql_select_db('opentutorials');
mysql_query("set session character_set_connection=utf8;");
mysql_query("set session character_set_results=utf8;");
mysql_query("set session character_set_client=utf8;");

if(!empty($_GET['id'])) {
$sql="SELECT * FROM topic WHERE id = ".$_GET['id'];
$result = mysql_query($sql);
$topic = mysql_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html>
		<head>
				<meta charset="utf-8" />
				<link rel="stylesheet" type="text/css" href="style.css">
		</head>
		
		<body id="body">
			<div>
				<header>
					<h1>JavaScript</h1>
				</header>
				<div id="toolbar">
				<input type="button" value="black" />
				<input type="button" value="white" />
				</div>
			<nav>
			<ul>
				<?php
				$sql="select id, title from topic";
				$result=mysql_query($sql);
				while($row=mysql_fetch_assoc($result)){
					echo "
					<li>
						<a href=\"?id={$row['id']}\">{$row['title']}</a></li>";
					}
				?>
			</ul>
			</nav>
			
			<article>
				<?php
				if(!empty($topic)){
				?>
				<h2><?=$topic['title']?></h2>
			
				<div class="description">
					<?=$topic['description']?>
				</div>
				<?php
				}
				?>
			</article>
		</div>
		</body>
</html>