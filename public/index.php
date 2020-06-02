<?php

use Entity\Post;
use Entity\User;
use ludk\Persistence\ORM;

require __DIR__ . '/../vendor/autoload.php';

session_start();

$orm = new ORM(__DIR__ . '/../Resources');
$manager = $orm->getManager();
$postRepo = $orm->getRepository(Post::class);
$userRepo = $orm->getRepository(User::class);

// Search by genre
// if (isset($_GET["search"])) {
//     $items = $postRepo->findBy(array("genre" => $_GET["search"]));
// } else {
//     $items = $postRepo->findAll();
// }

/////////////// FONCTION EMBED VIDEO //////////////////
// VIDEO YT : clean URL
function video_cleanURL_YT($video_url)
{
    if (!empty($video_url)) {
        $video_url             = str_replace('youtu.be/', 'www.youtube.com/embed/', $video_url);
        $video_url             = str_replace('www.youtube.com/watch?v=', 'www.youtube.com/embed/', $video_url);
    }
    // -----------------
    return $video_url;
};
// ---------------------
// VIDEO YT : iframe
function video_iframe_YT($video_url)
{
    $video_iframe            = '';
    // -----------------
    if (!empty($video_url)) {
        $video_url             = video_cleanURL_YT($video_url);
        $video_iframe        = '<iframe  height="280" src="' . $video_url . '"  frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
    }
    // -----------------
    return $video_iframe;
};
////////////////////////////////////////

$action = $_GET["action"] ?? "display";
switch ($action) {
    case 'register':
        break;
    case 'logout':
        if (isset($_SESSION['userId'])) {
            unset($_SESSION['userId']);
        }
        header('Location: ?action=display');
        break;
    case 'login':
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $users = $userRepo->findBy(array("username" => $_POST['username'], "password" => $POST['password']));
            if (count($users) == 1) {
                $_SESSION['userId'] = $users[0]->id;
                header('Location: ?action=display');
            } else {
                $errorMsg = "Wrong login and/or password.";
                include "../templates/loginform.php";
            }
        } else {
            include "../templates/loginform.php";
        }
        break;
    case 'new':
        break;
    case 'display':
        $items = array();
        // Search by user or genre
        if (isset($_GET['search'])) {
            $strToSearch = $_GET['search'];
            if (strpos($strToSearch, "@") === 0) {
                $username = substr($strToSearch, 1);
                $userRepo = $orm->getRepository(User::class);
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

    default:
        break;
}
