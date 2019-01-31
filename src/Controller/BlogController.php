<?php

namespace App\Controller;

use App\Entity\Manga;
use App\Repository\MangaRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index(MangaRepository $repo){   

        $mangas = $repo->findAll();

        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
            'mangas' => $mangas
        ]);
    }

/** 
*@Route("/", name="home")
*/

    public function home() {
        return $this->render('blog/home.html.twig', [
            'title'=> "Bienvenue dans ma bibliothèque."
        ]);
    
    }

    /**
     * @route("blog/new", name="blog_create")
     * @Route("blog/{id}/edit", name="blog_edit")
     */
    
    public function form(Manga $manga = null, Request $request, ObjectManager $manager) {
        
        if (!$manga){
        $manga = new Manga();
        }

        $form = $this->createFormBuilder($manga)
                    ->add('title')
                    ->add('author')
                    ->add('genre')
                    ->add('editionF')
                    ->add('editionJ')
                    
                    ->getForm();

        $form->handleRequest($request); 

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($manga);
            $manager->flush();

            return $this->redirectToRoute('blog_show', ['id'=> $manga->getid
            ()]);
        }


        return $this->render('blog/create.html.twig', [
            'formManga' => $form->createView(),
            'editMode' => $manga->getId() !== null
        ]);
    }

/**
*@Route("/blog/{id}", name="blog_show")
*/
    public function show(Manga $manga){

       return $this->render('blog/show.html.twig',[

           'manga' => $manga
       ]);
    }
}