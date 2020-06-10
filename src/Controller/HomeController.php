<?php

namespace Controller;

use Entity\Post;
use Entity\User;
use ludk\Http\Request;
use ludk\Http\Response;
use ludk\Controller\AbstractController;

class HomeController extends AbstractController
{
    public function display(Request $request): Response

    {
        $postRepo = $this->getOrm()->getRepository(Post::class);
        $userRepo = $this->getOrm()->getRepository(User::class);
        $items = array();

        if ($request->query->has('search')) {
            // $strToSearch = $_GET['search'];
            $strToSearch = $request->query->get('search');
            if (strpos($strToSearch, "@") === 0) {
                $username = substr($strToSearch, 1);
                $users = $userRepo->findBy(array("username" => $username));
                if (count($users) == 1) {
                    $user = $users[0];
                    $items = $postRepo->findBy(array("user" => $user->id));
                }
            } else {
                $items = $postRepo->findBy(array("genre" => "%$strToSearch%"));
            }
        } else {
            $items = $postRepo->findAll();
        }
        // include "../templates/display.php";
        $data = array(
            "items" => $items
        );
        return $this->render("display.php", $data);
    }
}
