<?php

namespace Controller;

class HomeController
{
    public function display()
    {
        global $postRepo;
        global $userRepo;
        $items = array();
        // Search by user or genre
        if (isset($_GET['search'])) {
            $strToSearch = $_GET['search'];
            if (strpos($strToSearch, "@") === 0) {
                $username = substr($strToSearch, 1);
                $users = $userRepo->findBy(array("username" => $username));
                if (count($users) == 1) {
                    $items = $postRepo->findBy(array("user" => $users[0]->id));
                }
            } else {
                $items = $postRepo->findBy(array("genre" => $strToSearch));
            }
        } else {
            $items = $postRepo->findAll();
        }
        include "../templates/display.php";
    }
}
