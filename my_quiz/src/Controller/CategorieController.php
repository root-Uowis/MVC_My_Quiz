<?php

namespace App\Controller;
use App\Repository\CategorieRepository;
use App\Entity\Categorie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;


class CategorieController extends AbstractController
{

    /**
     * @var Environment
     * @var CategorieRepository $repository
     * @return Response
     */
    

    public function index(CategorieRepository $repository): Response
    {
        $categorie = $repository->find(1);
        dump($categorie);
        return $this->render('home/home.html.twig',
    [
        'categories' => $categorie
    ]);

    }
}
