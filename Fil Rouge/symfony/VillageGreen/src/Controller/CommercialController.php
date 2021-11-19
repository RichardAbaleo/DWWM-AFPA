<?php

namespace App\Controller;

use App\Entity\Commercial;
use App\Form\Commercial1Type;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/commercial")
 */
class CommercialController extends AbstractController
{
    /**
     * @Route("/", name="commercial_index", methods={"GET"})
     */
    public function index(): Response
    {
        $commercials = $this->getDoctrine()
            ->getRepository(Commercial::class)
            ->findAll();

        return $this->render('commercial/index.html.twig', [
            'commercials' => $commercials,
        ]);
    }

    /**
     * @Route("/new", name="commercial_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $commercial = new Commercial();
        $form = $this->createForm(Commercial1Type::class, $commercial);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($commercial);
            $entityManager->flush();

            return $this->redirectToRoute('commercial_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('commercial/new.html.twig', [
            'commercial' => $commercial,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{comId}", name="commercial_show", methods={"GET"})
     */
    public function show(Commercial $commercial): Response
    {
        return $this->render('commercial/show.html.twig', [
            'commercial' => $commercial,
        ]);
    }

    /**
     * @Route("/{comId}/edit", name="commercial_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Commercial $commercial): Response
    {
        $form = $this->createForm(Commercial1Type::class, $commercial);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('commercial_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('commercial/edit.html.twig', [
            'commercial' => $commercial,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{comId}", name="commercial_delete", methods={"POST"})
     */
    public function delete(Request $request, Commercial $commercial): Response
    {
        if ($this->isCsrfTokenValid('delete'.$commercial->getComId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($commercial);
            $entityManager->flush();
        }

        return $this->redirectToRoute('commercial_index', [], Response::HTTP_SEE_OTHER);
    }
}
