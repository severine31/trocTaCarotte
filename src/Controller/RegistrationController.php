<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/registration", name="registration")
    **/
    public function index(){
        if (!$this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY')){
            return $this->redirectToRoute('app_login');
        //    return $this->redirectToRoute('create.registration');
            
        }
    }
    /**
     * @Route("/registration/create", name="create.registration")
    **/
    public function create(Request $request, EntityManagerInterface $em, UserPasswordEncoderInterface $passwordEncoder){
        $registration = new User;

        $form = $this->createForm(RegistrationFormType::class, $registration);

        $form->handleRequest($request);   


        if ($form->isSubmitted() && $form->isValid()) {
            if ($form->getData()->getSexe() === "F"){
                $registration->setImage("femme_flat.png");
            }else{
                $registration->setImage("homme_flat.png");
            }
            $registration->setRoles(["ROLE_USER"]);
            $password = $passwordEncoder->encodePassword($registration, $registration->getPassword());
            $registration->setPassword($password);
            $em->persist($registration);
            $em->flush();   
            $this->addFlash('success',"Votre compte a été créé, vous pouvez à présent vous connecter !");
            return $this->redirectToRoute("home");
        }  

        return $this->render('/registration/index.html.twig', [
            'registration' => $registration,
            'form' => $form->createView()
        ]);  
    }

}
