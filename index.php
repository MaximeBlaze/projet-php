<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Layout</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="./lib/css/style1.css" type="text/css"/>
	</head>
	<body>
		<section id="wrapper">
			<header id="header">
				<?php 
					if(file_exists('./lib/php/header.php'))
					{
						include('./lib/php/header.php');
					}
					else
					{
						print "Echec d'inclusion.";
					}
				?>
			</header>
			<section id="col_gauche">
				<nav id="menu">
					<?php 
					if(file_exists('./lib/php/menu.php'))
					{
						include('./lib/php/menu.php');
					}
					else
					{
						print "Echec d'inclusion.";
					}
				?>
				</nav>
				<br><br>
				<aside id="image">
					<img src="./images/tancarville.jpg" alt="pont"/>
				</aside>
			</section>
			<section id="contenu">
				<section id="main">
					<?php
					if(!isset($_SESSION['page']))
					{
						$_SESSION['page']="pages/accueil.php";
					}
					if(isset($_GET['page']))
					{
						$_SESSION['page']="pages/".$_GET['page'];
					}
					if(file_exists($_SESSION['page']))
					{
						include($_SESSION['page']);
					}
					else
					{
						print "Page inexistante";
					}
					?>
				</section>
			</section>
			<p id="address">
					webmaster@ponts-suspendus.net C Ponts Suspendus 2015
			</p>
		</section>
	</body>
</html>