<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\MakerBundle\Validator;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\DocumentParagraph;
use App\Entity\ParagraphComment;
use Symfony\Component\HttpFoundation\Request;

class ParagraphCommentsController extends AbstractController
{
    /**
     * @Route("/paragraph/{paragraphId}/comments", name="paragraph.comments.index", methods={"GET"}))
     */
    public function index($paragraphId)
    {
        $paragraph = $this->getDoctrine()
            ->getRepository(DocumentParagraph::class)
            ->find($paragraphId);


        $data = array();

        foreach($paragraph->getParagraphComments() as $comment) {
            $data[] = array(
                'id' => $comment->getId(),
                'content' => $comment->getContent()
            );
        }
        
        return new JsonResponse([
            'comments' => $data,
        ]);
    }

    /**
     * @Route("/paragraph/{paragraphId}/comments/store", name="paragraph.comments.store", methods={"POST"}))
     */
    public function store($paragraphId)
    {
        $request = new Request();
        $content = json_decode($request->getContent())->content;

        $paragraph = $this->getDoctrine()
            ->getRepository(DocumentParagraph::class)
            ->find($paragraphId);

        if ($content && $paragraph) {
            $comment = new ParagraphComment();

            $comment->setParagraph($paragraph);
            $comment->setContent($content);

            $this->storeInDb($comment);

            return new JsonResponse([
                'status' => 'success'
            ]);
        }

        return new JsonResponse([
            'status' => 'error'
        ]);
    }

    /**
     * @Route("/paragraph/comments/{id}/update", name="paragraph.comments.update", methods={"POST"}))
     */
    public function update($id)
    {
        $request = new Request();
        $content = json_decode($request->getContent())->content;

        $comment = $this->getDoctrine()
            ->getRepository(ParagraphComment::class)
            ->find($id);

        if($content && $comment) {
            $comment->setContent($content);

            $this->storeInDb($comment);

            return new JsonResponse([
                'status' => 'success'
            ]);
        }

        return new JsonResponse([
            'status' => 'error'
        ]);
    }

    private function storeInDb($entity)
    {
        $manager = $this->getDoctrine()->getManager();
        $manager->persist($entity);
        $manager->flush();
    }
}
