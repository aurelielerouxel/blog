<?php

namespace App\Entity;

use App\Repository\SubjectRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=SubjectRepository::class)
 */
class Subject
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=1000)
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 50,
     *      minMessage = "Votre explication doit comporter au moins {{ limit }} caractères",
     * )
     * @Assert\Regex(
     *     pattern = "/\Bonjour/",
     *     message = "Soyez poli, dites Bonjour svp."
     * )
     */
    private $content;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $user_name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *      min = 30,
     *      minMessage = "Votre question doit comporter au moins {{ limit }} caractères",
     * )
     */
    private $category;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     */
    private $view;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getUserName(): ?string
    {
        return $this->user_name;
    }

    public function setUserName(string $user_name): self
    {
        $this->user_name = $user_name;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getView(): ?int
    {
        return $this->view;
    }

    public function setView(int $view): self
    {
        $this->view = $view;

        return $this;
    }
}
