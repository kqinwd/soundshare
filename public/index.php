<?php

use Controller\AuthController;
use Controller\HomeController;
use Controller\PostController;
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
        $authControllerRegister = new AuthController;
        $authControllerRegister->register();
        break;

    case 'logout':
        $authControllerLogout = new AuthController();
        $authControllerLogout->logout();
        break;

    case 'login':
        $authControllerLogin = new AuthController();
        $authControllerLogin->login();
        break;

    case 'new':
        $postController = new PostController();
        $postController->create(); // "add a new post" function
        break;

    case 'display':
        $homeController = new HomeController();
        $homeController->display();
        break;
}
