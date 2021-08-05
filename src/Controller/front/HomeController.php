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
        return $this->render('front/home.html.twig');
    }


}
