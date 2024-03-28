<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To My Little Framework</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <style>
        body {
            padding: 0px !important;
            margin: 0px !important;
            box-sizing: border-box;
        }

        .container-fluid {
            padding-right: 0px;
            padding-left: 0px;
        }

    </style>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">PHP-MVC</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" target="_blank" href="https://github.com/0xearl">My Github</a>
                </li>
            </ul>
        </div>
    </nav>
    <main class="container-fluid">
        <div style="padding: 4rem 2rem; background-color: #e9ecef;">
            <h1 class="display-3">Hello, world!</h1>
            <p class="lead">Welcome to my simple MVC framework built from scratch and heavily influenced by <a target="_blank" href="https://laravel.com/">Laravel</a>.</p>
            <hr class="my-2">
            <div class="my-2">
                Here's a snippet of the code used here:
                <div class="p-2">
                    <?php
                        highlight_file('./index.php');
                    ?>
                </div>
                <hr class="my-2">
                <div>
                    <p class="lead my-2">Checkout the code <a target="_blank" href="https://github.com/0xearl/Php-Mvc">here</a></p>
                </div>
            </div>
        </div>
    </main>
</body>
</html>