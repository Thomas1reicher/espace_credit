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
use Symfony\Component\Mime\Header\Headers;
use Symfony\Component\Mime\Message;
use Symfony\Component\Mime\Part\TextPart;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use App\Entity\Credit;
use App\Entity\Taux;

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
        $entityManager = $this->getDoctrine()->getManager();
        $repo=$entityManager->getRepository(Taux::class);
        $objets = $repo->findAll();
   
        if($form->isSubmitted() && $form->isValid()){
            /*
            $duree = $form["duree"]->getData();
            $montant = $form["montant"]->getData();
            if(($duree>=30 && $montant<=2500) ||
                ($duree>=36 && $montant<=3700) ||
                ($duree>=42 && $montant<=5600) ||
                ($duree>=48 && $montant<=7500) ||
                ($duree>=60 && $montant<=10000)){
                    //erreur
            }
            $name = $form["prenom"]->getData();
            var_dump($name);
            die();
            */
            $em = $this->getDoctrine()->getManager();
            $random = random_bytes(10);
            $demande->setToken(bin2hex($random));
            
            $em->persist($demande);
            $em->flush();
            $email = (new TemplatedEmail())
            ->from('credit@espace-credits.be')
            ->to($demande->getMail())
            ->subject('Demande de pr??t')
            ->htmlTemplate('emails/token.html.twig')
            ->context([
                'token' => $demande->getToken()]);
            $mailer->send($email);
            $body = new TextPart('test');
            $headers = (new Headers())
                ->addMailboxListHeader('From' , ['credit@espace-credits.be'])
                ->addMailboxListHeader('To' , [$demande->getMail()])
                ->addTextHeader('Subject','Some Subject')
                ->addTextHeader('X-Auto-Response-Suppress', 'OOF,AutoReply');
            $emailtest = new Message($headers , $body);
            $mailer->send($emailtest);
            
            $_SESSION['email'] = true;
            return $this->redirectToRoute('accueil');
        }
        return $this->render('front/demande-pret.html.twig', [
            'controller_name' => 'HomeController',
            "form" => $form->createView(),
            'title' => 'demandePret',
            'title' => 'Espace Cr??dits | Demandez votre pr??t en quelques minutes',
            'description' => "Demandez votre pr??t auto, pr??t moto, pr??t perso et bien d'autres en quelques clics gr??ce ?? ce formulaire",
            'objets' => $objets,
        ]);
    }
}