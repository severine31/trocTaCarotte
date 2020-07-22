<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CGUController extends AbstractController
{
    /**
     * @Route("/cgu", name="cgu.show")
     */
    public function index()
    {
        return $this->render('cgu/cgu.html.twig', [
            'controller_name' => 'CGUController',
        ]);
    }
}
