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
            $this->UpdateApi($objet);
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
	
        $clip_form_data="nom1: test\nprenom1: webservice\nmontant: 5000\n...etc";
        $api = new Api();
        $resultat=$api->any50_callWS($clip_form_data);
   
        if($resultat["erreur"]!=""){
            var_dump("error");
        }else{
            var_dump("cool");
        }
  
         }
}
