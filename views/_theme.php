<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= !empty($title) ? $title . " | blog" : "Blog" ?> </title>
    <link rel="shortcut icon" href="<?= asset('img/favicon.ico') ?>" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= package('bootstrap/dist/css/bootstrap.min.css') ?>" />
    <link rel="stylesheet" href="<?= package('boxicons/css/boxicons.min.css') ?>" />
    <link rel="stylesheet" href="<?= package('@fortawesome/fontawesome-free/css/all.min.css') ?>" />
    <link rel="stylesheet" href="<?= asset("style.min.css") ?>">
    <?= $this->section('style') ?>
</head>

<body>
    <!-- Header -->

    <header class="header navbar navbar-expand-md navbar-light bg-nav">
        <div class="container">
            <a class="navbar-brand brand" href="">
                <i class="fas fa-blog"></i>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav" aria-controls="navMobile" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="<?= url() ?>" class="nav-link link">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= url("/sobre") ?>" class="nav-link link mr-3">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= url("entrar") ?>" class="btn btn-red">
                            <i class="fas fa-plus-square mr-1"></i>Novo Artigo
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <main>
        <div class="m-header"></div>
        <?= $this->section('content') ?>
    </main>

    <!-- Footer -->
    <footer class="main-footer">
        <section class="container-fluid text-center footer-color">
            <div class="container footer-content">
                <div class="row justify-content-between">
                    <div class="col-6 copyright">
                        <ul class="list-style-none mb-0 d-flex flex-wrap">
                            <li class="mr-3">
                                &copy; <?= date('Y') ?>
                                <a href="<?= url() ?>" class="ml-1">blog</a>, Inc.
                            </li>
                        </ul>
                    </div>
                    <div class="col-6 copyright text-md-right">
                    <a class="mr-3 no-link" href="https://www.instagram.com/kevind3v/" target="_blank" title="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="mr-3 no-link" href="https://www.linkedin.com/in/kevinssiqueira/" target="_blank" title="LinkedIn">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="mr-3 no-link" href="https://github.com/kevind3v" target="_blank" title="GitHub">
                        <i class="fab fa-github"></i>
                    </a>
                </div>
                </div>
            </div>
        </section>
    </footer>

    <script src="<?= package('jquery/dist/jquery.min.js') ?>"></script>
    <script src="<?= package('popper.js/dist/popper.min.js') ?>"></script>
    <script src="<?= package('bootstrap/dist/js/bootstrap.min.js') ?>"></script>
    <script src="<?= package('boxicons/dist/boxicons.js') ?>"></script>
    <script src="<?= asset("scripts.min.js") ?>"></script>
</body>

</html>