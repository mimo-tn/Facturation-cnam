<?php

class centre{
	public $id_centre;
	public $nom_centre;
	public $delais;
	public $nembre_facture;
	public $nembre_max_facture;
	public $nembre_dagent;
	
	
	public function afficher_centre_dispo(){
		
		$bdd = new PDO('mysql:host=localhost;dbname=cnam;charset=utf8', 'root', '');
		$req=$bdd->prepare('select * from centre');
		$req->execute();
		
		
		?>
		<select name="choix_centre" id="choix_centre" onchange='delais_affiche()'>
		<option value="">centre disponible</option>
		<?php
		while($donnees = $req->fetch()){
			$centre_dispo=false;
			$centre_nexiste_pas=false;
			$existe_avec_une_autre_date=false;
			$centre_non_dispo=false;
			$req1=$bdd->prepare('select count(id_facture), id_centre , date_jour from facture GROUP BY id_centre , date_jour');
			$req1->execute();
			while($donnees1=$req1->fetch()){
				if ($donnees['id_centre']==$donnees1['id_centre']){
					if($donnees1['date_jour']==date('Y-m-d')){
						if($donnees1['count(id_facture)']<$donnees['nembre_facture_max']){
						$centre_dispo=true;
						break;
						}else {$centre_non_dispo=true;break;}
					}else $existe_avec_une_autre_date=true;
				}else $centre_nexiste_pas=true;
			}
					
			if($centre_nexiste_pas==true &&  $centre_non_dispo==false || $existe_avec_une_autre_date==true && $centre_non_dispo==false || $centre_dispo==true){
			?>
			<option value="<?php echo $donnees['nom_centre'];?>"><?php echo $donnees['nom_centre'];?></option>
			<?php
			}
	
		}
		?>
		</select>
		<?php
	}
	
}
?>