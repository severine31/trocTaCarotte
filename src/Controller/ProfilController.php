<?php

namespace App\Controller;

use App\Repository\MonAnnonceRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProfilController extends AbstractController
{
    /**
     * @Route("/profil/{id<[0-9]+>}", name="profil", methods={"GET"})
     */
    public function index(MonAnnonceRepository $repo, $id) : Response
    {
        $annonces = $repo->findAvailableAnnonceByProfil($id);
        return $this->render('profil/profil.html.twig',compact('annonces'));
    }
}
