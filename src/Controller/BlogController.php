<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Manga;
use App\Repository\MangaRepository;

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
*@Route("/blog/{id}", name="blog_show")
*/
    public function show(Manga $manga){

       return $this->render('blog/show.html.twig',[

           'manga' => $manga
       ]);
    }
}