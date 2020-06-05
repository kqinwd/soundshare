<?php

namespace Controller;

use Entity\Post;

class PostController
{
    public function create()
    {
        global $postRepo;
        global $manager;

        if (isset($_SESSION['user']) && isset($_POST['title']) && isset($_POST['link']) && isset($_POST['content']) && isset($_POST['genre'])) {
            $errorMsg = NULL;

            if (strlen(trim($_POST['title'])) == 0) {
                $errorMsg = "Please add a title";
            } else if (empty($_POST['genre'])) {
                $errorMsg = "Please add a genre";
            } else if (empty($_POST['link'])) {
                $errorMsg = "Missing link";
            } else if (empty($_POST['content'])) {
                $errorMsg = "Missing description";
            }
            if ($errorMsg) {
                $posts = $postRepo->findAll();
                include "../templates/addPost.php";
            } else {
                $newPost = new Post();
                $newPost->title = $_POST['title'];
                $newPost->genre = $_POST['genre'];
                $newPost->content = $_POST['content'];
                $newPost->link = $_POST['link'];
                $manager->persist($newPost);
                $manager->flush();
                $newPost->user = $_SESSION['user'];
                header('Location: ?action=display');
            }
        } else {
            include "../templates/addPost.php";
        }
    }
}
