<?php

namespace App\Controller\front;

use App\Entity\Demandecredit;
use App\Form\DemandeType;
use App\Api\Api;
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
        $objet = $repo->findOneBy(['token' => $token]);
        $form = $this->createForm(DemandeType::class, $objet);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            //$this->UpdateApi($objet);
            return $this->redirectToRoute('accueil');
        } 

        return $this->render('front/demande.html.twig', [
            'controller_name' => 'HomeController',
            'form' => $form->createView(),
            'title' => 'demande',
            'objet' => $objet
        ]);
    }
    public function UpdateApi($objet){
        
        if($objet->getStrongId()!=null){
            $etape=$objet->getEtapeForm();
            $objet->setEtapeForm($etape+1);
            $ref = $objet->getStrongId();
            $first=false;
        }
        else{
            $etape = 1;
            $objet->setEtapeForm($etape+1);
            $ref = "";
            $first = true;
        }
        $etapeForm = "MID".$etape;
        $clip_form_data="recipient: recipient@site.be\n".
                        "subject: DEMANDE DE PRET\n".
                        "return_link_url: http://www.site.be\n".
                        "redirect: http://www.site.be/merci.htm\n".
                        "email: ".$objet->getEmail()."\n".
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
                        "montant_achat: ".$objet->getMontantAchatVoiture()."\n".
                        "montant_acompte: ".$objet->getAcompteVoiture()."\n".
                        "marque: ".$objet->getMarqueVoiture()."\n".
                        "denomination: ".$objet->getModeleVoiture()."\n".
                        "annee_construction: ".$objet->getDatePremiereCirculationVoiture()."\n".
                        "nom_vendeur: ".$objet->getNomVendeurVoiture()."\n".
                        "type_support: ".$objet->getTypeVendeurVoiture()."\n".
                        "ref_apporteur: \n".				
                        "rgpd_consentement1: 1\n".
                        "ci1: ".$objet->getNumCarteIdentite()."\n".
                        "rn1: ".$objet->getRegistreNationalBelge()."\n".
                        "etat_civil1: ".$objet->getEtatCivil()."\n".
                        "adresse_depuis1: ".$objet->getDateAdresse()."\n".
                        "telephone1: ".$objet->getTel()."".
                        "gsm1: ".$objet->getTelephoneMobile()."".
                        "loyer1: ".$objet->getLoyer()."\n".
                        "c_pensalim1: ".$objet->getPensionAlimentaire()."\n".
                        "rue1: ".$objet->getNomRue()."\n".
                        "numero1: ".$objet->getNumeroRue()."\n".
                        "cp1: ".$objet->getCodePostal()."\n".
                        "localite1: ".$objet->getVilleResidence()."\n".
                        "pays1: ".$objet->getPaysResidence()."\n".
                        "nationalite1: ".$objet->getNationality()."\n".
                        "employeur1: ".$objet->getEmployeur()."\n".
                        "rue_employeur1: ".""."\n".
                        "numero_employeur1: 1\n".
                        "cp_employeur1: ".$objet->getCodePostalEmployeur()."\n".
                        "localite_employeur1: ".$objet->getVilleEmployeur()."\n".
                        "pays_employeur1: ".$objet->getPaysEmployeur()."\n".
                        "employ_date1: ".$objet->getDateContrat()."\n".
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
                        "compte_depuis1: ".$objet->getDateCompte()."\n".
                        "date_naissance1: ".$objet->getDateNaissance()."\n".
                        "lieu_naissance1: ".$objet->getVilleNaissance()."\n".
                        "belge_depuis1: ".$objet->getBelgeDepuis()."\n".
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
            var_dump("error");
        }else{
            var_dump($resultat);
            if($first){
                $objet->setStrongId($resultat["ref_credit"]);
                $em = $this->getDoctrine()->getManager();
                $em->flush();
            }
            if(($etape+1)==10){
                $objet->setToken(null);
                $em = $this->getDoctrine()->getManager();
                $em->flush();
                var_dump($clip_form_data);
            }
           
        }
  
         }
}
