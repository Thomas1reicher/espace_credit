<?php

/*require("wsbaseany_pat2.php");

// +
// cette chaine doit contenir la chaine de caracteres injectable envoy�e par email
// -
function UpdateApi($id){
	
$clip_form_data="nom1: test\nprenom1: webservice\nmontant: 5000\n...etc";


// +
// au lieu d'envoyer la chaine par email, appeler l'api ci dessous (l'authentification est prise en charge par l'api ET la DB du client)
//
$resultat=any50_callWS($clip_form_data);
// -

// +
// controle si erreur ici
//
if($resultat["erreur"]!=""){
	//si ERREUR
}else{
	//si OK
}
//
 }


