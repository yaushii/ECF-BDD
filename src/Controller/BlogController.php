<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Manga;
use App\Repository\MangaRepository;
use Symfony\Component\Form\Extension\Core\Type\TextType;

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
     */
    
    public function create(){
        $manga = new Manga();

        $form = $this->createFormBuilder($manga)
                    ->add('title', TextType::class, [
                        'attr' => [
                        'placeholder' => 'titre du manga'
                    ]
                    ])
                    ->add('author', TextType::class, [
                        'attr' => [
                        'placeholder' => 'auteur'
                        ]
                    ])
                    ->add('genre', TextType::class, [
                        'attr' => [
                        'placeholder' => 'Genre'
                        ]
                    ])
                    ->add('editionF', TextType::class, [
                        'attr' => [
                        'placeholder' => "Maison d'édition Française"
                        ]
                    ])
                    ->add('editionJ', TextType::class, [
                        'attr' => [
                        'placeholder' => "Maison d'édition Japonnaise"
                        ]
                    ])
                    ->getForm();

        return $this->render('blog/create.html.twig', [
            'formManga' => $form->createView()
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