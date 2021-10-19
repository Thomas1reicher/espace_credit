<?php


namespace App\Controller\admin;


use App\Entity\User;
use App\Entity\Credit;
use App\Entity\Page;
use App\Entity\Info;
use App\Form\AdminForm\ObjectAddType;
use App\Form\AdminForm\CreditAddType;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\BddCms;
use App\Entity\Contact;
use App\Entity\Demandecredit;
use App\Entity\Taux;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class AdminController extends AbstractController
{

    private $itemsMenu;


    public function __construct(EntityManagerInterface $entityManager)
    {
        $repository = $entityManager->getRepository(BddCms::class);
        $categorieCms = $repository->findBy(
            array(),
            array('div_num' => 'ASC')
        );
        $this->itemsMenu = array();
        for ( $i =0; $i<count($categorieCms);$i++){
            $this->itemsMenu[$i] = array("nom" => $categorieCms[$i]->getName(), "lien" => "admin/".$categorieCms[$i]->getName(), "picto" =>$categorieCms[$i]->getIcon(),"color" =>$categorieCms[$i]->getColor() , "div_num"=>$categorieCms[$i]->getDivNum());
        }

    }
    /**
     *
     *
     * @Route("/admin/dashboard", name="accueilAdmin")
     */
    public function home()
    {

        return $this->render('admin/dashboard.html.twig', [
                'itemsMenu' => $this->itemsMenu,

            ]
        );
    }
    /**
     *
     *
     * @Route("/admin/{name}", name="catAdmin")
     */
    public function CatCms(string $name){
  
        $repository = $this->nameClass($name,"repository");
        $Objects = $repository->findAll();
        $obj = $this->nameClass($name,"class");
        $tbl_var = $obj->vars();
        return $this->render('admin/admin_tbl_view.html.twig', [
                'itemsMenu' => $this->itemsMenu,
                'objects' => $Objects,
                'tbl_var' => $tbl_var,
                'name' => $name
            ]
        );


    }
        /**
     *
     *
     * @Route("/admin/credit/{id}", name="creditsee")
     */
    public function Creditsee(int $id){
  
   
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $this->nameClass("demandecredit","repository");
        $object =$repository->find($id);
        $testObj = (array)$object;
            return $this->render('admin/admin_credit.html.twig', [
                'itemsMenu' => $this->itemsMenu,
                'object' => $testObj,
      

            ]
        );


    }
    /**
     *
     *
     * @Route("/admin/create/{name}", name="catAdminAdd")
     */
    public function CatCmsAdd(string $name,Request $request) : Response
    {
     
        $entityManager = $this->getDoctrine()->getManager();
        $object = $this->nameClass($name,"class");
        $form = $this->createForm(ObjectAddType::class, (object)  $object ,  array(
            'attr' => array('class' => $name ,
                'object' => $object,
            )));
        if($_POST){
        
            /*for($i=0;$i<count($object->typeVars());$i++){
            if($tbl[$object->typeVars()[$i]] != null){

            }*/
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
            $obj = $form->getData(); 
            $entityManager->persist($obj);
            $entityManager->flush();
            return $this->redirectToRoute("catAdmin", array(
                'name' => $name
            ));
        }
        return $this->render('admin/admin_add_object.html.twig', [
            'itemsMenu' => $this->itemsMenu,
            'name' => $name,
            'form' => $form->createView()

        ]
    );
        }
        else{
            return $this->render('admin/admin_add_object.html.twig', [
                    'itemsMenu' => $this->itemsMenu,
                    'name' => $name,
                    'form' => $form->createView(),
                    'edit' => false
                ]
            );
        }
    }
    /**
     *
     *
     * @Route("/admin/update/{name}/{id}", name="catAdminUpdate")
     */
    public function CatCmsUpdate (string $name,int $id,Request $request):Response
    {   
   
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $this->nameClass($name,"repository");
        $object =$repository->find($id);
        $form = $this->createForm(ObjectAddType::class, $object,  array(
            'attr' => array('class' => $name ,
                'object' => $object,
            )));
            if($_POST){
     
                $form->handleRequest($request);
                if ($form->isSubmitted() && $form->isValid()) {
              
            
                $entityManager->flush();
                return $this->redirectToRoute("catAdmin", array(
                    'name' => $name
                ));
            }
        }
            return $this->render('admin/admin_add_object.html.twig', [
                'itemsMenu' => $this->itemsMenu,
                'name' => $name,
                'form' => $form->createView(),
                'edit' => true,
                'id'   => $id

            ]
        );

    }
      /**
     *
     *
     * @Route("/admin/credit/update/{id}", name="catAdminCredit")
     */
    public function CatAdminCredit (int $id,Request $request):Response
    {   
   
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $this->nameClass("credit","repository");
        $object =$repository->find($id);
        $form = $this->createForm(CreditAddType::class, $object);
            if($_POST){
                $data=$form->getData();
                /*var_dump($data->getTaux()[0]);
                die();*/
                $form->handleRequest($request);
                if ($form->isSubmitted() && $form->isValid()) {
                   
                $entityManager->flush();
                return $this->redirectToRoute("catAdmin", array(
                    'name' => 'credit'
                ));
            }
            else{
                $string = var_export($this->getErrorMessages($form), true);
                var_dump($string);
                die();
            }
        }
            return $this->render('admin/admin_update_credit.html.twig', [
                'itemsMenu' => $this->itemsMenu,
                'form' => $form->createView(),
                'edit' => true,
                'id'   => $id

            ]
        );

    }

    private function getErrorMessages(\Symfony\Component\Form\Form $form) {
        $errors = array();
    
        foreach ($form->getErrors() as $key => $error) {
            if ($form->isRoot()) {
                $errors['#'][] = $error->getMessage();
            } else {
                $errors[] = $error->getMessage();
            }
        }
    
        foreach ($form->all() as $child) {
            if (!$child->isSubmitted()) {
                $errors[$child->getName()] = $this->getErrorMessages($child);
            }
        }
    
        return $errors;
    }
    /**
     *
     *
     * @Route("/admin/delete/{name}/{id}", name="catAdminDelete")
     */
    public function CatCmsDelete(string $name,int $id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $this->nameClass($name,"repository");
        $object =$repository->find($id);
     
        $entityManager->remove($object);
        $entityManager->flush();
        return $this->redirectToRoute("catAdmin", array(
            'name' => $name
        ));

    }
    public function nameClass(string $name ,string $type,bool $form = false,EntityManagerInterface $entityManager = null){

     
        if($form){
            $orm = $entityManager;
        }else{
            $orm=$this->getDoctrine();
        }
        if($name=="user"){
            $repository = $orm->getRepository(User::class);
            $class = new User();
            $class_v=User::class;
        }else if($name=="credit"){
            $repository = $orm->getRepository(Credit::class);
            $class = new Credit();
            $class_v=Credit::class;
        }
        else if($name=="taux"){
            $repository = $orm->getRepository(Taux::class);
            $class = new Taux();
            $class_v=Taux::class;
        }
        else if($name=="page"){
            $repository = $orm->getRepository(Page::class);
            $class = new Page();
            $class_v=Page::class;
        }
        else if($name=="info"){
            $repository = $orm->getRepository(Info::class);
            $class = new Info();
            $class_v=Info::class;
        }
        else if($name=="contact"){
            $repository = $orm->getRepository(Contact::class);
            $class = new Contact();
            $class_v=Contact::class;
        }
        else if($name=="demandecredit"){
            $repository = $orm->getRepository(Demandecredit::class);
            $class = new Demandecredit();
            $class_v=Demandecredit::class;
        }

    
        if($type == "repository"){
            
            if(isset($repository)){
            return $repository;}
        }else if ($type="class"){
            if(isset($class)){
            return $class;
            }
        }
        
        else{
            return $class_v;
        }

    }




}