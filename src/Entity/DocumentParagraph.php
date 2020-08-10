<?php

namespace App\Entity;

use App\Repository\DocumentParagraphRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DocumentParagraphRepository::class)
 */
class DocumentParagraph
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Document::class, inversedBy="documentParagraphs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $document;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\OneToMany(targetEntity=ParagraphComment::class, mappedBy="paragraph", orphanRemoval=true)
     */
    private $paragraphComments;

    public function __construct()
    {
        $this->paragraphComments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDocument(): ?Document
    {
        return $this->document;
    }

    public function setDocument(?Document $document): self
    {
        $this->document = $document;

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

    /**
     * @return Collection|ParagraphComment[]
     */
    public function getParagraphComments(): Collection
    {
        return $this->paragraphComments;
    }

    public function addParagraphComment(ParagraphComment $paragraphComment): self
    {
        if (!$this->paragraphComments->contains($paragraphComment)) {
            $this->paragraphComments[] = $paragraphComment;
            $paragraphComment->setParagraph($this);
        }

        return $this;
    }

    public function removeParagraphComment(ParagraphComment $paragraphComment): self
    {
        if ($this->paragraphComments->contains($paragraphComment)) {
            $this->paragraphComments->removeElement($paragraphComment);
            // set the owning side to null (unless already changed)
            if ($paragraphComment->getParagraph() === $this) {
                $paragraphComment->setParagraph(null);
            }
        }

        return $this;
    }
}
