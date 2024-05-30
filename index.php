<script src="jquery-1.4.2.min.js" type="text/javascript"></script>
<script src="jquery-ui-1.8.4.custom.min.js" type="text/javascript"></script>
<script src="jquery.form.js" type="text/javascript"></script>
<?php
session_start();

if(isset($_SESSION['statut'])){
 $test=$_SESSION['statut'];
}
if (isset($_GET['Message'])) {
    print '<script type="text/javascript">alert("' . $_GET['Message'] . '");</script>';
}
 ?>
<script>
	    $(document).ready( function() {
			var variableRecuperee = <?php echo json_encode($test); ?>;
			if(variableRecuperee=="medecin"){
				$('#sidebar').load('acceuil.php');
				$('#acc').attr('class', 'current_page_item');
				$('#depo').removeClass('current_page_item'); 
				$('#suivie').removeClass('current_page_item'); 
				$('#prise').removeClass('current_page_item'); 
			 
				$("#priserendevouz").click(function() {
				$("#sidebar").load("cv.php")
				});
				$("#depotfacture").click(function() {
				$("#sidebar").load("depotfacture.php")
				$('#depo').attr('class', 'current_page_item')
				$('#acc').removeClass('current_page_item')
				$('#suivie').removeClass('current_page_item') 
				$('#prise').removeClass('current_page_item')
				});
				$("#suiviefacture").click(function() {
				$("#sidebar").load("consultationfacture.php")
				$('#suivie').attr('class', 'current_page_item')
				$('#acc').removeClass('current_page_item')
				$('#depo').removeClass('current_page_item') 
				$('#prise').removeClass('current_page_item')
				});
				$("#acceuil").click(function() {
				$("#sidebar").load("acceuil.php")
				$('#acc').attr('class', 'current_page_item')
				$('#depo').removeClass('current_page_item')
				$('#suivie').removeClass('current_page_item') 
				$('#prise').removeClass('current_page_item')
				});
			}
	    });
</script>
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
	<div id="menu">
		<?php
		if($_SESSION['statut']=="medecin"){
		?>
		<ul>
			<li id="acc"><a href="#" accesskey="1" title="" id="acceuil">Acceuil</a></li>
			<li id="depo"><a href="#" accesskey="3" title=""id="depotfacture" >Envoi Factures</a></li>
			<li id="suivie"><a href="#" accesskey="2" title="" id="suiviefacture">Consultation Factures</a></li>
			<li id="prise"><a href="#" accesskey="4" title="" id="priserendevouz">Prise de Rendez-Vous</a></li>
			
		</ul>
		<?php
		}
		?>
	</div>
</div></div>
<div id="page" class="container">
	<div id="content">
		<div class="title">
			<h2>Bien Venue</h2>
			<span class="byline"><?php if($_SESSION['statut']=='medecin'){echo 'Dr '.$_SESSION['nom'].' '.$_SESSION['prenom'];}else echo 'Mr '.$_SESSION['nom'].' '.$_SESSION['prenom']; ?></span><br><br>
			<span class="byline"><a href="deconnection.php">deconnection</a></span>
		</div>
		<a href="#" class="image image-full"><img src="images/cnam.png" alt="" /></a>
	</div>
	<div id="sidebar">
		
		
	</div>
</div>
<div id="copyright">
</div>
</body>
</html>
