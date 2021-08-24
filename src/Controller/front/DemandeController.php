<?php

namespace App\Controller\front;

use App\Entity\Demandecredit;
use App\Form\DemandeType;
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
        $objet = $repo->findBy(['token' => $token]);
        $form = $this->createForm(DemandeType::class, $objet);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('accueil');
        }
        return $this->render('front/demande.html.twig', [
            'controller_name' => 'HomeController',
            'form' => $form->createView(),
            'title' => 'demande'
        ]);
    }
}