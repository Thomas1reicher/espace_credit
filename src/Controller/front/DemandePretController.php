<?php

namespace App\Controller\front;

use App\Entity\Demandecredit;
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
        $demande = new Demandecredit();
        $form = $this->createForm(DemandePretType::class, $demande);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($demande);
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