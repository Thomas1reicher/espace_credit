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
            'title' => 'home',
            'objets' => $objets,
            'credits' => $credits,
            'modal' => $modal,
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
            'title' => 'credits',
            'credits' => $objets,
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
            'title' => 'philo',
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
            'title' => 'pretPerso',
            'pret' => $obj,
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
        $tauxmin = $repo->findMinTaeg($obj->getId());
        return $this->render('front/pret-auto.html.twig', [
            'controller_name' => 'HomeController',
            'title' => 'pretAuto',
            'pret' => $obj,
            'tauxmin' => $tauxmin
        ]);
    }

    /**
     * @Route("/pretMoto", name="pretMoto")
     */
    public function pretMoto()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $repo=$entityManager->getRepository(Credit::class);
        $obj = $repo->findOneBy(['nom' => 'PRÊT MOTO']);
        $tauxmin = $repo->findMinTaeg($obj->getId());
        return $this->render('front/pret-moto.html.twig', [
            'controller_name' => 'HomeController',
            'title' => 'pretMoto',
            'pret' => $obj ,
            'tauxmin' => $tauxmin
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
        var_dump($tauxmin);
        die();
        return $this->render('front/pret-mobi.html.twig', [
            'controller_name' => 'HomeController',
            'title' => 'pretMobi',
            'pret' => $obj ,
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
            'title' => 'pretTravaux',
            'pret' => $obj ,
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
            'title' => 'regroupement',
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
            'title' => 'carteCredit',
        ]);
    }

    /**
     * @Route("/entreprise", name="entreprise")
     */
    public function entreprise()
    {
        return $this->render('front/entreprise.html.twig', [
            'controller_name' => 'HomeController',
            'title' => 'entreprise',
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

}
