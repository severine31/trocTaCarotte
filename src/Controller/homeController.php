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
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\DateTime;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class homeController extends AbstractController{

    /**
     * @Route("/", name="home")
    **/
    public function index(MonAnnonceRepository $repo, CarotteRepository $repoCarotte){
        $annonces = $repo->findAvailableAnnonce();
        return $this->render('home.html.twig',compact('annonces'));
    }

    /**
     * @IsGranted("ROLE_USER", message="Vous devez vous connecter avant :)")
     * @Route("/create", name="create.troc",  methods={"GET", "POST"})
    **/
    public function create(Request $request,UserRepository $repoUser,StatutRepository $repoStatut,EntityManagerInterface $em){
        $annonce = new MonAnnonce;
        $userId = $this->getUser()->getId();
        $user = $repoUser->find($userId);
        $annonce->setUser($user);
        $form = $this->createForm(MonAnnonceType::class, $annonce);

        $form->handleRequest($request);   


        if ($form->isSubmitted() && $form->isValid()) {
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

    /**
     * @Route ("/{id<[0-9]+>}", name="troc.show", methods={"GET"})
     */
    public function show(MonAnnonceRepository $repo, $id) : Response
    {   
        $annonce =$repo->find($id);
        return $this->render('show.html.twig',compact('annonce'));
    }
}