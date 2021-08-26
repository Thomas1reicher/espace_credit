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

      /*  $client = new Request();

        $clip_form_data="nom1: test\nprenom1: webservice\nmontant: 5000\n...etc";

        //$resultat=any50_callWS($clip_form_data);

       /* if($resultat["erreur"]!=""){
            //si ERREUR
        }else{
            //si OK
        }*/
       /* $client
        $response = $this->Request('POST',"http://grids.anysoft.lu/interclip/interclip.asmx",['test']);*/
       /* $aHTTP['http']['header'] =  "User-Agent: PHP-SOAP/5.5.11\r\n";

        $aHTTP['http']['header'].= "username: TEST \r\n"."password: TEST \r\n";
        $context = stream_context_create($aHTTP);
        $client=new SoapClient("http://grids.anysoft.lu/interclip/interclip.asmx",array('trace' => 1,"stream_context" => $context));
        dd($client);*/

     
        $entityManager = $this->getDoctrine()->getManager();
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
         
        ]);
    }

    /**
     * @Route("/credits", name="credits")
     */
    public function credits()
    {
        return $this->render('front/credits.html.twig', [
            'controller_name' => 'HomeController',
            'title' => 'credits',
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
    

        return $this->render('front/pret-perso.html.twig', [
            'controller_name' => 'HomeController',
            'title' => 'credits',
            'pret' => $obj
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
        return $this->render('front/pret-auto.html.twig', [
            'controller_name' => 'HomeController',
            'title' => 'credits',
            'pret' => $obj
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
        return $this->render('front/pret-moto.html.twig', [
            'controller_name' => 'HomeController',
            'title' => 'credits',
            'pret' => $obj
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
        return $this->render('front/pret-mobi.html.twig', [
            'controller_name' => 'HomeController',
            'title' => 'credits',
            'pret' => $obj
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
        return $this->render('front/pret-travaux.html.twig', [
            'controller_name' => 'HomeController',
            'title' => 'credits',
            'pret' => $obj
        ]);
    }

    /**
     * @Route("/regroupement", name="regroupement")
     */
    public function regroupement()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $repo=$entityManager->getRepository(Credit::class);
        $obj = $repo->findOneBy(['nom' => 'PRÊT PERSO']);
        return $this->render('front/regroupement.html.twig', [
            'controller_name' => 'HomeController',
            'title' => 'credits',
            'pret' => $obj
        ]);
    }

    /**
     * @Route("/carteCredit", name="carteCredit")
     */
    public function carteCredit()
    {
        return $this->render('front/carte-credit.html.twig', [
            'controller_name' => 'HomeController',
            'title' => 'credits',
        ]);
    }

    /**
     * @Route("/entreprise", name="entreprise")
     */
    public function entreprise()
    {
        return $this->render('front/entreprise.html.twig', [
            'controller_name' => 'HomeController',
            'title' => 'credits',
        ]);
    }


}
