<!doctype html>
<html lang="FR-fr">

{% include '../templates/head.php' %}

<body>
    {% include '../templates/navbar.php' %}

    <div class="card col-6 p-5 mt-5 shadow mb-5 bg-white rounded text-center mx-auto">
        <form method="POST" class="/login">
            <h3 class="text-muted">Sign in</h3>
            <?php
            if (isset($errorMsg)) {
                echo "<div class='alert alert-warning' role='alert'>$errorMsg</div>";
            }
            ?>
            <svg class="bi bi-box-arrow-in-right text-muted" width="3em" height="3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8.146 11.354a.5.5 0 010-.708L10.793 8 8.146 5.354a.5.5 0 11.708-.708l3 3a.5.5 0 010 .708l-3 3a.5.5 0 01-.708 0z" clip-rule="evenodd" />
                <path fill-rule="evenodd" d="M1 8a.5.5 0 01.5-.5h9a.5.5 0 010 1h-9A.5.5 0 011 8z" clip-rule="evenodd" />
                <path fill-rule="evenodd" d="M13.5 14.5A1.5 1.5 0 0015 13V3a1.5 1.5 0 00-1.5-1.5h-8A1.5 1.5 0 004 3v1.5a.5.5 0 001 0V3a.5.5 0 01.5-.5h8a.5.5 0 01.5.5v10a.5.5 0 01-.5.5h-8A.5.5 0 015 13v-1.5a.5.5 0 00-1 0V13a1.5 1.5 0 001.5 1.5h8z" clip-rule="evenodd" />
            </svg>
            <div class="form-group">
                <label for="usernameInput"></label>
                <input type="text" class="form-control" id="usernameInput" name="username" placeholder="Username" required="">
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="passwordInput"></label>
                    <input type="password" class="form-control" id="passwordInput" name="password" placeholder="Password" required="">
                </div>
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-block btn-secondary">Login</button>
                </div>
        </form>

        <!-- Optional JavaScript -->

        {% include '../templates/script.php' %}
</body>

</html>