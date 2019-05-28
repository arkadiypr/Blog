<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
//    /**
//     * @Route("/post/{id}", name="post")
//     */
//    public function index($id, PostRepository $postRepository)
//    {
//        $post = $postRepository->find($id);
//
//        if (!$post) {
//            return $this->createNotFoundException('Post № '.$id.' not found.');
//        }
//
//        return $this->render('post/index.html.twig', [
//            'post' => $post,
//        ]);
//    }

    /**
     * @Route("/post/{id}", name="post")
     */
    public function index(Post $post)
    {

        return $this->render('post/index.html.twig', [
            'post' => $post,
        ]);
    }
}
