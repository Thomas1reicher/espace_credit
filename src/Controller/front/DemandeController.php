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
          
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            $this->UpdateApi($token);
            return $this->redirectToRoute('accueil');
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
        $test = $clip_form_data="recipient: recipient@site.be\n".
                        "subject: DEMANDE DE PRET\n".
                        "return_link_url: http://www.site.be\n".
                        "redirect: http://www.site.be/merci.htm\n".
                        "email: ".$objet->getMail()."\n".
                        "langue: FR\n".
                        "montant: ".$objet->getMontantCredit()."\n".
                        "duree: ".$objet->getDureeCredit()."\n".
                        "taeg: 12.5\n".
                        "mensualite: 265.94\n".       
                        "nom1: ".$objet->getNom()."\n".
                        "prenom1: ".$objet->getPrenom()."\n".
                        "montant: ".$objet->getMontantCredit()."\n".
                        "titre1: ".$objet->getTitre()."\n".
                        "rgpd_consentement_txt1: Exemple de texte de consentement RGPD||\n".
                        "montant_achat: ".$objet->getMontantAchat()."\n".
                        "montant_acompte: ".$objet->getAcompte()."\n".
                        "marque: ".$objet->getMarque()."\n".
                        "denomination: ".$objet->getModele()."\n".
                        "annee_construction: ".$this->formatDate($objet->getDatePremiereCirculation())."\n".
                        "nom_vendeur: ".$objet->getNomVendeur()."\n".
                        "type_support: ".$objet->getTypeVendeur()."\n".
                        "ref_apporteur: \n".				
                        "rgpd_consentement1: 1\n".
                        "ci1: ".$objet->getNumCarteIdentite()."\n".
                        "rn1: ".$objet->getRegistreNationalBelge()."\n".
                        "etat_civil1: ".$objet->getEtatCivil()."\n".
                        "adresse_depuis1: ". $this->formatDate($objet->getDateAdresse())."\n".
                        "telephone1: ".$objet->getTel()."\n".
                        "gsm1: ".$objet->getTelephoneMobile()."\n".
                        "loyer1: ".$objet->getLoyer()."\n".
                        "c_pensalim1: ".$objet->getPensionAlimentaire()."\n".
                        "rue1: ".$objet->getNomRue()."\n".
                        "numero1: ".$objet->getNumeroRue()."\n".
                        "cp1: ".$objet->getCodePostal()."\n".
                        "localite1: ".$objet->getVilleResidence()."\n".
                        "pays1: ".$objet->getPaysResidence()."\n".
                        "nationalite1: ".$objet->getNationalite()."\n".
                        "employeur1: ".$objet->getNomEmployeur()."\n".
                        "rue_employeur1: ".$objet->getNomRueEmployeur()."\n".
                        "numero_employeur1: ".$objet->getNumeroRueEmployeur()."\n".
                        "cp_employeur1: ".$objet->getCodePostalEmployeur()."\n".
                        "localite_employeur1: ".$objet->getVilleEmployeur()."\n".
                        "pays_employeur1: ".$objet->getPaysEmployeur()."\n".
                        "employ_date1: ".$this->formatDate($objet->getDateContrat())."\n".
                        "revenu1: ".$objet->getSalaire()."\n".
                        "r_chomage1: ".$objet->getChomage()."\n".
                        "r_pension1: ".$objet->getPension()."\n".
                        "r_handic1: ".$objet->getHandicap()."\n".
                        "r_onss1: ".$objet->getMutuelle()."\n".
                        "r_pensalim1: ".$objet->getPensionAlimentairePayer()."\n".
                        "r_locat1: ".$objet->getRevenuLocatif()."\n".
                        "r_cheques_repas1: ".$objet->getChequeRepas()."\n".
                        "r_voiture_societe1: ".$objet->getVoitureSociete()."\n".
                        "revenu_sup1: ".$objet->getAutresRevenus()."\n".
                        "nb_revenu_sup1: ".$objet->getDescriptionAutresRevenus()."\n".
                        "alloc_fam1: ".$objet->getAllocation()."\n".
                        "nb_enfants1: ".$objet->getNombreEnfants()."\n".
                        "no_compte1: ".$objet->getNumeroCompte()."\n".
                        "compte_depuis1: ".$this->formatDate(($objet->getDateCompte())) ."\n".
                        "date_naissance1: ".$objet->getDateNaissance()->format('d/m/Y')."\n".
                        "lieu_naissance1: ".$objet->getVilleNaissance()."\n".
                        "belge_depuis1: ".$this->formatDate($objet->getAnneeBelgique())."\n".
                        "profession1: ".$objet->getSecteur()."\n".
                        "secteur_activite1: ".$objet->getSecteur()."\n".
                        "type_contrat1: ".$objet->getTypeContrat()."\n".
                        "status: ".$etapeForm ;
                   
        if(!$first){
            $clip_form_data.=", ".$ref;
        }
  
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
