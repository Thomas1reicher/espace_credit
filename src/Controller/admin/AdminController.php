<?php


namespace App\Controller\admin;


use App\Entity\User;
use App\Entity\Credit;
use App\Form\AdminForm\ObjectAddType;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\BddCms;
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
            var_dump($object->typeVars());
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
                    'form' => $form->createView()

                ]
            );
        }
    }
    /**
     *
     *
     * @Route("/admin/update/{name}/{id}", name="catAdminUpdate")
     */
    public function CatCmsUpdate (string $name,int $id)
    {   
   
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $this->nameClass($name,"repository");
        $object =$repository->find($id);
        $form = $this->createForm(ObjectAddType::class, $object,  array(
            'attr' => array('class' => $name ,
                'object' => $object,
            )));
      
            return $this->render('admin/admin_add_object.html.twig', [
                'itemsMenu' => $this->itemsMenu,
                'name' => $name,
                'form' => $form->createView(),

            ]
        );

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
        var_dump($id);
        $entityManager->remove($object);
        $entityManager->flush();
        return $this->redirectToRoute("catAdmin", array(
            'name' => $name
        ));

    }
    private function nameClass(string $name ,string $type){
        if($name=="user"){
            $repository = $this->getDoctrine()->getRepository(User::class);
            $class = new User();
        }else if($name=="credit"){
            $repository = $this->getDoctrine()->getRepository(Credit::class);
            $class = new Credit();
        }
        else if($name=="taux"){
            $repository = $this->getDoctrine()->getRepository(Taux::class);
            $class = new Taux();
        }


        if($type == "repository"){
            return $repository;
        }else{
            return $class;
        }

    }




}