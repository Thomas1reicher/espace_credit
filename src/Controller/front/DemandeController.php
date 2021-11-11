<?php

namespace App\Controller\front;

use App\Entity\Demandecredit;
use App\Form\DemandeType;
use App\Api\Api;
use App\Entity\Credit;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Taux;

class DemandeController extends AbstractController{

    /**
     * @Route("/demande/{token}", name="demande")
     * @param Request $request
     * @return Response
     */
    public function demande(string $token ,Request $request): Response
    {   
        $entityManager = $this->getDoctrine()->getManager();
        $repo=$entityManager->getRepository(Demandecredit::class);
        $repo1=$entityManager->getRepository(Credit::class);
        $credits = $repo1->findAll();
        $repoT=$entityManager->getRepository(Taux::class);
        $objets = $repoT->findAll();
        $objet = $repo->findOneBy(['token' => $token]);
        if($objet == null){
            return $this->redirectToRoute('accueil');
        }
        $tauxPerso = $repo1->findOneBy(['nom' => 'PRÊT PERSO']);
        $tauxVoiture = $repo1->findOneBy(['nom' => 'PRÊT AUTO']);
        $tauxMoto = $repo1->findOneBy(['nom' => 'PRÊT MOTO']);
        $tauxMobilite = $repo1->findOneBy(['nom' => 'PRÊT MOBILITÉ']);
        $tauxTravaux = $repo1->findOneBy(['nom' => 'PRÊT TRAVAUX']);
        $creditAll = $repo->findAll();
        $form = $this->createForm(DemandeType::class, $objet);
        $form->handleRequest($request);
        if($_POST){
        if($form->isSubmitted() && $form->isValid()){

            switch ($objet->getTypeCreditDemande()->getNom()) {
                case  'PRÊT AUTO':
                    if(isset($_POST['tauxVoiture'])):
                    $tauxActuel = $_POST['tauxVoiture'];
                    endif;
                    break;
                case 'PRÊT MOTO':
                    if(isset($_POST['tauxMoto'])):
                    $tauxActuel = $_POST['tauxMoto'];
                endif;
                    break;
                case 'PRÊT TRAVAUX':
                    if(isset($_POST['tauxTravaux'])):
                    $tauxActuel = $_POST['tauxTravaux'];
                    endif;
                break;
                
                default:
                $tauxActuel = $objet->getTypeCreditDemande()->getTaux()[0]->getTaux();
             
            }
            
            if(isset($tauxActuel)){
                $tauxrech= $repoT->find(intval($tauxActuel));
                $objet->setTauxCreditDemande($tauxrech);
            }
            if(isset($_POST['montant'])){
               $objet->setMontantCredit($_POST['montant']);
            }

            if(isset($_POST['month'])){
                $objet->setDureeCredit($_POST['month']);
            }
            if(isset($_POST['taeg'])){
                $objet->setTauxCredit(floatval($_POST['taeg']));
            }
           /* if(isset($_POST['tauxPerso'])){
                $objet->setTypeTauxPerso($_POST['tauxPerso']);
            }*/
            for($i=0;$i<count($objet->getPersonneCharge());$i++){
                $objet->getPersonneCharge()[$i]->getAge();
            }
            
           
            $entityManager->flush();
            if(isset($_POST['final'])){
                if($_POST['final']){
                    $this->UpdateApi($token);
                }
            }
    
            return $this->redirectToRoute('accueil');
        }else{
            foreach ($form->getErrors(true) as $error) {
                if ($error->getOrigin()) {
                  $errors[$error->getOrigin()->getName()][] = $error->getMessage();
                }
              }
              
         
        }
    }

        return $this->render('front/demande.html.twig', [
            'controller_name' => 'HomeController',
            'form' => $form->createView(),
            'title' => 'demande',
            'objet' => $objet,
            'objets' => $objets,
            'pretPerso' => $tauxPerso,
            'pretAuto' => $tauxVoiture,
            'pretMoto' => $tauxMoto,
            'pretMobilite' => $tauxMobilite,
            'pretTravaux' => $tauxTravaux,
            'repo' => $repoT,
            'title' => 'Espace Crédits | Formulaire de prêt',
            'description' => "Demandez votre prêt auto, prêt moto, prêt perso et bien d'autres en quelques clics grâce à ce formulaire",
            //'currentCred' => $objet->getTypeCreditDemande()->getNom()
        ]);
    }
    public function UpdateApi($token){
     
        $entityManager = $this->getDoctrine()->getManager();
        $repo=$entityManager->getRepository(Demandecredit::class);
        $objet = $repo->findOneBy(['token' => $token]);
        if($objet->getStrongId()!=null){
            $etape=$objet->getEtapeForm();
            $objet->setEtapeForm($etape+1);
            $ref = $objet->getStrongId();
            $first=false;
            $em = $this->getDoctrine()->getManager();
            $em->flush();
        }
        else{
         
            $etape = 1;
            $objet->setEtapeForm($etape+1);
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            $ref = "";
            $first = true;
        }
      
        $etapeForm = "MID".$etape;
        $test = $clip_form_data="recipient: thomas.reicher@a3com.lu \n".
                        "subject: DEMANDE DE PRET \n".
                        "email: ".$objet->getMail()." \n".
                        "email1:".$objet->getMail()." \n".
                        "langue: FR \n".
                        "montant: ".$objet->getMontantCredit()." \n".
                        "duree: ".$objet->getDureeCredit()." \n".
                        "taeg: ".$objet->getTauxCredit()." \n".
                        "mensualite: 265.94 \n".       
                        "nom1: ".$objet->getNom()." \n".
                        "prenom1: ".$objet->getPrenom()." \n".
                        "montant: ".$objet->getMontantCredit()." \n".
                        "titre1: ".$objet->getTitre()." \n".
                        "rgpd_consentement_txt1: Exemple de texte de consentement RGPD|| \n".
                        "rgpd_consentement1: 1\n".
                        "marque: ".$objet->getMarque()." \n".
                        "denomination: ".$objet->getModele()." \n".
                        "annee_construction: ".$this->formatDate($objet->getDatePremiereCirculation())." \n".
                        "nom_vendeur: ".$objet->getNomVendeur()." \n".
                        "type_support: ".$objet->getTypeVendeur()." \n".
                        "ref_apporteur:  \n".				
                        "rgpd_consentement1: 1 \n".
                        "ci1: ".$objet->getNumeroCarteIdentite()." \n".
                        "rn1: ".$objet->getRegistreNationalBelge()." \n".
                        "etat_civil1: ".$objet->getEtatCivil()." \n".
                        "adresse_depuis1: ". $this->formatDate($objet->getDateAdresse())." \n".
                        "telephone1: ".$objet->getTel()." \n".
                        "gsm1: ".$objet->getTelephoneMobile()." \n".
                        "loyer1: ".$objet->getLoyer()." \n".
                        "c_pensalim1: ".$objet->getPensionAlimentaire()." \n".
                        "rue1: ".$objet->getNomRue()." \n".
                        "numero1: ".$objet->getNumeroRue()." \n".
                        "cp1: ".$objet->getCodePostal()." \n".
                        "localite1: ".$objet->getVilleResidence()." \n".
                        "pays1: ".$objet->getPaysResidence()." \n".
                        "nationalite1: ".$objet->getNationalite()." \n".
                        "employeur1: ".$objet->getNomEmployeur()." \n".
                        "rue_employeur1: ".$objet->getNomRueEmployeur()." \n".
                        "numero_employeur1: ".$objet->getNumeroRueEmployeur()." \n".
                        "cp_employeur1: ".$objet->getCodePostalEmployeur()." \n".
                        "localite_employeur1: ".$objet->getVilleEmployeur()." \n".
                        "pays_employeur1: ".$objet->getPaysEmployeur()." \n".
                        "telephone_employeur1:".$objet->getTelEmployeur()." n".
                        "employ_date1: ".$this->formatDate($objet->getDateContrat())." \n".
                        "revenu1: ".$objet->getSalaire()." \n".
                        "r_chomage1: ".$objet->getChomage()." \n".
                        "r_pension1: ".$objet->getPension()." \n".
                        "r_handic1: ".$objet->getHandicap()." \n".
                        "r_onss1: ".$objet->getMutuelle()." \n".
                        "r_pensalim1: ".$objet->getPensionAlimentairePayer()." \n".
                        "r_locat1: ".$objet->getRevenuLocatif()." \n".
                        "r_cheques_repas1: ".$objet->getChequeRepas()." \n".
                        "r_voiture_societe1: ".$objet->getVoitureSociete()." \n".
                        "revenu_sup1: ".$objet->getAutresRevenus()." \n".
                        "nb_revenu_sup1: ".$objet->getDescriptionAutresRevenus()." \n".
                        "alloc_fam1: ".$objet->getAllocation()." \n".
                        "nb_enfants1: ".$objet->getNombreEnfants()." \n".
                        "no_compte1: ".$objet->getNumeroCompte()." \n".
                        "compte_depuis1: ".$this->formatDate(($objet->getDateCompte())) ." \n".
                        "date_naissance1: ".$this->formatDate(($objet->getDateNaissance()))." \n".
                        "lieu_naissance1: ".$objet->getVilleNaissance()." \n".
                        "belge_depuis1: ".$this->formatDate($objet->getAnneeBelgique())." \n".
                        "profession1: ".$objet->getSecteur()." \n".
                        "secteur_activite1: ".$objet->getSecteur()." \n".
                        "type_contrat1: ".$objet->getTypeContrat()." \n";
                        for($i=0;$i<count($objet->getPersonneCharge());$i++){
                            $clip_form_data .= "personne_charge_age_".($i+1).":".$objet->getPersonneCharge()[$i]->getAge()." \n";
                        }
                        for($i=0;$i<count($objet->getCreditCours());$i++){
                         
                            $clip_form_data .= "type_credit".($i+1).": ".$objet->getCreditCours()[$i]->getTypeCredit()." \n";
                            $clip_form_data .= "organisme".($i+1).": ".$objet->getCreditCours()[$i]->getOrgPret()." \n";
                            $clip_form_data .= "montant".($i+1).": ".$objet->getCreditCours()[$i]->getMontant()." \n";
                            $clip_form_data .= "duree".($i+1).": ".$objet->getCreditCours()[$i]->getDureeCredit()." \n";
                            $clip_form_data .= "echeance".($i+1).": ".$this->formatDate($objet->getCreditCours()[$i]->getDateDebut())." \n";
                            $clip_form_data .= "mensualite".($i+1).": ".$objet->getCreditCours()[$i]->getMontantEcheance()." \n";
                            $clip_form_data .= "solde".($i+1).": ".$objet->getCreditCours()[$i]->getSolde()." \n";
                            $clip_form_data .= "taeg".($i+1).": ".$objet->getCreditCours()[$i]->getTaux()." \n";
                        }
                        
                   
        if(!$first){
            $clip_form_data.=", ".$ref;
        }

   
        $api = new Api();
        $resultat=$api->any50_callWS($clip_form_data);
   
        if($resultat["erreur"]!=""){
    
            var_dump($resultat["erreur"]);
          
        }else{

           
                $objet->setToken("");
                $em = $this->getDoctrine()->getManager();
                $em->flush();

            
           
        }
  
         }
         private function getErrorMessages(\Symfony\Component\Form\Form $form) {
            $errors = array();
        
            foreach ($form->getErrors() as $key => $error) {
                if ($form->isRoot()) {
                    $errors['#'][] = $error->getMessage();
                } else {
                    $errors[] = $error->getMessage();
                }
            }
        
            foreach ($form->all() as $child) {
                if (!$child->isValid()) {
                    $errors[$child->getName()] = $this->getErrorMessages($child);
                }
            }
        
            return $errors;
        }
        public function formatDate(?DateTime $date ){
        if($date != null){
          return  (empty($date)) ? '' : $date->format('d/m/Y');
        }
        
        return "";
        }
}
