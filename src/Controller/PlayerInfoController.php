<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PlayerInfoController extends AbstractController
{
    public function index($name)
    {
        return $this->render('player_info/index.html.twig', [
            'controller_name' => 'PlayerInfoController',
            'name' => $name
        ]);
    }
}
