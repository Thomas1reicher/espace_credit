<?php

namespace App\Controller\front;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class ContactController extends AbstractController{
    /**
     * @Route("/contact", name="contact")
     * @param Request $request
     * @return Response
     */

    public function contact(Request $request,MailerInterface $mailer): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class,$contact);
        $form->handleRequest($request);
        if($form->isSubmitted() ){
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();
            $message = "Sujet : " . $contact->getObjet() . "<br />";
            $message .= "Nom : " . $contact->getNom() . "<br />";
            $message .= "Prénom : " . $contact->getPrenom() . "<br />";
            $message .= "Tél : " . $contact->getTelephone() . "<br />";
            $message .= "Email : " . $contact->getEmail() . "<br />";
            $message .= "Message : " . $contact->getMessage() . "<br />";
            $email = (new Email())
            ->from('thomas1.reicher@gmail.com')
            ->to('thomas1.reicher@gmail.com')
            ->subject('Time for Symfony Mailer!')
            ->text('Sending emails is fun again!')
            ->html($message);
            $mailer->send($email);

        
        $this->addFlash('message', 'Votre message a été transmis, nous vous répondrons dans les meilleurs délais.');       
       
            return $this->redirectToRoute('accueil');
        }
     
        return $this->render('front/contact.html.twig', [
            'controller_name' => 'HomeController',
            "form" => $form->createView(),
            'title' => 'Espace Crédits | Contactez-nous afin de connaître nos taux',
            'description' => 'Prenons contact avec votre projet, via mail, téléphone ou même à notre agence située à Athus, à deux pas de la frontière avec le Luxembourg',
        ]);
    }
}