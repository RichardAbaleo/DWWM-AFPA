<?php

namespace App\Controller;

use App\Form\UsersType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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

    /**
     * @Route("/village_green/inscription", name="inscription")
     */
    public function inscription(): Response
    {
        $form = $this->createForm(UsersType::class);
        return $this->render('village_green/inscription.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
