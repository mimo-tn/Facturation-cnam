<?php
require './classcentre.php';
?>
<script type='text/JavaScript'>	
function getXhr(){           
  var xhr = null; 	    
  if(window.XMLHttpRequest) // Firefox et autres		
   xhr = new XMLHttpRequest(); 	
  else if(window.ActiveXObject){ // Internet Explorer 	
   try {	 
    xhr = new ActiveXObject("Msxml2.XMLHTTP");	} 
  catch (e) {	 xhr = new ActiveXObject("Microsoft.XMLHTTP");  }}	
else { 
  // XMLHttpRequest non supporté par le navigateur 
alert("Le navigateur ne supporte pas les objets XMLHTTPRequest..."); 
xhr = false; 	}      
return xhr
}	

function delais_affiche(){	
  var xhr = getXhr()
	var element = document.getElementById("choix_centre").value;	
     // On défini ce qu'on va faire quand on aura la réponse
xhr.onreadystatechange = function(){
    // si on a tout reçu et que le serveur est ok	
  if(xhr.readyState == 4 && xhr.status == 200){
document.getElementById('delais').innerHTML = xhr.responseText;  
   }} 

 
  xhr.open("GET","affiche_delais_fichier.php?choix="+element,true); 
  xhr.send(null);
} 

</script>
<ul class="style1">
			<li class="first">
				<div class="form-style-5">
				<form enctype="multipart/form-data" action="fileupload.php" method="post">
					<fieldset align="center">
					<legend>Envoi De La Facture</legend>
					<table>
					<tr>
					<td>choix du centre:</td>
					<td>
					<?php 
					$nom_cent=new centre();
					$nom_cent->afficher_centre_dispo();
					?>
					</td>
					</tr>
					<tr>
					<td>délais de facturation:</td>
					<td><div id="delais"></div></td>
					</tr>
					<tr>
					<td>chargement du fichier:</td>
					<td><input type="file" id="monfichier" name="monfichier" accept=".doc"></td>
					</tr>
					<tr> 
					<td>envoyer la facture</td>
					<td><input type="submit" value="envoyer"/></td>
					</tr>
					</table>
					</fieldset>
				</form>
				</div>
			</li>
</ul>