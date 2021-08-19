<?php

namespace App\Controller\front;

use App\Entity\Demandecredit;
use App\Form\DemandePretType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class DemandePretController extends AbstractController{

    /**
     * @Route("/demandePret", name="demandePret")
     * @param Request $request
     * @return Response
     */
    public function demandePret(Request $request,MailerInterface $mailer): Response
    {
        $demande = new Demandecredit();
        $form = $this->createForm(DemandePretType::class, $demande);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $random = random_bytes(20);
            $demande->setToken($random);
            $em->persist($demande);
            $em->flush();
            /*$email = (new Email())
            ->from($demande->getMail())
            ->to('thomas1.reicher@gmail.com')
            ->subject('Time for Symfony Mailer!')
            ->text('Sending emails is fun again!')
            ->html('<p>See Twig integration for better HTML integration!</p>');

        $mailer->send($email);
        die();*/
        
            return $this->redirectToRoute('accueil');
        }
        return $this->render('front/demande-pret.html.twig', [
            'controller_name' => 'HomeController',
            "form" => $form->createView(),
            'title' => 'demandePret',
        ]);
    }
}