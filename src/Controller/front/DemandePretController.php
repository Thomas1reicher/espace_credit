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
use Symfony\Bridge\Twig\Mime\TemplatedEmail;

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
            $random = random_bytes(10);
            $demande->setToken(bin2hex($random));
            $em->persist($demande);
            $em->flush();
            $email = (new TemplatedEmail())
            ->from('thomas1.reicher@gmail.com')
            ->to('thomas1.reicher@gmail.com')
            ->subject('Thanks for signing up!')
            ->htmlTemplate('emails/token.html.twig')
            ->context([
                'token' => $demande->getToken()]);
                $mailer->send($email);    
            return $this->redirectToRoute('accueil');
        }
        return $this->render('front/demande-pret.html.twig', [
            'controller_name' => 'HomeController',
            "form" => $form->createView(),
            'title' => 'demandePret',
        ]);
    }
}