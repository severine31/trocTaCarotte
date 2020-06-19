<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class homeController extends AbstractController{
    /**
     * @Route("/")
    **/
    public function index(){
        return $this->render('home.html.twig');
    }
}