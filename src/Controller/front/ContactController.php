<?php

namespace App\Controller\front;

use App\Entity\Contact;
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

    public function contact(Request $request,\Swift_Mailer $mailer): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class,$contact);
        $form->handleRequest($request);
        if($form->isSubmitted() ){
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();
            $message = (new \Swift_Message('Nouveau contact'))
            // On attribue l'expéditeur
            ->setFrom($contact->getEmail())
        
            // On attribue le destinataire
            ->setTo('thomas1.reicher@gmail.com')
        
            // On crée le texte avec la vue
            ->setBody(
                $this->renderView(
                    'emails/contact.html.twig', compact('contact')
                ),
                'text/html'
            )
        ;
        var_dump($mailer->send($message));
        
        $this->addFlash('message', 'Votre message a été transmis, nous vous répondrons dans les meilleurs délais.');       
       
            return $this->redirectToRoute('accueil');
        }
     
        return $this->render('front/contact.html.twig', [
            'controller_name' => 'HomeController',
            "form" => $form->createView(),
            'title' => 'contact',
        ]);
    }
}