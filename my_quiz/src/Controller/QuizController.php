<?php

namespace App\Controller;
use App\Repository\CategorieRepository;
use App\Entity\Categorie;
use App\Entity\Question;
use App\Entity\Reponse;
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
            ->FindOneByOne();
            $question = $this->getDoctrine()
            ->getRepository(Question::class)
            ->FindAllId();

        dump($categorie);

        return $this->render('home/home.html.twig', [
            'categories' => $categorie,
            'questions' => $question
        ]);
    }
    /**
     * @Route("/home/{idcategorie}/{id}", name="show")
     * @return Response
     */
    public function show($idcategorie,$id): Response
    {

        $categorie = $this->getDoctrine()
        ->getRepository(Categorie::class)
        ->FindOneByOne();
      
        $question = $this->getDoctrine()
            ->getRepository(Question::class)
            ->FindIdCategorie($idcategorie,$id);

        $reponse = $this->getDoctrine()
            ->getRepository(Reponse::class)
            ->findByQuestion($id);

        dump($reponse);
        dump($question);
      
        return $this->render('home/show.html.twig', [
            'categories' => $categorie,
            'questions' => $question,
            'reponses' => $reponse
        ]);
    }
    /**
     * @Route("/home/{idcategorie}/{id}/{idexpected}/verify", name="verify")
     * @return Response
     */
    public function verify($idcategorie,$id,$idexpected)
    {
        $categorie = $this->getDoctrine()
        ->getRepository(Categorie::class)
        ->FindOneByOne();

        $question = $this->getDoctrine()
        ->getRepository(Question::class)
        ->FindIdCategorie($idcategorie,$id);

    $reponse = $this->getDoctrine()
        ->getRepository(Reponse::class)
        ->findByQuestion($id);

    dump($reponse);
    dump($question);
  
    return $this->render('home/show.html.twig', [
        'categories' => $categorie,
        'questions' => $question,
        'reponses' => $reponse
    ]);
}
}
