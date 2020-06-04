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

    <?php

    include "../templates/navbar.php";

    if (isset($_SESSION['user'])) {
        $username = $_SESSION['user']->username;
        include "../templates/sidenav.php"
    ?>

        <!-- MAIN -->
        <div class="col p-4">
            <div class="text-center">
                <h1>What about post something ?</h1>

                <a href="?action=new" class="btn btn-large btn-dark mb-5">Add music</a>

            </div>

            <section>
                <h2 class="ml-4 mb-3 font-weight-bold">Latest posts</h2>

                <div class="row justify-content-around">
                    <?php
                    foreach ($items as $item) {
                    ?>
                        <div class="card mb-5 col-sm-12 col-md-12 col-lg-4" style="max-width: 480px;">
                            <?php echo video_iframe_YT($item->link) ?>
                            <div class="card-body">
                                <a class="badge badge-dark mb-2" href="?search=<?php echo $item->genre ?>"><?php echo ($item->genre) ?></a>
                                <h5 class="card-title"><?php echo $item->title ?></h5>

                                <p class="card-text text-truncate"><?php echo htmlentities($item->content) ?>
                                </p>
                                <p class="text-secondary font-italic">Posted by <a href="?search=@<?php echo $item->user->username ?>"><?php echo $item->user->username ?></a></p>
                                <div class="row mx-auto">
                                    <a href="#" class="btn btn-primary mr-2">View post</a>
                                    <a href="#" class="btn btn-outline-secondary">Add to playlist</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </section>
        <?php } else { ?>
            <section>
                <div class="text-center">
                    <p><a href="?action=login">Login</a> or <a href="?action=register">register</a> to see the latest posts</p>
                </div>
            </section> <?php } ?>
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