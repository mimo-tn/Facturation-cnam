
<?php
require './classfacture.php';
if(isset($_POST["choix_centre"])){
	$repertoireDestination=dirname(__FILE__)."/facture/";
	$nomDestination="facture".$_POST["choix_centre"].date("Ymd").".doc";
	
	if(is_uploaded_file($_FILES["monfichier"]["tmp_name"])){
		if(rename($_FILES["monfichier"]["tmp_name"],$repertoireDestination.$nomDestination)){
			$nouvelle_facture=new facture();
			$nouvelle_facture->insertion_facture($_POST["choix_centre"],$repertoireDestination.$nomDestination);	
		}else{
			$message="Le déplacement du fichier temporaire a échoué"." vérifiez l'existence du répertoire ";
			header("Location: index.php?Message=".$message);
		}          
	}else{
		$message="Le fichier n'a pas été uploadé (trop gros ?)";
		header("Location: index.php?Message=".$message);
	}
}
?>