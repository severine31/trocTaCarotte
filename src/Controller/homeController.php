<?php

namespace App\Controller;

use App\Entity\MonAnnonce;
use App\Form\MonAnnonceType;
use App\Repository\UserRepository;
use App\Repository\StatutRepository;
use App\Repository\CarotteRepository;
use App\Repository\MonAnnonceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class homeController extends AbstractController{

    /**
     * @Route("/", name="home")
    **/
    public function index(MonAnnonceRepository $repo, CarotteRepository $repoCarotte){
        $annonces = $repo->findAvailableAnnonce();
        return $this->render('home.html.twig',compact('annonces'));
    }

    /**
     * @Route("/create", name="create.troc",  methods={"GET", "POST"})
    **/
    public function create(Request $request,UserRepository $repoUser,StatutRepository $repoStatut,EntityManagerInterface $em){
        $annonce = new MonAnnonce;

        $form = $this->createForm(MonAnnonceType::class, $annonce);

        $form->handleRequest($request);   


        if ($form->isSubmitted() && $form->isValid()) {
            $annonce->setUser($repoUser->find(1));
            $annonce->setDate(\DateTime::createFromFormat('Y-m-d', date("Y-m-d")));
            $annonce->setStatut($repoStatut->find(1));
            $em->persist($annonce);
            $em->flush();   
            $this->addFlash('success',"L'annonce a été créé !");
            return $this->redirectToRoute("home");
        }  

        return $this->render('createTest.html.twig', [
            'annonce' => $annonce,
            'form' => $form->createView()
        ]);  
    }
}