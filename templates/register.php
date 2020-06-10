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

    <?php include "../templates/navbar.php" ?>

    <div class="card col-6 p-5 mt-5 shadow mb-5 bg-white rounded text-center mx-auto">
        <form method="POST" action="/register">
            <h3 class="text-muted">Sign Up</h3>
            <svg class="bi bi-file-earmark-check text-muted" width="3em" height="3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 1H4a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h5v-1H4a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h5v2.5A1.5 1.5 0 0 0 10.5 6H13v2h1V6L9 1z" />
                <path fill-rule="evenodd" d="M15.854 10.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708l1.146 1.147 2.646-2.647a.5.5 0 0 1 .708 0z" />
            </svg>
            <div class="form-group">
                <label for="usernameRegisterInput"></label>
                <input type="text" class="form-control" id="usernameRegisterInput" name="username" placeholder="Username" required="">
            </div>
            <div class="form-group">
                <label for="passwordRegisterInput"></label>
                <input type="password" class="form-control" id="passwordRegisterInput" name="password" placeholder="Password" required="">
            </div>
            <div class="form-group">
                <label for="passwordRetypeInput"></label>
                <input type="password" class="form-control" id="passwordRetypeInput" name="passwordRetype" placeholder="Retype password" required="">
            </div>
            <div class="text-center mt-4">
                <?php
                if (isset($errorMsg)) {
                    echo "<div class='alert alert-warning' role='alert'>$errorMsg</div>";
                }
                ?>
                <button type="submit" class="btn btn-block btn-secondary">Register</button>
            </div>
        </form>
    </div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="script/script.js"></script>
</body>

</html>