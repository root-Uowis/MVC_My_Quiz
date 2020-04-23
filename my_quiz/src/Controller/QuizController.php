<?php

namespace App\Controller;
use App\Repository\CategorieRepository;
use App\Entity\Categorie;
use App\Entity\Question;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;

class QuizController extends AbstractController
{
    /**
     * @var Environment
     * @return Response
     */

    public function index(): Response
    {
        $categorie = $this->getDoctrine()
            ->getRepository(Categorie::class)
            ->findAll();
            $question = $this->getDoctrine()
                ->getRepository(Question::class)
                ->find(2);
            dump($categorie);
            dump($question);

        
        return $this->render('home/home.html.twig', [
            'categories' => $categorie,
            'questions' => $question
        ]);
    }
    /**
     * @Route("/home/show/{slug}/{idcategorie}/{id}", name="show")
     * @return Response
     */
    public function show($id): Response
    {
        $question = $this->getDoctrine()
            ->getRepository(Question::class)
            ->Find($id);

        dump($question);
        return $this->render('home/show.html.twig', [
            'questions' => $question
        ]);
    }
}
