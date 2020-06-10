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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="script/script.js"></script>
</body>

</html>