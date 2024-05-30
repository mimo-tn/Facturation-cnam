<?php
class authentification{
	public $login;
	public $mot_passe;
	function test_authentification($log,$pass){
		$bdd=new PDO('mysql:host=localhost;dbname=cnam;charset=utf8', 'root', '');
		$req=$bdd->prepare('select * from authentification where login=?');
		$req->execute(array($log));
		while($donne=$req->fetch()){
			if($donne['mot_de_passe']==$pass){
				$_SESSION['login']=$log;
				$_SESSION['mot_de_passe']=$donne['mot_de_passe'];
				$_SESSION['nom']=$donne['nom'];
				$_SESSION['prenom']=$donne['prenom'];
				$_SESSION['statut']=$donne['statut'];
				$_SESSION['connection']="oui";
				header ('location: index.php');
				
				
			}
		}
		
	}
}


?>