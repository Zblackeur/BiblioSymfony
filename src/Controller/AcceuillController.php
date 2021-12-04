<?php

namespace App\Controller;

use App\Entity\Livre;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AcceuillController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(): Response
    {
        $repo =$this->getDoctrine()->getRepository(Livre::class);
        $listes=$repo->findAll();
        return $this->render('acceuill/index.html.twig', [
           
            'controller_name' => 'AcceuillController',
            'listes'=> $listes
        ]);
    }

    /**
     * @Route("/article/{id}",name="livrespe")
     */
    public function  show ($id)
    {
        $repo =$this->getDoctrine()->getRepository(Livre::class);
        $article= $repo->find($id);
        return $this->render('acceuill/show.html.twig',
            [
                'controller_name' => 'AcceuillController',
                'article'=> $article
            ]);
    }

}
