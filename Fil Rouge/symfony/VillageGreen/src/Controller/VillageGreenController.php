<?php

namespace App\Controller;

use App\Entity\Users;
use App\Form\UsersType;
use Symfony\Component\HttpFoundation\Request;
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
     * @Route("/village_green/inscription", name="inscription", methods={"GET","POST"})
     */
    public function inscription(Request $request): Response
    {
        $user = new Users();
        $form = $this->createForm(UsersType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('village_green', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('village_green/inscription.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }
}
