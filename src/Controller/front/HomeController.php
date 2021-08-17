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
use Symfony\Contracts\HttpClient\HttpClientInterface;
//require("wsbaseany_pat2.php");

class HomeController extends AbstractController
{
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
        return $this->render('front/home.html.twig', [
            'title' => 'home',
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
        return $this->render('front/pret-perso.html.twig', [
            'controller_name' => 'HomeController',
            'title' => 'credits',
        ]);
    }

    /**
     * @Route("/pretAuto", name="pretAuto")
     */
    public function pretAuto()
    {
        return $this->render('front/pret-auto.html.twig', [
            'controller_name' => 'HomeController',
            'title' => 'credits',
        ]);
    }

    /**
     * @Route("/pretMoto", name="pretMoto")
     */
    public function pretMoto()
    {
        return $this->render('front/pret-moto.html.twig', [
            'controller_name' => 'HomeController',
            'title' => 'credits',
        ]);
    }

    /**
     * @Route("/pretMobi", name="pretMobi")
     */
    public function pretMobi()
    {
        return $this->render('front/pret-mobi.html.twig', [
            'controller_name' => 'HomeController',
            'title' => 'credits',
        ]);
    }

    /**
     * @Route("/pretTravaux", name="pretTravaux")
     */
    public function pretTravaux()
    {
        return $this->render('front/pret-travaux.html.twig', [
            'controller_name' => 'HomeController',
            'title' => 'credits',
        ]);
    }

    /**
     * @Route("/regroupement", name="regroupement")
     */
    public function regroupement()
    {
        return $this->render('front/regroupement.html.twig', [
            'controller_name' => 'HomeController',
            'title' => 'credits',
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
