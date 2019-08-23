<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(TokenStorageInterface $tokenStorage)
    {
        
        $user = $tokenStorage->getToken()->getUser();
        
        if ($user == 'anon.') {
            return $this->render('home/index.html.twig', [
                'controller_name' => 'HomeController',
            ]);        
        } else {
            return $this->redirectToRoute('user');
        }

        
    }
}
