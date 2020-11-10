<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
// use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use App\Entity\Subject;
use App\Form\SubjectType;
// use App\DataFixtures\AppFixtures;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @IsGranted("IS_AUTHENTICATED_FULLY")
*/

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
     * @Route("/article/{id}", name="article", requirements={"id"="\d+"}, defaults={"id": 3})
     */
    public function article(int $id): Response
    {
        $subjectRepository = $this->getDoctrine()->getRepository(Subject::class);

        $article = $subjectRepository->find($id);
        dump($article);

        // $article = $swearCleaner->cleanSwear($article);

        return $this->render('blog/article.html.twig', [
            'article' => $article
        ]);
    }

    /**
    * @Route("/subject/new", name="new_subject")
    */
    public function newSubject(Request $request, ValidatorInterface $validator): Response
    {
        $errors = null;
        $subject = new Subject();
        $form = $this->createForm(SubjectType::class, $subject);

// On traite les données de la requête dans l'objet form
        $form->handleRequest($request);

// Si un formulaire est soumis et que tout est OK
    if ($form->isSubmitted() && $form->isValid()) {

// On vérifie les infos avant de les envoyés (vérification symfony doc)
        $errors = $validator->validate($subject);

// On enregistre le nouveau sujet 
        $entityManager = $this->getDoctrine()->getManager();

        if(count($errors) === 0) {

// Aide pour une opération projet bank 2 entité à créer (une pour table opé et une pour table compte)
            $entityManager->persist($subject);

// Message d'info pour avertir l'utilisateur que le formulaire a bien été soumis
            $this->addFlash('success', 'Votre question a bien été enregistrée');
            $this->addFlash('success', "N'hésitez pas à visiter notre blog");

// Sans fluch, l'entité n'est jamais enregistrée
            $entityManager->flush();
            return $this->redirectToRoute('index');
        }
    }

    	return $this->render('blog/newSubject.html.twig', [
            'form' => $form->createView(),
            'errors' => $errors, 
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
