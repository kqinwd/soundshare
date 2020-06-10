<?php

namespace Controller;

use ludk\Http\Request;
use ludk\Http\Response;
use ludk\Controller\AbstractController;
use Entity\Post;

class PostController extends AbstractController
{
    public function create(Request $request): Response
    {
        $postRepo = $this->getOrm()->getRepository(Post::class);
        $manager = $this->getOrm()->getManager();

        if (($request->getSession()->has('user')) && $request->request->has('title') && $request->request->has('link') && $request->request->has('content') && $request->request->has('genre')) {
            $errorMsg = NULL;

            if (empty($request->request->get('title'))) {
                $errorMsg = "Please add a title";
            } else if (empty($request->request->get('genre'))) {
                $errorMsg = "Please add a genre";
            } else if (empty($request->request->get('link'))) {
                $errorMsg = "Missing link";
            } else if (empty($request->request->get('content'))) {
                $errorMsg = "Missing description";
            }
            if ($errorMsg) {
                // $posts = $postRepo->findAll();

                $data = array(
                    "errorMsg" => $errorMsg
                );
                return $this->render("addPost.php", $data);
            } else {
                $newPost = new Post();
                $newPost->title = $request->request->get('title');
                $newPost->genre = $request->request->get('genre');
                $newPost->content = $request->request->get('content');
                $newPost->link = $request->request->get('link');
                $newPost->user = $request->getSession()->get('user');
                // $newPost->user = $_SESSION['user'];
                $manager->persist($newPost);
                $manager->flush();
                return $this->redirectToRoute('display');
            }
        } else {
            // include "../templates/addPost.php";
            return $this->render("addPost.php");
        }
    }
}
