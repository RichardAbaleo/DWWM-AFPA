<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VillageGreenController extends AbstractController
{
    /**
     * @Route("/village_green", name="village_green")
     */
    public function index(): Response
    {
        return $this->render('village_green/index.html.twig', [
            'controller_name' => 'VillageGreenController',
        ]);
    }
}
