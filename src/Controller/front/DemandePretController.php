<?php

namespace App\Controller\front;

use App\Form\DemandePretType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DemandePretController extends AbstractController{

    /**
     * @Route("/demandePret", name="demandePret")
     * @param Request $request
     * @return Response
     */
    public function demandePret(Request $request): Response
    {
        $form = $this->createForm(DemandePretType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            //$em->persist();
            $em->flush();
            return $this->redirectToRoute('accueil');
        }
        return $this->render('front/demande-pret.html.twig', [
            'controller_name' => 'HomeController',
            "form" => $form->createView(),
            'title' => 'demandePret',
        ]);
    }
}