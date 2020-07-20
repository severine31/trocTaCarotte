<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProfilController extends AbstractController
{
    /**
     * @Route("/profil/{id<[0-9]+>}", name="profil", methods={"GET"})
     */
    public function index(UserRepository $repo, $id) : Response
    {
        return $this->render('profil/index.html.twig', [
            'controller_name' => 'ProfilController',
        ]);
    }
}
