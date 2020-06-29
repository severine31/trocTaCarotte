<?php

namespace App\Controller;

use App\Entity\Ville;
use App\Entity\MonAnnonce;
use App\Form\MonAnnonceType;
use App\Repository\VilleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class homeController extends AbstractController{
    /**
     * @Route("/", name="home")
    **/
    public function index(){
        return $this->render('home.html.twig');
    }

    /**
     * @Route("/create", name="create.troc",  methods={"GET", "POST"})
    **/
    public function create(Request $request, VilleRepository $repo, EntityManagerInterface $em){
        $annonce = new MonAnnonce;

        $form = $this->createForm(MonAnnonceType::class, $annonce);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
      //      $em->persist($annonce);
      //      $em->flush();
            $this->addFlash('success',"L'annonce a été créé !");
            return $this->redirectToRoute("home");
        }  

        return $this->render('create.html.twig', [
            'annonce' => $annonce,
            'form' => $form->createView()
        ]);

    }
}