<!doctype html>
<html lang="FR-fr">

{% include '../templates/head.php' %}

<body>

    {% include '../templates/navbar.php' %}

    <?php
    ?>
    {% include '../templates/sidenav.php' %}
    <div class="card col-6 p-5 mt-5 shadow mb-5 bg-white rounded text-center mx-auto" style="max-height: 600px;">
        <form method="POST" action="/new">
            <h3 class="text-muted">Post something</h3>
            <svg class="bi bi-headphones text-muted" width="3em" height="3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 3a5 5 0 0 0-5 5v4.5H2V8a6 6 0 1 1 12 0v4.5h-1V8a5 5 0 0 0-5-5z" />
                <path d="M11 10a1 1 0 0 1 1-1h2v4a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1v-3zm-6 0a1 1 0 0 0-1-1H2v4a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-3z" />
            </svg>
            <div class="form-group">
                <label for="titleInput"></label>
                <input type="text" class="form-control" id="titleInput" name="title" placeholder="Title">
            </div>
            <div class="form-group">
                <label for="urlInput"></label>
                <input type="url" class="form-control" id="urlInput" name="link" placeholder="Add Youtube link here">
            </div>
            <div class="form-group">
                <label for="genreInput"></label>
                <input type="text" class="form-control" id="genreInput" name="genre" placeholder="Genre">
            </div>
            <div class="form-group">
                <label for="contentInput"></label>
                <input type="text" class="form-control" id="contentInput" name="content" placeholder="Description">
            </div>
            <div class="text-center mt-5">
                <?php
                if (isset($errorMsg)) {
                    echo "<div class='alert alert-warning' role='alert'>$errorMsg</div>";
                }
                ?>
                <button type="submit" class="btn btn-block btn-secondary">Send</button>
            </div>
        </form>
    </div>

    {% include '../templates/script.php' %}
</body>

</html>