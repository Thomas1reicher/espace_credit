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
     * @Route("/demande", name="demande")
     * @param Request $request
     * @return Response
     */
    public function demande(Request $request): Response
    {
        $data = new Demandecredit();
        $form = $this->createForm(DemandeType::class, $data);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($data);
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