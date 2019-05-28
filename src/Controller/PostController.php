<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use App\Repository\PostRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    /**
     * @Route("/new-post", name="new_post")
     */
    public function addPost(Request $request, EntityManagerInterface $entityManager)
    {
        $post = new Post();
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($post);
            $entityManager->flush();

            return $this->redirectToRoute('new_post_success');
        }

        return $this->render('post/new-post.html.twig', [
            'form' => $form->createView( ),
        ]);
    }

    /**
     * @Route("/post/{id}/edit", name="post_edit")
     */
    public function editPost(Post $post)
    {
        return $this->render('post/edit-post.html.twig', [
            'post' => $post,
        ]);
    }

    /**
     * @Route("/new-post/success", name="new_post_success")
     */
    public function success()
    {
        return $this->render('post/success.html.twig');
    }
}
