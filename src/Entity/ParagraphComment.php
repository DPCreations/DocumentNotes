<?php

namespace App\Entity;

use App\Repository\ParagraphCommentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ParagraphCommentRepository::class)
 */
class ParagraphComment
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=DocumentParagraph::class, inversedBy="paragraphComments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $paragraph;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getParagraph(): ?DocumentParagraph
    {
        return $this->paragraph;
    }

    public function setParagraph(?DocumentParagraph $paragraph): self
    {
        $this->paragraph = $paragraph;

        return $this;
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
}
