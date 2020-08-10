<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Document;

class DocumentController extends AbstractController
{
    /**
     * @Route("/documents")
     */
    public function index()
    {
        $documents = $this->getDoctrine()
            ->getRepository(Document::class)
            ->findAll();

        return $this->render('documents.html.twig', [
            'documents' => $documents,
        ]);
    }
}