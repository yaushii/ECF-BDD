<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MangaRepository")
 */
class Manga
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $author;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $genre;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $editionF;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $editionJ;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getEditionF(): ?string
    {
        return $this->editionF;
    }

    public function setEditionF(string $editionF): self
    {
        $this->editionF = $editionF;

        return $this;
    }

    public function getEditionJ(): ?string
    {
        return $this->editionJ;
    }

    public function setEditionJ(string $editionJ): self
    {
        $this->editionJ = $editionJ;

        return $this;
    }
}
