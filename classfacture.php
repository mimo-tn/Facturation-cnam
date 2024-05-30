
<?php
class facture{
	public $id_centre;
	public $fichier;
	public $id_prestateur_soins;
	public $date_jour;
	public $etat;
	public function insertion_facture($choix,$fichier){
		$bdd= new PDO('mysql:host=localhost;dbname=cnam;charset=utf8', 'root', '');
		$req1=$bdd->prepare('select id_centre from centre where nom_centre=?');
		$req1->execute(array($choix));
		$donne=$req1->fetch();
		$req2=$bdd->prepare('select count(id_facture) from facture');
		$req2->execute();
		$donne1=$req2->fetch();
		$id_fact=$donne1["count(id_facture)"]+1;
		$req=$bdd->prepare('insert into facture(id_facture,fichier,etat,id_centre,date_jour) values(?,?,?,?,?)');
		$req->execute(array($donne1["count(id_facture)"]+1,$file,"instance",$donne["id_centre"],date('Y-m-d')));
		$message="la facture a ete enregistrer avec succer";
		header("Location: index.php?Message=".$message);
	}
	public function affiche_facture($choix,$fichier){
		$bdd= new PDO('mysql:host=localhost;dbname=cnam;charset=utf8', 'root', '');
		$req1=$bdd->prepare('select id_centre from centre where nom_centre=?');
		$req1->execute(array($choix));
		$donne=$req1->fetch();
		$req2=$bdd->prepare('select count(id_facture) from facture');
		$req2->execute();
		$donne1=$req2->fetch();
		$id_fact=$donne1["count(id_facture)"]+1;
		$req=$bdd->prepare('insert into facture(id_facture,fichier,etat,id_centre,date_jour) values(?,?,?,?,?)');
		$req->execute(array($donne1["count(id_facture)"]+1,$file,"instance",$donne["id_centre"],date('Y-m-d')));
		$message="la facture a ete enregistrer avec succer";
		header("Location: index.php?Message=".$message);
	}
}
?>