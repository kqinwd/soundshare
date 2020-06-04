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
        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['passwordRetype'])) {
            $errorMsg = NULL;
            $users = $userRepo->findBy(array("username" => $_POST['username']));
            if (count($users) > 0) {
                $errorMsg = "Username already used.";
            } else if ($_POST['password'] != $_POST['passwordRetype']) {
                $errorMsg = "Passwords are not the same.";
            } else if (strlen(trim($_POST['password'])) < 8) {
                $errorMsg = "Your password should have at least 8 characters.";
            } else if (strlen(trim($_POST['username'])) < 4) {
                $errorMsg = "Your username should have at least 4 characters.";
            }
            if ($errorMsg) {
                include "../templates/register.php";
            } else {
                $user = new User();
                $user->username = $_POST["username"];
                $user->password = md5($_POST['password']);
                $_SESSION['user'] = $user;
                $manager->persist($user);
                $manager->flush();
                header('Location: ?action=display');
            }
        } else {
            include "../templates/register.php";
        }
        break;

    case 'logout':
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
        header('Location: ?action=display');
        break;

    case 'login':
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $usersWithThisLogin = $userRepo->findBy(array("username" => $_POST['username']));
            if (count($usersWithThisLogin) == 1) {
                $firstUserWithThisLogin = $usersWithThisLogin[0];
                if ($firstUserWithThisLogin->password != md5($_POST['password'])) {
                    $errorMsg = "Wrong password.";
                    include "../templates/loginform.php";
                } else {
                    $_SESSION['user'] = $usersWithThisLogin[0];
                    header('Location:/?action=display');
                }
            } else {
                $errorMsg = "Username doesn't exist.";
                include "../templates/loginform.php";
            }
        } else {
            include "../templates/loginform.php";
        }
        break;

    case 'new':
        if (isset($_SESSION['user']) && isset($_POST['title']) && isset($_POST['link']) && isset($_POST['content']) && isset($_POST['genre'])) {
            $errorMsg = NULL;
            if (empty($_POST['title'])) {
                $errorMsg = "Please add a title";
            } else if ($_POST['genre'] == 'Select genre') {
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
            include '../templates/addPost.php';
        }
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
