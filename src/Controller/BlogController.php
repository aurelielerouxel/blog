<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
// use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
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
            'subjects' => $subjects
        ]);
    }

    /**
     * @Route("/article/{id}", name="article", requirements={"id"="\d+"}, defaults={"id": 1})
     */
    public function article(int $id): Response
    {
        $subjectRepository = $this->getDoctrine()->getRepository(Subject::class);

        $article = $subjectRepository->find($id);

        return $this->render('blog/article.html.twig', [
            'article' => $article
        ]);
    }

    /**
     * @Route("/edit", name="edit")
     */
    public function edit($id)
    {
    	return $this->render('blog/edit.html.twig', [
         
        ]);
    }

    /**
     * @Route("/delete", name="delete")
     */
    public function delete($id)
    {
    	return new Response('<h1>Delete article: ' .$id. '</h1>');
    }
  
}
