<?php
// src/Controller/HelloController.php
namespace App\Controller\front;

//use Symfony\Component\HttpFoundation\Request;
use App\passerelle\ClipConnection;
use SoapClient;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Component\Request;
use App\Entity\Credit;
use App\Entity\Taux;
use App\Entity\SousTauxPeriode;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Doctrine\ORM\EntityManagerInterface;
//require("wsbaseany_pat2.php");

class HomeController extends AbstractController
{





    public function __construct(EntityManagerInterface $entityManager)
    {
      
        

    }
    /**
     * Page d'accueil
     *
     * @Route("", name="accueil")
     * @return Response
     */
    public function home()
    {

        if(isset($_SESSION['email'])){
            if($_SESSION['email']){
            $modal = true;
            $_SESSION['email']=false;
        }else{
            $modal = false;
            
        }
    }else{
        $modal = false;
    }
        $entityManager = $this->getDoctrine()->getManager();
        $repo1=$entityManager->getRepository(Credit::class);
        $credits = $repo1->findAll();
        $repo=$entityManager->getRepository(Taux::class);
        $objets = $repo->findAll();
        $tbl = [];
        $fin = 0;
        /*for($i=0;$i<count($objets);$i++){
            $objet =$objets[$i]->getTaux()[0];
            if($objet != null){
            $tbl[$i] = $objet->getTaux();
            $fin = $fin +1;
            }
        }*/
        
        return $this->render('front/home.html.twig', [
            'objets' => $objets,
            'credits' => $credits,
            'modal' => $modal,
            'title' => 'Espace Crédits | Les meilleurs taux en Belgique et au Luxembourg',
            'description' => 'Que ce soit un prêt auto, travaux, perso, Espace Crédits est votre partenaire de confiance en Belgique et Luxembourg avec des taux défiants toute concurrence',
            'repo' =>$repo
         
        ]);
    }

    /**
     * @Route("/credits", name="credits")
     */
    public function credits()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $repo=$entityManager->getRepository(Credit::class);
        $repot=$entityManager->getRepository(Taux::class);
        $objets = $repo->findAll();
        return $this->render('front/credits.html.twig', [
            'controller_name' => 'HomeController',
            'credits' => $objets,
            'title' => 'Espace Crédits | Découvrez tous nos divers types de crédits',
            'description' => "Chez Espace Crédits, nous vous proposons plusieurs types de crédits aux meilleurs taux spécialement adaptés à vos besoins et envies. Venez-vite les découvrir ! ",
            'repo' => $repot
        ]);
    }

    /**
     * @Route("/philosophie", name="philosophie")
     */
    public function philosophie()
    {
        return $this->render('front/philosophie.html.twig', [
            'controller_name' => 'HomeController',
            'title' => 'Espace Crédits | Une affaire de famille et des valeurs',
            'description' => 'Composé de trois personnes, Espace Crédits est une entreprise à taille humaine et familiale focalisée sur vos besoins et vos projets. ',
        ]);
    }
    /**
     * @Route("/mentionslegales", name="mentionslegales")
     */
    public function mentionslegales()
    {
        return $this->render('front/mention.html.twig', [
            'controller_name' => 'HomeController',
            'title' => 'Espace Crédits | Mentions Légales',
            'description' => 'Découvrez-ici nos mentions légales',
        ]);
    }
    /**
     * @Route("/pretPerso", name="pretPerso")
     */
    public function pretPerso()
    {   
        $entityManager = $this->getDoctrine()->getManager();
        $repo=$entityManager->getRepository(Credit::class);
        $obj = $repo->findOneBy(['nom' => 'PRÊT PERSO']);
        $tauxmin = $repo->findMinTaeg($obj->getId());
       
        

        return $this->render('front/pret-perso.html.twig', [
            'controller_name' => 'HomeController',
            'pret' => $obj,
            'title' => 'Espace Crédits | Découvrez nos taux pour votre prochain prêt perso',
            'description' => "Un besoin d'argent immédiat ? Qu'il s'agisse de l'achat de meubles, d'un déménagement ou d'un voyage, Espace Crédits vous accompagne dans vos projets",
            'tauxmin' => $tauxmin
        ]);
    }

    /**
     * @Route("/pretAuto", name="pretAuto")
     */
    public function pretAuto()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $repo=$entityManager->getRepository(Credit::class);
        $obj = $repo->findOneBy(['nom' => 'PRÊT AUTO']);
        $repot=$entityManager->getRepository(Taux::class);
        return $this->render('front/pret-auto.html.twig', [
            'controller_name' => 'HomeController',
            'pret' => $obj,
            'title' => 'Espace Crédits | Découvrez nos taux pour votre prochain prêt auto',
            'description' => "Un achat de véhicule neuf ou d'occasion de prévu ? Espace Crédits vous trouvera le meilleur taux du marché afin de financer votre voiture de rêve.",
            'repo' => $repot
        ]);
    }

    /**
     * @Route("/pretMoto", name="pretMoto")
     */
    public function pretMoto()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $repo=$entityManager->getRepository(Credit::class);
        $repot=$entityManager->getRepository(Taux::class);
        $obj = $repo->findOneBy(['nom' => 'PRÊT MOTO']);
        
        return $this->render('front/pret-moto.html.twig', [
            'controller_name' => 'HomeController',
            'pret' => $obj ,
            'title' => 'Espace Crédits | Découvrez nos taux pour votre prochain prêt moto',
            'description' => 'Un achat de moto de prévu ? Espace Crédits vous trouvera le meilleur taux du marché afin de financer votre deux-roues.',
            'repo' => $repot
        ]);
    }

    /**
     * @Route("/pretMobi", name="pretMobi")
     */
    public function pretMobi()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $repo=$entityManager->getRepository(Credit::class);
        $obj = $repo->findOneBy(['nom' => 'PRÊT MOBILITÉ']);
        $tauxmin = $repo->findMinTaeg($obj->getId());

        return $this->render('front/pret-mobi.html.twig', [
            'controller_name' => 'HomeController',
            'pret' => $obj ,
            'title' => 'Espace Crédits | Découvrez nos taux pour votre prochain prêt mobilité',
            'description' => 'Un achat de vélo, trottinette ou overboard de prévu ? Espace Crédits vous trouvera le meilleur taux du marché afin de financer votre engin de mobilité douce.',
            'tauxmin' => $tauxmin
        ]);
    }

    /**
     * @Route("/pretTravaux", name="pretTravaux")
     */
    public function pretTravaux()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $repo=$entityManager->getRepository(Credit::class);
        $obj = $repo->findOneBy(['nom' => 'PRÊT TRAVAUX']);
        $tauxmin = $repo->findMinTaeg($obj->getId());
        return $this->render('front/pret-travaux.html.twig', [
            'controller_name' => 'HomeController',
            'pret' => $obj ,
            'title' => 'Espace Crédits | Découvrez nos taux pour votre prochain prêt travaux',
            'description' => 'Envie de réaménagement et de renouveau dans votre chez-vous ? Espace Crédits vous trouvera le meilleur taux du marché afin de financer vos travaux.',
            'tauxmin' => $tauxmin
        ]);
    }

    /**
     * @Route("/regroupement", name="regroupement")
     */
    public function regroupement()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $repo=$entityManager->getRepository(Credit::class);
        $obj = $repo->findOneBy(['nom' => 'REGROUPEMENT']);
        $tauxmin = $repo->findMinTaeg($obj->getId());
        return $this->render('front/regroupement.html.twig', [
            'controller_name' => 'HomeController',
            'title' => 'Espace Crédits | Découvrez nos taux pour votre regroupement de prêts',
            'description' => 'Afin de mieux gérer votre budget, le regroupement de crédits vous permettra de rassembler tous vos prêts en un seul. Espace Crédits vous accompagne.',
            'pret' => $obj->getTaux()[0],
            'tauxmin' => $tauxmin
        ]);
    }

    /**
     * @Route("/carteCredit", name="carteCredit")
     */
    public function carteCredit()
    {
        return $this->render('front/carte-credit.html.twig', [
            'controller_name' => 'HomeController',
            'title' => 'Espace Crédits | Découvrez notre carte de crédit Cofidis ',
            'description' => "Les courtiers d'Espace Crédits vous aideront à trouver la carte la plus adaptée à vos besoins en fonction de vos habitudes et situation financière.",
        ]);
    }

    /**
     * @Route("/entreprise", name="entreprise")
     */
    public function entreprise()
    {
        return $this->render('front/entreprise.html.twig', [
            'controller_name' => 'HomeController',
            'title' => 'Espace Crédits | Découvrez nos crédits pour les entreprises',
            'description' => "Espace Crédits propose des solutions de financement pour les entreprises, artisans, et indépendants. Leasing, Renting ou Crédit d'Affaires.",
        ]);
    }
      /**
     * @Route("/recherche", name="rechercheTaux")
     * @param Request $request
     * @return Response
     */
    public function rechercheTaux(Request $request)    
    {
        $entityManager = $this->getDoctrine()->getManager();
        $repo1=$entityManager->getRepository(Credit::class);
        $test = $repo1->findTaeg($_POST["pret"],$_POST["period"],$_POST["montant"]);
        if(count($test)>0){
            return new Response($test[0]["taeg"], 200);
        }
        else{
            return new Response("error", 200);
        }
    }
    /**
     * @Route("/rechercheduree", name="rechercheDuree")
     * @param Request $request
     * @return Response
     */
    public function rechercheDuree(Request $request)    
    {
        $entityManager = $this->getDoctrine()->getManager();
        $repo1=$entityManager->getRepository(Credit::class);
        $test = $repo1->findMois($_POST["pret"],$_POST["montant"]);
        if(count($test)>0){
           
            return new Response($test[0]["periode_deb"], 200);
        }
        else{
            return new Response("error", 200);
        }
    }
    /**
     * @Route("/recherchedureemax", name="rechercheDureeMax")
     * @param Request $request
     * @return Response
     */
    public function rechercheDureeMax(Request $request)    
    {
        $entityManager = $this->getDoctrine()->getManager();
        $repo1=$entityManager->getRepository(Credit::class);
        $test = $repo1->findMoisMax($_POST["pret"],$_POST["montant"]);
        if(count($test)>0){
           
            return new Response($test[0]["periode_deb"], 200);
        }
        else{
            return new Response("error", 200);
        }
    }

}
