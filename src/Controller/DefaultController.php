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
            'posts' => $this->cutDescription($posts),
        ]);
    }

    private function cutDescription($posts)
    {
        $newPosts= [];

        foreach ($posts as $key => $value) {
            $str = $value->getDescription();
            if (mb_strpos($str, PHP_EOL)) {
                $str = mb_substr($str, 0, mb_strpos($str, PHP_EOL));
            }
            $value->setDescription($str);

            $newPosts[] = $posts[$key];
        }

        return $newPosts;
    }

}
