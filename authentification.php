<?php
session_start();
require './classauthentification.php';
if(isset($_POST["field1"]) && isset($_POST["field2"])){
	$authen=new authentification();
	$authen->test_authentification($_POST["field1"],$_POST["field2"]);
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />

<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />


</head>
<body>
<div id="header-wrapper">
<div id="header" class="container">
	<div id="logo">
		<h1><a href="#"><strong>C.N.A.M</strong></a></h1>
	</div>
	
</div></div>
<div id="page" class="container">
	<div id="content">
		<div class="title">
			<h2>Bien Venue</h2>
			 
		</div>
		<a href="#" class="image image-full"><img src="images/cnam.png" alt="" /></a>
	</div>
	<div id="sidebar">
		<ul class="style1">
			<li class="first">
				<h3>Veuillez Vous Authentifier</h3>
				<div id="content_1" class="content">        
				<div class="form-style-5">
					<form action="authentification.php" method="post">
					<fieldset>
					<legend><span class="number">1</span> Veuilliez vous Authentifiez</legend>
					<input type="text" name="field1" placeholder="Votre Login *">
					<input type="password" name="field2" placeholder="Votre Mot de Passe *">
					</fieldset>
					<input type="submit" value="Valider" id="submit" />
					</form>
				</div>
        </div>
				<p>Veuillez saisire votre login et mot de passe afin d'acceder a l'application.</p>
			</li>
			
		</ul>
		
	</div>
</div>
<div id="copyright">
</div>
</body>
</html>
