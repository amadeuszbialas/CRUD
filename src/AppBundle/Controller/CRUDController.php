<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 22.02.17
 * Time: 15:20
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;



class CRUDController extends Controller
{
    public function db_config(){


    }
    /**
     * @Route("/", name="menu_site")
     */
    public function indexAction()
    {
        return $this->render('index.html.twig');
    }


    /**
     * @Route("/create", name="create_site")
     */
    public function createAction()
    {

        return $this->render('create.html.twig');
    }


    /**
     * @Route("/read", name="read_site")
     */
    public function readAction()
    {

        return $this->render('read.html.twig');
    }


    /**
     * @Route("/update", name="update_site")
     */
    public function updateAction()
    {

        return $this->render('update.html.twig');
    }


    /**
     * @Route("/delete", name="delete_site")
     */
    public function deleteAction()
    {

        return $this->render('delete.html.twig');
    }
}