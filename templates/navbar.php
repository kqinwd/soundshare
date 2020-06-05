<?php if (isset($_SESSION['user'])) {
    $username = $_SESSION['user']->username;
}
?>
<!-- Bootstrap NavBar -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="/display">
        <span>
            <svg class="bi bi-play" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10.804 8L5 4.633v6.734L10.804 8zm.792-.696a.802.802 0 010 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696l6.363 3.692z" clip-rule="evenodd" />
            </svg>
        </span>
        <span class="menu-collapsed">SoundShare</span>
    </a>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto">
            <?php
            if (isset($_SESSION['user'])) {
            ?>
                <li class="nav-item d-sm-none d-lg-block">
                    <a class="nav-link text-light">Welcome back <?php echo $username ?> !</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout" role="button"><span class="mr-1"><svg class="bi bi-power" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M5.578 4.437a5 5 0 104.922.044l.5-.866a6 6 0 11-5.908-.053l.486.875z" clip-rule="evenodd" />
                                <path fill-rule="evenodd" d="M7.5 8V1h1v7h-1z" clip-rule="evenodd" />
                            </svg></span>Logout</a>
                </li>

            <?php
            } else {
            ?>
                <li class="nav-item">
                    <a class="nav-link" href="/login"><span class="mr-1"><svg class="bi bi-power" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M5.578 4.437a5 5 0 104.922.044l.5-.866a6 6 0 11-5.908-.053l.486.875z" clip-rule="evenodd" />
                                <path fill-rule="evenodd" d="M7.5 8V1h1v7h-1z" clip-rule="evenodd" />
                            </svg></span>Log in</a>
                </li>
                <!-- Sign Up -->
                <li class="nav-item">
                    <a class="nav-link" href="/register"><span class="mr-1">Sign up</a>
                </li>
            <?php
            }
            ?>

            <!-- This menu is hidden in bigger devices with d-sm-none. 
           The sidebar isn't proper for smaller screens imo, so this dropdown menu can keep all the useful sidebar itens exclusively for smaller screens  -->
            <li class="nav-item dropdown d-sm-block d-md-block d-lg-none">
                <a class="nav-link dropdown-toggle" href="#" id="smallerscreenmenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Menu </a>
                <div class="dropdown-menu" aria-labelledby="smallerscreenmenu">
                    <a class="dropdown-item" href="#top">Profile</a>
                    <a class="dropdown-item" href="#top">Playlists</a>
                    <a class="dropdown-item" href="#top">Friends</a>
                </div>
            </li><!-- Smaller devices menu END -->
            <li class="nav-item ml-3">
                <form class="form-inline">
                    <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
                    <!-- <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button> -->
                </form>
            </li>
        </ul>
    </div>
</nav><!-- NavBar END -->