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
                    $tauxActuel = $_POST['tauxVoiture'];
                    break;
                case 'PRÊT MOTO':
                    $tauxActuel = $_POST['tauxMoto'];
                    break;
                case 'PRÊT TRAVAUX':
                    $tauxActuel = $_POST['tauxTravaux'];
                break;
                
                default:
                $tauxActuel = $objet->getTypeCreditDemande()->getTaux()[0]->getTaux();
             
            }
            for($i=0;$i<count($objet->getPersonneCharge());$i++){
                $objet->getPersonneCharge()[$i]->getAge();
            }
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            $this->UpdateApi($token);
            return $this->redirectToRoute('accueil');
        }else{
            foreach ($form->getErrors(true) as $error) {
                if ($error->getOrigin()) {
                  $errors[$error->getOrigin()->getName()][] = $error->getMessage();
                }
              }
              var_dump($errors);
         
        }
    }

        return $this->render('front/demande.html.twig', [
            'controller_name' => 'HomeController',
            'form' => $form->createView(),
            'title' => 'demande',
            'objet' => $objet,
            'pretPerso' => $tauxPerso,
            'pretAuto' => $tauxVoiture,
            'pretMoto' => $tauxMoto,
            'pretMobilite' => $tauxMobilite,
            'pretTravaux' => $tauxTravaux,
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
        $test = $clip_form_data="recipient: recipient@site.be<br/>".
                        "subject: DEMANDE DE PRET<br/>".
                        "return_link_url: http://www.site.be<br/>".
                        "redirect: http://www.site.be/merci.htm<br/>".
                        "email: ".$objet->getMail()."<br/>".
                        "email1:".$objet->getMail()."<br/>".
                        "langue: FR<br/>".
                        "montant: ".$objet->getMontantCredit()."<br/>".
                        "duree: ".$objet->getDureeCredit()."<br/>".
                        "taeg: 12.5<br/>".
                        "mensualite: 265.94<br/>".       
                        "nom1: ".$objet->getNom()."<br/>".
                        "prenom1: ".$objet->getPrenom()."<br/>".
                        "montant: ".$objet->getMontantCredit()."<br/>".
                        "titre1: ".$objet->getTitre()."<br/>".
                        "rgpd_consentement_txt1: Exemple de texte de consentement RGPD||<br/>".
                        "marque: ".$objet->getMarque()."<br/>".
                        "denomination: ".$objet->getModele()."<br/>".
                        "annee_construction: ".$this->formatDate($objet->getDatePremiereCirculation())."<br/>".
                        "nom_vendeur: ".$objet->getNomVendeur()."<br/>".
                        "type_support: ".$objet->getTypeVendeur()."<br/>".
                        "ref_apporteur: <br/>".				
                        "rgpd_consentement1: 1<br/>".
                        "ci1: ".$objet->getNumeroCarteIdentite()."<br/>".
                        "rn1: ".$objet->getRegistreNationalBelge()."<br/>".
                        "etat_civil1: ".$objet->getEtatCivil()."<br/>".
                        "adresse_depuis1: ". $this->formatDate($objet->getDateAdresse())."<br/>".
                        "telephone1: ".$objet->getTel()."<br/>".
                        "gsm1: ".$objet->getTelephoneMobile()."<br/>".
                        "loyer1: ".$objet->getLoyer()."<br/>".
                        "c_pensalim1: ".$objet->getPensionAlimentaire()."<br/>".
                        "rue1: ".$objet->getNomRue()."<br/>".
                        "numero1: ".$objet->getNumeroRue()."<br/>".
                        "cp1: ".$objet->getCodePostal()."<br/>".
                        "localite1: ".$objet->getVilleResidence()."<br/>".
                        "pays1: ".$objet->getPaysResidence()."<br/>".
                        "nationalite1: ".$objet->getNationalite()."<br/>".
                        "employeur1: ".$objet->getNomEmployeur()."<br/>".
                        "rue_employeur1: ".$objet->getNomRueEmployeur()."<br/>".
                        "numero_employeur1: ".$objet->getNumeroRueEmployeur()."<br/>".
                        "cp_employeur1: ".$objet->getCodePostalEmployeur()."<br/>".
                        "localite_employeur1: ".$objet->getVilleEmployeur()."<br/>".
                        "pays_employeur1: ".$objet->getPaysEmployeur()."<br/>".
                        "employ_date1: ".$this->formatDate($objet->getDateContrat())."<br/>".
                        "revenu1: ".$objet->getSalaire()."<br/>".
                        "r_chomage1: ".$objet->getChomage()."<br/>".
                        "r_pension1: ".$objet->getPension()."<br/>".
                        "r_handic1: ".$objet->getHandicap()."<br/>".
                        "r_onss1: ".$objet->getMutuelle()."<br/>".
                        "r_pensalim1: ".$objet->getPensionAlimentairePayer()."<br/>".
                        "r_locat1: ".$objet->getRevenuLocatif()."<br/>".
                        "r_cheques_repas1: ".$objet->getChequeRepas()."<br/>".
                        "r_voiture_societe1: ".$objet->getVoitureSociete()."<br/>".
                        "revenu_sup1: ".$objet->getAutresRevenus()."<br/>".
                        "nb_revenu_sup1: ".$objet->getDescriptionAutresRevenus()."<br/>".
                        "alloc_fam1: ".$objet->getAllocation()."<br/>".
                        "nb_enfants1: ".$objet->getNombreEnfants()."<br/>".
                        "no_compte1: ".$objet->getNumeroCompte()."<br/>".
                        "compte_depuis1: ".$this->formatDate(($objet->getDateCompte())) ."<br/>".
                        "date_naissance1: ".$this->formatDate(($objet->getDateNaissance()))."<br/>".
                        "lieu_naissance1: ".$objet->getVilleNaissance()."<br/>".
                        "belge_depuis1: ".$this->formatDate($objet->getAnneeBelgique())."<br/>".
                        "profession1: ".$objet->getSecteur()."<br/>".
                        "secteur_activite1: ".$objet->getSecteur()."<br/>".
                        "type_contrat1: ".$objet->getTypeContrat()."<br/>";
                        for($i=0;$i<count($objet->getPersonneCharge());$i++){
                            $clip_form_data .= "personne_charge_age_".($i+1).":".$objet->getPersonneCharge()[$i]->getAge()."<br/>";
                        }
                        for($i=0;$i<count($objet->getCreditCours());$i++){
                         
                            $clip_form_data .= "type_credit".($i+1).": ".$objet->getCreditCours()[$i]->getTypeCredit()."<br/>";
                            $clip_form_data .= "organisme".($i+1).": ".$objet->getCreditCours()[$i]->getOrgPret()."<br/>";
                            $clip_form_data .= "montant".($i+1).": ".$objet->getCreditCours()[$i]->getMontant()."<br/>";
                            $clip_form_data .= "duree".($i+1).": ".$objet->getCreditCours()[$i]->getDureeCredit()."<br/>";
                            $clip_form_data .= "echeance".($i+1).": ".$this->formatDate($objet->getCreditCours()[$i]->getDateDebut())."<br/>";
                            $clip_form_data .= "mensualite".($i+1).": ".$objet->getCreditCours()[$i]->getMontantEcheance()."<br/>";
                            $clip_form_data .= "solde".($i+1).": ".$objet->getCreditCours()[$i]->getSolde()."<br/>";
                        }
                        $clip_form_data .= "status: ".$etapeForm ;
                   
        if(!$first){
            $clip_form_data.=", ".$ref;
        }
        var_dump($clip_form_data);
        die();
        $api = new Api();
        $resultat=$api->any50_callWS($clip_form_data);
   
        if($resultat["erreur"]!=""){
    
            var_dump($resultat["erreur"]);
            die();
        }else{

            if($first){
                $objet->setStrongId($resultat["ref_credit"]);
                $em = $this->getDoctrine()->getManager();
                $em->flush();
            }
            if(($etape+1)>=10){
                $objet->setToken("");
                $em = $this->getDoctrine()->getManager();
                $em->flush();

            }
           
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
