<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class homeController extends AbstractController{
    /**
     * @Route("/")
    **/
    public function index(){
        return $this->render('home.html.twig');
    }
}