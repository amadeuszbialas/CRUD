<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 22.02.17
 * Time: 15:20
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Crud;
use AppBundle\Form\CrudForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Configuration;
use Symfony\Component\Yaml\Yaml;






class CRUDController extends Controller
{

    /**
     * @Route("/start", name="menu_site")
     */
    public function indexAction()
    {
        return $this->render('index.html.twig');
    }


    /**
     * @Route("/read", name="read_site")
     */
    public function readTableAction()
    {
        $em =$this->getDoctrine()->getManager();
        $showCrud = $em->getRepository('AppBundle:Crud')->findAll();

        return $this->render('read.html.twig',[

            'showCrud' => $showCrud,

        ]);
    }

    /**
     * @Route("/create", name="create_site")
     */
    public function createAction(Request $request)
    {
        $form = $this->createForm(CrudForm::class);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $crud = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($crud);
            $em->flush();

            $this->addFlash('succes', 'Row created!');

            return $this->redirectToRoute('read_site');
        }


        return $this->render('create.html.twig',[
            'CrudForm' => $form->createView(),
        ]);

    }

    /**
     * @Route("/update", name="update_site")
     */
    public function updateAction()
    {

        $em =$this->getDoctrine()->getManager();
        $showCrud = $em->getRepository('AppBundle:Crud')->findAll();

        return $this->render('update.html.twig',[
            'showCrud' => $showCrud,
        ]);
    }

    /**
     * @Route("/update/{id}", name="update_New_site")
     */
    public function updateNewAction(Request $request, Crud $id)
    {


        $form = $this->createForm(CrudForm::class, $id);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $crud = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($crud);
            $em->flush();

            $this->addFlash('succes', 'Row updated!');

            return $this->redirectToRoute('update_site');
        }

        return $this->render('updateNew.html.twig',[
            'updateRow' => $form->createView()

        ]);
    }

    /**
     * @Route("/delete", name="deleteRows_site")
     */
    public function deleteRowsAction()
    {
        $em =$this->getDoctrine()->getManager();
        $showCrud = $em->getRepository('AppBundle:Crud')->findAll();

        return $this->render('deleteRows.html.twig',[

            'showCrud' => $showCrud,

        ]);
    }
    /**
     * @Route("/delete/{id}", name="delRows_site")
     */
    public function delRowsAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $row =$em->getReference('AppBundle:Crud', $id);

        $em->remove($row);
        $em->flush();

        $this->addFlash('succes', 'Row deleted!');

        return $this->redirectToRoute('deleteRows_site');
    }


    /**
     * @Route("/config_database", name="config_databases_site")
     */
    public function db_configAction()
    {
       $dir = $this->get('kernel')->getRootDir();
       $dir .= "/config/parameters.yml";
       $db_config = Yaml::parse(file_get_contents($dir));

       return $this->render('db_config.html.twig',[

            'db_config' => $db_config,

        ]);
    }
}