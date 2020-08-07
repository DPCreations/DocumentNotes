<?php

namespace App\Entity;

use App\Repository\DocumentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DocumentRepository::class)
 */
class Document
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=DocumentParagraph::class, mappedBy="document", orphanRemoval=true)
     */
    private $documentParagraphs;

    public function __construct()
    {
        $this->documentParagraphs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|DocumentParagraph[]
     */
    public function getDocumentParagraphs(): Collection
    {
        return $this->documentParagraphs;
    }

    public function addDocumentParagraph(DocumentParagraph $documentParagraph): self
    {
        if (!$this->documentParagraphs->contains($documentParagraph)) {
            $this->documentParagraphs[] = $documentParagraph;
            $documentParagraph->setDocument($this);
        }

        return $this;
    }

    public function removeDocumentParagraph(DocumentParagraph $documentParagraph): self
    {
        if ($this->documentParagraphs->contains($documentParagraph)) {
            $this->documentParagraphs->removeElement($documentParagraph);
            // set the owning side to null (unless already changed)
            if ($documentParagraph->getDocument() === $this) {
                $documentParagraph->setDocument(null);
            }
        }

        return $this;
    }
}
