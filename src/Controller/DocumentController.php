<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DocumentController extends AbstractController
{
    /**
     * @Route("/documents")
     */
    public function index()
    {
        return $this->render('documents.html.twig', [
            'number' => 3,
        ]);
    }
}