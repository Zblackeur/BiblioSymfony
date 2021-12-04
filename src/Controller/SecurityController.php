<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authenticator\Passport\UserPassportInterface;


class SecurityController extends AbstractController
{
    /**
     * @Route("/Inscription", name="security_registration")
     */

    public function registration(Request $request ,entityManagerInterface $manager,UserPasswordEncoderInterface $encoder)
    {
        $user = new User();
        $form = $this->createForm(RegistrationType::class,$user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid() )
        {
            $hash=$encoder->encodePassword($user,$user->getPassword());
            $user->setPassword($hash);
            $manager->persist($user);
            $manager->flush();
            return $this->redirectToRoute('security_login');
        }
        return $this->render('security/registration.html.twig', ['form' => $form->createView()]);

    }

    /**
     * @Route("/connexion",name="security_login")
     */
    public function login():Response
    {
        return $this->render('security/login.html.twig',['controller_name' => 'SecurityController',]);

    }
    /**
     * @Route("/deconnexion",name="security_logout")
     */
    public function logout()
    {

    }


}
