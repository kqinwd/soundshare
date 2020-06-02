<?php

use Entity\Post;
use Entity\User;
use ludk\Persistence\ORM;

require __DIR__ . '/../vendor/autoload.php';

session_start();

$orm = new ORM(__DIR__ . '/../Resources');
$postRepo = $orm->getRepository(Post::class);

// $item = $postRepo->find(1);
// // $item->title = "nouveau titre";
// $manager = $orm->getManager();
// $manager->persist($item);
// $manager->flush();
// $items = $postRepo->findAll();

$items = array();

// Search by genre
// if (isset($_GET["search"])) {
//     $items = $postRepo->findBy(array("genre" => $_GET["search"]));
// } else {
//     $items = $postRepo->findAll();
// }

// Search by user
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

// use Entity\User;
// use Entity\Post;

// require '../vendor/autoload.php';

// $firstUser = new User();
// $firstUser->id = 1;
// $firstUser->username = "Layla";
// $firstUser->password = "azerty";

// $secondUser = new User();
// $secondUser->id = 2;
// $secondUser->username = "Val";
// $secondUser->password = "azerty2";

// $firstPost = new Post();
// $firstPost->id = 1;
// $firstPost->title = "Zane Alexander - D i v i s i o n";
// $firstPost->genre = "Synthwave";
// $firstPost->content = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum in cumque dolore praesentium rerum placeat minima quasi quo amet laudantium soluta a consequatur, maxime cum nisi ab, error est cupiditate.
// ";
// $firstPost->link = "https://youtu.be/618tRdZWD4g";
// $firstPost->creationDate = date("m/d/Y");
// $firstPost->user = $firstUser;

// $secondPost = new Post();
// $secondPost->id = 2;
// $secondPost->title = "Kendrick Lamar - Money Trees";
// $secondPost->genre = "Rap";
// $secondPost->content = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum in cumque dolore praesentium rerum placeat minima quasi quo amet laudantium soluta a consequatur, maxime cum nisi ab, error est cupiditate.
// ";
// $secondPost->link = "https://youtu.be/smqhSl0u_sI";
// $secondPost->creationDate = date("m/d/Y");
// $secondPost->user = $secondUser;

// $thirdPost = new Post();
// $thirdPost->id = 3;
// $thirdPost->title = "Tracy Chapman - Bang Bang Bang";
// $thirdPost->genre = "Neofolk";
// $thirdPost->content = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum in cumque dolore praesentium rerum placeat minima quasi quo amet laudantium soluta a consequatur, maxime cum nisi ab, error est cupiditate.
// ";
// $thirdPost->link = "https://youtu.be/IrRA7WMI1ks";
// $thirdPost->creationDate = date("m/d/Y");
// $thirdPost->user = $firstUser;

// $fourthPost = new Post();
// $fourthPost->id = 4;
// $fourthPost->title = "Pink Floyd - Wish You Were Here";
// $fourthPost->genre = "Classic Rock";
// $fourthPost->content = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum in cumque dolore praesentium rerum placeat minima quasi quo amet laudantium soluta a consequatur, maxime cum nisi ab, error est cupiditate.
// ";
// $fourthPost->link = "https://youtu.be/IXdNnw99-Ic";
// $fourthPost->creationDate = date("m/d/Y");
// $fourthPost->user = $secondUser;

// $items = array($firstPost, $secondPost, $thirdPost, $fourthPost);

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

?>

<!doctype html>
<html lang="FR-fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>soundShare</title>
</head>

<body>

    <!-- SIDENAV -->
    <!-- Bootstrap NavBar -->

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="?">
            <span>
                <svg class="bi bi-play" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10.804 8L5 4.633v6.734L10.804 8zm.792-.696a.802.802 0 010 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696l6.363 3.692z" clip-rule="evenodd" />
                </svg>
            </span>
            <span class="menu-collapsed">SoundShare</span>
        </a>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="?">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#top"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#top"><span class="mr-1"><svg class="bi bi-power" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M5.578 4.437a5 5 0 104.922.044l.5-.866a6 6 0 11-5.908-.053l.486.875z" clip-rule="evenodd" />
                                <path fill-rule="evenodd" d="M7.5 8V1h1v7h-1z" clip-rule="evenodd" />
                            </svg></span>Logout</a>
                </li>
                <li class="nav-item ml-3">
                    <form class="form-inline">
                        <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
                        <!-- <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button> -->
                    </form>
                </li>
                <!-- This menu is hidden in bigger devices with d-sm-none. 
           The sidebar isn't proper for smaller screens imo, so this dropdown menu can keep all the useful sidebar itens exclusively for smaller screens  -->
                <li class="nav-item dropdown d-sm-block d-md-none">
                    <a class="nav-link dropdown-toggle" href="#" id="smallerscreenmenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Menu </a>
                    <div class="dropdown-menu" aria-labelledby="smallerscreenmenu">
                        <a class="dropdown-item" href="#top">Profile</a>
                        <a class="dropdown-item" href="#top">Playlists</a>
                        <a class="dropdown-item" href="#top">Friends</a>
                    </div>
                </li><!-- Smaller devices menu END -->
            </ul>
        </div>
    </nav><!-- NavBar END -->
    <!-- Bootstrap row -->
    <div class="row" id="body-row">
        <!-- Sidebar -->
        <div id="sidebar-container" class="sidebar-expanded d-none d-md-block">
            <!-- d-* hiddens the Sidebar in smaller devices. Its itens can be kept on the Navbar 'Menu' -->
            <!-- Bootstrap List Group -->
            <ul class="list-group">
                <!-- Separator with title -->
                <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                    <small>MAIN MENU</small>
                </li>
                <!-- /END Separator -->
                <a href="#submenu1" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="mr-3"><svg class="bi bi-person-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                            </svg></span>
                        <span class="menu-collapsed">Profile</span>
                        <span class="ml-3"><svg class="bi bi-chevron-down" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 01.708 0L8 10.293l5.646-5.647a.5.5 0 01.708.708l-6 6a.5.5 0 01-.708 0l-6-6a.5.5 0 010-.708z" clip-rule="evenodd" />
                            </svg></span>
                    </div>
                </a>
                <!-- Submenu content -->
                <div id='submenu1' class="collapse sidebar-submenu">
                    <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed">Settings</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed">Password</span>
                    </a>
                </div>

                <a href="#submenu2" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="mr-3"><svg class="bi bi-music-note-list" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 13c0 1.105-1.12 2-2.5 2S7 14.105 7 13s1.12-2 2.5-2 2.5.895 2.5 2z" />
                                <path fill-rule="evenodd" d="M12 3v10h-1V3h1z" clip-rule="evenodd" />
                                <path d="M11 2.82a1 1 0 01.804-.98l3-.6A1 1 0 0116 2.22V4l-5 1V2.82z" />
                                <path fill-rule="evenodd" d="M0 11.5a.5.5 0 01.5-.5H4a.5.5 0 010 1H.5a.5.5 0 01-.5-.5zm0-4A.5.5 0 01.5 7H8a.5.5 0 010 1H.5a.5.5 0 01-.5-.5zm0-4A.5.5 0 01.5 3H8a.5.5 0 010 1H.5a.5.5 0 01-.5-.5z" clip-rule="evenodd" />
                            </svg></span>
                        <span class="menu-collapsed">Playlists <span class="badge badge-pill badge-primary ml-2">2</span></span>
                        <span class="ml-3"><svg class="bi bi-chevron-down" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 01.708 0L8 10.293l5.646-5.647a.5.5 0 01.708.708l-6 6a.5.5 0 01-.708 0l-6-6a.5.5 0 010-.708z" clip-rule="evenodd" />
                            </svg></span>
                    </div>
                </a>
                <!-- Submenu content -->
                <div id='submenu2' class="collapse sidebar-submenu">
                    <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed">Summer</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed">Workout</span>
                    </a>
                </div>

                <a href="#" class="bg-dark list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="mr-3"><svg class="bi bi-people-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 100-6 3 3 0 000 6zm-5.784 6A2.238 2.238 0 015 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 005 9c-4 0-5 3-5 4s1 1 1 1h4.216zM4.5 8a2.5 2.5 0 100-5 2.5 2.5 0 000 5z" clip-rule="evenodd" />
                            </svg></span>
                        <span class="menu-collapsed">Friends </span>
                    </div>
                </a>
                <!-- Separator with title -->
                <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                    <small>OPTIONS</small>
                </li>
                <!-- /END Separator -->
                <!-- <a href="#" class="bg-dark list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-calendar fa-fw mr-3"></span>
                        <span class="menu-collapsed">Calendar</span>
                    </div>
                </a> -->

                <!-- Separator without title -->
                <!-- <li class="list-group-item sidebar-separator menu-collapsed"></li> -->
                <!-- /END Separator -->
                <a href="#" class="bg-dark list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="mr-3"><svg class="bi bi-gear-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 01-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 01.872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 012.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 012.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 01.872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 01-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 01-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 100-5.86 2.929 2.929 0 000 5.858z" clip-rule="evenodd" />
                            </svg></span>
                        <span class="menu-collapsed">Settings</span>
                    </div>
                </a>
                <a href="#top" data-toggle="sidebar-colapse" class="bg-dark list-group-item list-group-item-action d-flex align-items-center">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="mr-3"><svg class="bi bi-chevron-compact-left" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M9.224 1.553a.5.5 0 01.223.67L6.56 8l2.888 5.776a.5.5 0 11-.894.448l-3-6a.5.5 0 010-.448l3-6a.5.5 0 01.67-.223z" clip-rule="evenodd" />
                            </svg></span>
                        <span id="collapse-text" class="menu-collapsed">Hide Menu</span>
                    </div>
                </a>
            </ul><!-- List Group END-->
        </div><!-- sidebar-container END -->

        <!-- MAIN -->
        <div class="col p-4">

            <!-- CONTENT -->
            <section>
                <h1 class="ml-4 mb-3 font-weight-bold">Latest posts</h1>

                <div class="row d-flex justify-content-around">
                    <?php
                    foreach ($items as $item) {
                    ?>
                        <div class="card mb-5" style="max-width: 480px;">
                            <?php echo video_iframe_YT($item->link) ?>
                            <div class="card-body">
                                <a class="badge badge-info mb-2" href="?search=<?php echo $item->genre ?>"><?php echo ($item->genre) ?></a>
                                <h5 class="card-title"><?php echo $item->title ?></h5>

                                <p class="card-text text-truncate"><?php echo htmlentities($item->content) ?>
                                </p>
                                <p class="text-secondary font-italic">Posted by <a href="?search=@<?php echo $item->user->username ?>"><?php echo $item->user->username ?></a> - <?php echo $item->creationDate ?></p>
                                <div class="row mx-auto">
                                    <a href="#" class="btn btn-primary mr-2">View post</a>
                                    <a href="#" class="btn btn-outline-secondary">Add to playlist</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </section>
        </div><!-- Main Col END -->
    </div><!-- body-row END -->

    <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="script/script.js"></script>
</body>

</html>