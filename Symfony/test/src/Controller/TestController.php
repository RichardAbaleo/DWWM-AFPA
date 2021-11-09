<?php

namespace App\Controller;

use App\Entity\Client;
use App\Repository\ClientRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function index(): Response
    {
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }

    /**
     * @Route("/ajout", name="ajout")
     */
    public function ajout(EntityManagerInterface $emi): Response
    {
        $client = new Client();
        $client->setcliName("Michel");
        $client->setcliPhoneNumber("0612345678");

        $emi->persist($client);
        $emi->flush();

        return $this->render('test/ajout.html.twig', []);
    }

    /**
     * @Route("/liste", name="liste")
     */
    public function liste(ClientRepository $repo): Response
    {
        $tab = $repo->findAll();

        return $this->render('test/liste.html.twig', ["clients" => $tab]);
    }
}
