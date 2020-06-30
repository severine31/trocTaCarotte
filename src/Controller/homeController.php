<?php

namespace App\Controller;

use App\Entity\Troc;
use App\Entity\Ville;
use App\Entity\Carotte;
use App\Entity\MonAnnonce;
use App\Form\MonAnnonceType;
use App\Repository\UserRepository;
use App\Repository\VilleRepository;
use App\Repository\CarotteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
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
    public function create(Request $request,UserRepository $repoUser, CarotteRepository $repoCarotte, EntityManagerInterface $em){
        $annonce = new MonAnnonce;
        $user=$repoUser->find(1);
        $annonce->setUser($user);


    //    $form = $this->createForm(MonAnnonceType::class, $annonce);
    
        $form = $this->createFormBuilder($annonce)
            ->add('Carotte', EntityType :: class, [
                'mapped' => false,
                'placeholder' => "Sélectionner 'la carotte' à troquer",
                'label' => 'Je troque :',
                'class' => Carotte::class,
            ])
            ->add('QuantiteATroquer', NumberType::class, ['mapped' => false, 'html5' => true, 'scale' => 1, 'label' => 'Quantité :'])
            ->add('CarotteContre', EntityType::class, [
                'mapped' => false,
                'placeholder' => "Sélectionner 'la carotte' cherchée",
                'label' => 'Contre :',
                'class' => Carotte::class,
            ])
            ->add('QuantiteContre', NumberType::class, [
                'mapped' => false,
                'html5' => true, 
                'scale' => 1,
                'label' => 'Quantité :'
            ])
            ->add('ville', EntityType :: class, [
                'class' => Ville::class,
                'choice_label' => 'nom'
            ])
            ->add('Description', TextareaType::Class, ['attr' => ['rows' => 5]])
            ->getForm();

        $form->handleRequest($request);

    //    $carotteId =$repoCarotte->findBy(['Nom' => $carotte]);

        if ($form->isSubmitted() && $form->isValid()) {
                $troc = new Troc;
                $troc->setCarotteATroquer(intval($request->request->get('form')['Carotte']));
                $troc->setContreCarotte(intval($request->request->get('form')['CarotteContre']));
                $troc->setQuantity($request->request->get('form')['QuantiteATroquer']);
                $troc->setContreQuantite($request->request->get('form')['QuantiteContre']);
                $troc->setUnite("Kg");
                $troc->setContreUnite("Kg");

                $annonce->setUser($repoUser->find(1));
                $annonce->setTroc($troc);

                dump($troc);
                dump($annonce);

      //      $em->persist($annonce);
      //      $em->flush();
    //        $this->addFlash('success',"L'annonce a été créé !");
    //        return $this->redirectToRoute("home");
        }  

        return $this->render('create.html.twig', [
            'annonce' => $annonce,
            'form' => $form->createView()
        ]);

    }
}