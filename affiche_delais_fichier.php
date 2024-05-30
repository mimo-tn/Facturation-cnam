<?php
if(isset($_GET["choix"])) 
{
		$bdd = new PDO('mysql:host=localhost;dbname=cnam;charset=utf8', 'root', '');
		$req=$bdd->prepare('select * from centre where nom_centre=?');
		$req->execute(array($_GET["choix"]));
		$donne=$req->fetch();
?>		<input type="text" size="30" value="<?php echo $donne['delais'];echo "  jours";?>" disabled="disabled">		
<?php
}  

?>
