<?php

use Entity\User;
use Entity\Post;

require '../vendor/autoload.php';

$firstUser = new User();
$firstUser->id = 1;
$firstUser->username = "Layla";
$firstUser->password = "azerty";

$secondUser = new User();
$secondUser->id = 2;
$secondUser->username = "Val";
$secondUser->password = "azerty2";

$firstPost = new Post();
$firstPost->id = 1;
$firstPost->title = "Zane Alexander - D i v i s i o n";
$firstPost->genre = "Synthwave";
$firstPost->content = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum in cumque dolore praesentium rerum placeat minima quasi quo amet laudantium soluta a consequatur, maxime cum nisi ab, error est cupiditate.
";
$firstPost->link = "https://youtu.be/618tRdZWD4g";
$firstPost->creationDate = date("m/d/Y");
$firstPost->user = $firstUser;

$secondPost = new Post();
$secondPost->id = 2;
$secondPost->title = "Kendrick Lamar - Money Tree";
$secondPost->genre = "Rap";
$secondPost->content = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum in cumque dolore praesentium rerum placeat minima quasi quo amet laudantium soluta a consequatur, maxime cum nisi ab, error est cupiditate.
";
$secondPost->link = "https://youtu.be/smqhSl0u_sI";
$secondPost->creationDate = date("m/d/Y");
$secondPost->user = $secondUser;

$thirdPost = new Post();
$thirdPost->id = 3;
$thirdPost->title = "Tracy Chapman - Bang Bang Bang";
$thirdPost->genre = "Neofolk";
$thirdPost->content = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum in cumque dolore praesentium rerum placeat minima quasi quo amet laudantium soluta a consequatur, maxime cum nisi ab, error est cupiditate.
";
$thirdPost->link = "https://youtu.be/IrRA7WMI1ks";
$thirdPost->creationDate = date("m/d/Y");
$thirdPost->user = $firstUser;

$fourthPost = new Post();
$fourthPost->id = 4;
$fourthPost->title = "Pink Floyd - Wish You Were Here";
$fourthPost->genre = "Classic Rock";
$fourthPost->content = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum in cumque dolore praesentium rerum placeat minima quasi quo amet laudantium soluta a consequatur, maxime cum nisi ab, error est cupiditate.
";
$fourthPost->link = "https://youtu.be/IXdNnw99-Ic";
$fourthPost->creationDate = date("m/d/Y");
$fourthPost->user = $secondUser;

$items = array($firstPost, $secondPost, $thirdPost, $fourthPost);

// FONCTION EMBED VIDEO
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
        $video_iframe        = '<iframe  height="250" src="' . $video_url . '"  frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
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

    <!-- NAVBAR
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">soundShare</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Genres</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav> -->

    <!-- TEST SIDENAV -->
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
            </div>
            <h1><a href="index.html" class="logo">soundShare</a></h1>
            <ul class="list-unstyled components mb-5">
                <li class="active">
                    <a href="#"><span class="fa fa-home mr-3"><svg class="svg-icon" viewBox="0 0 20 20">
                                <path d="M18.121,9.88l-7.832-7.836c-0.155-0.158-0.428-0.155-0.584,0L1.842,9.913c-0.262,0.263-0.073,0.705,0.292,0.705h2.069v7.042c0,0.227,0.187,0.414,0.414,0.414h3.725c0.228,0,0.414-0.188,0.414-0.414v-3.313h2.483v3.313c0,0.227,0.187,0.414,0.413,0.414h3.726c0.229,0,0.414-0.188,0.414-0.414v-7.042h2.068h0.004C18.331,10.617,18.389,10.146,18.121,9.88 M14.963,17.245h-2.896v-3.313c0-0.229-0.186-0.415-0.414-0.415H8.342c-0.228,0-0.414,0.187-0.414,0.415v3.313H5.032v-6.628h9.931V17.245z M3.133,9.79l6.864-6.868l6.867,6.868H3.133z"></path>
                            </svg> </span>Homepage</a>
                </li>
                <li>
                    <a href="#"><span class="fa fa-sticky-note mr-3"><svg class="svg-icon" viewBox="0 0 20 20">
                                <path fill="none" d="M14.023,12.154c1.514-1.192,2.488-3.038,2.488-5.114c0-3.597-2.914-6.512-6.512-6.512
								c-3.597,0-6.512,2.916-6.512,6.512c0,2.076,0.975,3.922,2.489,5.114c-2.714,1.385-4.625,4.117-4.836,7.318h1.186
								c0.229-2.998,2.177-5.512,4.86-6.566c0.853,0.41,1.804,0.646,2.813,0.646c1.01,0,1.961-0.236,2.812-0.646
								c2.684,1.055,4.633,3.568,4.859,6.566h1.188C18.648,16.271,16.736,13.539,14.023,12.154z M10,12.367
								c-2.943,0-5.328-2.385-5.328-5.327c0-2.943,2.385-5.328,5.328-5.328c2.943,0,5.328,2.385,5.328,5.328
								C15.328,9.982,12.943,12.367,10,12.367z"></path>
                            </svg></span> Friends</a>
                </li>
                <li>
                    <a href="#"><span class="fa fa-sticky-note mr-3"><svg class="svg-icon" viewBox="0 0 20 20">
                                <path fill="none" d="M13.22,2.984c-1.125,0-2.504,0.377-3.53,1.182C8.756,3.441,7.502,2.984,6.28,2.984c-2.6,0-4.714,2.116-4.714,4.716c0,0.32,0.032,0.644,0.098,0.96c0.799,4.202,6.781,7.792,7.46,8.188c0.193,0.111,0.41,0.168,0.627,0.168c0.187,0,0.376-0.041,0.55-0.127c0.011-0.006,1.349-0.689,2.91-1.865c0.021-0.016,0.043-0.031,0.061-0.043c0.021-0.016,0.045-0.033,0.064-0.053c3.012-2.309,4.6-4.805,4.6-7.229C17.935,5.1,15.819,2.984,13.22,2.984z M12.544,13.966c-0.004,0.004-0.018,0.014-0.021,0.018s-0.018,0.012-0.023,0.016c-1.423,1.076-2.674,1.734-2.749,1.771c0,0-6.146-3.576-6.866-7.363C2.837,8.178,2.811,7.942,2.811,7.7c0-1.917,1.554-3.47,3.469-3.47c1.302,0,2.836,0.736,3.431,1.794c0.577-1.121,2.161-1.794,3.509-1.794c1.914,0,3.469,1.553,3.469,3.47C16.688,10.249,14.474,12.495,12.544,13.966z"></path>
                            </svg></span> My playlists</a>
                </li>
                <li>
                    <a href="#"><span class="fa fa-paper-plane mr-3"><svg class="svg-icon" viewBox="0 0 20 20">
                                <path fill="none" d="M10.032,8.367c-1.112,0-2.016,0.905-2.016,2.018c0,1.111,0.904,2.014,2.016,2.014c1.111,0,2.014-0.902,2.014-2.014C12.046,9.271,11.143,8.367,10.032,8.367z M10.032,11.336c-0.525,0-0.953-0.427-0.953-0.951c0-0.526,0.427-0.955,0.953-0.955c0.524,0,0.951,0.429,0.951,0.955C10.982,10.909,10.556,11.336,10.032,11.336z"></path>
                                <path fill="none" d="M17.279,8.257h-0.785c-0.107-0.322-0.237-0.635-0.391-0.938l0.555-0.556c0.208-0.208,0.208-0.544,0-0.751l-2.254-2.257c-0.199-0.2-0.552-0.2-0.752,0l-0.556,0.557c-0.304-0.153-0.617-0.284-0.939-0.392V3.135c0-0.294-0.236-0.532-0.531-0.532H8.435c-0.293,0-0.531,0.237-0.531,0.532v0.784C7.582,4.027,7.269,4.158,6.966,4.311L6.409,3.754c-0.1-0.1-0.234-0.155-0.376-0.155c-0.141,0-0.275,0.055-0.375,0.155L3.403,6.011c-0.208,0.207-0.208,0.543,0,0.751l0.556,0.556C3.804,7.622,3.673,7.935,3.567,8.257H2.782c-0.294,0-0.531,0.238-0.531,0.531v3.19c0,0.295,0.237,0.531,0.531,0.531h0.787c0.105,0.318,0.236,0.631,0.391,0.938l-0.556,0.559c-0.208,0.207-0.208,0.545,0,0.752l2.254,2.254c0.208,0.207,0.544,0.207,0.751,0l0.558-0.559c0.303,0.154,0.616,0.285,0.938,0.391v0.787c0,0.293,0.238,0.531,0.531,0.531h3.191c0.295,0,0.531-0.238,0.531-0.531v-0.787c0.322-0.105,0.636-0.236,0.938-0.391l0.56,0.559c0.208,0.205,0.546,0.207,0.752,0l2.252-2.254c0.208-0.207,0.208-0.545,0.002-0.752l-0.559-0.559c0.153-0.303,0.285-0.615,0.389-0.938h0.789c0.295,0,0.532-0.236,0.532-0.531v-3.19C17.812,8.495,17.574,8.257,17.279,8.257z M16.747,11.447h-0.653c-0.241,0-0.453,0.164-0.514,0.398c-0.129,0.496-0.329,0.977-0.594,1.426c-0.121,0.209-0.089,0.473,0.083,0.645l0.463,0.465l-1.502,1.504l-0.465-0.463c-0.174-0.174-0.438-0.207-0.646-0.082c-0.447,0.262-0.927,0.463-1.427,0.594c-0.234,0.061-0.397,0.271-0.397,0.514V17.1H8.967v-0.652c0-0.242-0.164-0.453-0.397-0.514c-0.5-0.131-0.98-0.332-1.428-0.594c-0.207-0.123-0.472-0.09-0.646,0.082l-0.463,0.463L4.53,14.381l0.461-0.463c0.169-0.172,0.204-0.434,0.083-0.643c-0.266-0.461-0.467-0.939-0.596-1.43c-0.06-0.234-0.272-0.398-0.514-0.398H3.313V9.319h0.652c0.241,0,0.454-0.162,0.514-0.397c0.131-0.498,0.33-0.979,0.595-1.43c0.122-0.208,0.088-0.473-0.083-0.645L4.53,6.386l1.503-1.504l0.46,0.462c0.173,0.172,0.437,0.204,0.646,0.083c0.45-0.265,0.931-0.464,1.433-0.597c0.233-0.062,0.396-0.274,0.396-0.514V3.667h2.128v0.649c0,0.24,0.161,0.452,0.396,0.514c0.502,0.133,0.982,0.333,1.433,0.597c0.211,0.12,0.475,0.089,0.646-0.083l0.459-0.462l1.504,1.504l-0.463,0.463c-0.17,0.171-0.202,0.438-0.081,0.646c0.263,0.448,0.463,0.928,0.594,1.427c0.061,0.235,0.272,0.397,0.514,0.397h0.651V11.447z"></path>
                            </svg></span> Settings</a>
                </li>
                <li>
                    <a href="#"><span class="fa fa-paper-plane mr-3"><svg class="svg-icon" viewBox="0 0 20 20">
                                <path fill="none" d="M13.53,2.238c-0.389-0.164-0.844,0.017-1.01,0.41c-0.166,0.391,0.018,0.845,0.411,1.01
								c2.792,1.181,4.598,3.904,4.6,6.937c0,4.152-3.378,7.529-7.53,7.529c-4.151,0-7.529-3.377-7.529-7.529
								C2.469,7.591,4.251,4.878,7.01,3.683C7.401,3.515,7.58,3.06,7.412,2.67c-0.17-0.392-0.624-0.571-1.014-0.402
								c-3.325,1.44-5.472,4.708-5.47,8.327c0,5.002,4.069,9.071,9.071,9.071c5.003,0,9.073-4.07,9.073-9.071
								C19.07,6.939,16.895,3.659,13.53,2.238z"></path>
                                <path fill="none" d="M9.999,7.616c0.426,0,0.771-0.345,0.771-0.771v-5.74c0-0.426-0.345-0.771-0.771-0.771
								c-0.427,0-0.771,0.345-0.771,0.771v5.74C9.228,7.271,9.573,7.616,9.999,7.616z"></path>
                            </svg></span> Logout</a>
                </li>
            </ul>

        </nav>
        <!-- CONTENT -->
        <!-- <div class="container"> -->
        <section>
            <h1 class="ml-2">You are what you listen</h1>

            <div class="row d-flex justify-content-around">
                <?php
                foreach ($items as $item) {
                ?>
                    <div class="card mt-3" style="width: 500px;">
                        <?php echo video_iframe_YT($item->link) ?>
                        <div class="card-body">
                            <p>Posted by <a href=""><?php echo $item->user->username ?></a> - <?php echo $item->creationDate ?></p>
                            <h5 class="card-title"><?php echo $item->title ?></h5>
                            <p class="card-text"><?php echo $item->content ?></p>
                            <div class="row ml-auto">
                                <a href="#" class="btn btn-primary mr-2">View post</a>
                                <a href="#" class="btn btn-secondary">Add to playlist</a>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>
            <!-- </div> -->
        </section>

        <!-- Optional JavaScript -->
        <script src="script/script.js"></script>
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>