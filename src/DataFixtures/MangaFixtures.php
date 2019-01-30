<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Manga;

class MangaFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 1;$i <= 5; $i++){
            $article = new Manga();
            $article->setTitle("Titre du manga n°$i")
                    ->setAuthor("<p>Author du manga n°$i</p>")
                    ->setGenre("<p>genre du manga n°$i</p>")
                    ->setEditionF("<p>edition F du manga n°$i </p>")
                    ->setEditionJ("<p>edition J du manga n°$i </p>");

            $manager->persist($article);
        }

        $manager->flush();
    }
}
