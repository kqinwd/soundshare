<!doctype html>
<html lang="FR-fr">

{% include '../templates/head.php' %}

</head>

<body>
    {% include '../templates/navbar.php' %}
    <?php
    // include "../templates/navbar.php";

    if (isset($_SESSION['user'])) {
        $username = $_SESSION['user']->username;
        // include "../templates/sidenav.php"
    ?>
        {% include '../templates/sidenav.php' %}
        <!-- MAIN -->
        <div class="col p-4">
            <div class="text-center">
                <h1>What about post something ?</h1>

                <a href="/new" class="btn btn-large btn-dark mb-5">Add music</a>

            </div>
            <h2 class="ml-4 mb-3 font-weight-bold">Latest posts</h2>

            <!-- DISPLAY ALL POSTS -->
            {% include '../templates/displayPost.php' %}
        <?php

    } else { ?>
            <section>
                <div class="text-center">
                    <p><a href="/login">Login</a> or <a href="/register">register</a> to see the latest posts</p>
                </div>
            </section> <?php } ?>
        </div><!-- Main Col END -->

        {% include '../templates/script.php' %}
</body>

</html>