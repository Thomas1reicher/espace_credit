<?php


namespace App\passerelle;


use mysqli;

class ClipConnection
{

    /**
     * ClipConnection constructor.
     */
    public function __construct()
    {
    }
    public function connect()
    {
        $clip_form_data="nom1: test\nprenom1: webservice\nmontant: 5000\n...etc";
        $conn = new mysqli("http://grids.anysoft.lu/interclip/interclip.asmx", "TEST", "TEST");
        if($conn->connect_error){
            die('Erreur : ' .$conn->connect_error);
        }
        return 'Connexion réussie';
       /* $resultat=any50_callWS($clip_form_data);
        if($resultat["erreur"]!=""){
            //si ERREUR
        }else{
            //si OK
        }*/
    }
}