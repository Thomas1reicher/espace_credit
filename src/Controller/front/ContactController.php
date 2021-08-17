<?php

namespace App\Controller\front;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController{
    /**
     * @Route("/contact", name="contact")
     * @param Request $request
     * @return Response
     */

    public function contact(Request $request): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            //$em->persist();
            $em->flush();
            return $this->redirectToRoute('accueil');
        }
        return $this->render('front/contact.html.twig', [
            'controller_name' => 'HomeController',
            "form" => $form->createView(),
            'title' => 'contact',
        ]);
    }
}