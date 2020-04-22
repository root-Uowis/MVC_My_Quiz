<?php

namespace App\Controller;
use App\Repository\CategorieRepository;
use App\Entity\Categorie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;

class CategorieController extends AbstractController
{
    /**
     * @var Environment
     * @var CategorieRepository $repository
     * @return Response
     */

    public function index(CategorieRepository $repository): Response {
        $categorie = $this->getDoctrine()
            ->getRepository(Categorie::class)
            ->findAll();
        return $this->render('home/home.html.twig', [
            'categories' => $categorie
        ]);
    }
    /**
     * @Route("/home/show/{slug}/{id}", name="show")
     * @param Categorie $categorie
     * @return Response
     */
    public function show(Categorie $categorie): Response
    {
        $categorie = $this->getDoctrine()
            ->getRepository(Categorie::class)
            ->findAll();
        return $this->render('home/show.html.twig', [
            'categories' => $categorie
        ]);
    }
}
