<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Subject;
// use App\DataFixtures\AppFixtures;

class BlogController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @Route("/articles", name="articles")
     */
    public function index(): Response
    {
        $subjectRepository = $this->getDoctrine()->getRepository(Subject::class);

        $subjects = $subjectRepository->findAll();

        return $this->render('blog/index.html.twig', [
            'subjects' => $subjects,
        ]);
    }

    /**
     * @Route("/article", name="article")
     */
    public function article(): Response
    {
        return $this->render('blog/article.html.twig', [
            // 'controller_name' => 'BlogController',
        ]);
    }
}
