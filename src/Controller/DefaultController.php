<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index(PostRepository $postRepository)
    {

        $posts = $postRepository->findBy([], ['created_at' => 'DESC'], 3);

        return $this->render('default/index.html.twig', [
            'posts' => $posts,
        ]);
    }

}
