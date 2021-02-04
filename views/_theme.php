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
  <link rel="stylesheet" href="<?= package("cropperjs/dist/cropper.min.css"); ?>" />
  <link rel="stylesheet" href="<?= package("sweetalert2/dist/sweetalert2.min.css"); ?>" />
  <link rel="stylesheet" href="<?= package("aos/dist/aos.css"); ?>" />
  <link rel="stylesheet" href="<?= asset("style.min.css") ?>">
  <?= $this->section('style') ?>
</head>

<body onload="loading()">

  <div id="loading">
    <div class="load_box">
      <div class="container text-center mt-5">
        <img width="100" src="<?= asset('img/svg/loading.svg'); ?>" alt="">
        <p class="load-p text-white">Aguarde...</p>
      </div>
    </div>
  </div>

  <!-- Header -->
  <header class="header navbar navbar-expand-md navbar-light py-md-2">
    <div class="container">
      <a class="navbar-brand brand" href="<?= url() ?>">
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
            <a href="<?= url("sobre") ?>" class="nav-link link">Sobre</a>
          </li>
          <?= $this->section('navbar') ?>
          <li class="nav-item">
            <a href="<?= url("novo-artigo") ?>" class="btn btn-border ml-md-3">
              <i class="fas fa-plus mr-1"></i>Novo Artigo
            </a>
          </li>
        </ul>
      </div>
    </div>
  </header>

  <main>
    <div class="margin-main"></div>
    <?= $this->section('content') ?>
  </main>

  <!-- Footer -->
  <footer class="mt-4">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-12 col-md-6 copyright order-2 order-md-1">
          &copy; <?= date('Y') ?>
          <a href="#">blog</a>.
          By <a target="_blank" href="https://www.linkedin.com/in/kevinssiqueira/">kevind3v</a>
        </div>
        <div class="col-12 col-md-6 text-center links order-1 order-md-2">
          <a class="mr-3 no-link" href="https://www.instagram.com/kevind3v/" target="_blank" title="Instagram">
            <i class="fab fa-instagram"></i>
          </a>
          <a class="mr-3 no-link" href="https://www.linkedin.com/in/kevinssiqueira/" target="_blank" title="LinkedIn">
            <i class="fab fa-linkedin-in"></i>
          </a>
          <a class="no-link" href="https://github.com/kevind3v" target="_blank" title="GitHub">
            <i class="fab fa-github"></i>
          </a>
        </div>
      </div>
    </div>
    <!-- <section class="container-fluid text-center footer-color">
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
                    
                </div>
            </div>
        </section> -->
  </footer>


  <script src="<?= package('jquery/dist/jquery.min.js') ?>"></script>
  <script src="<?= package('popper.js/dist/popper.min.js') ?>"></script>
  <script src="<?= package('bootstrap/dist/js/bootstrap.min.js') ?>"></script>
  <script src="<?= package("cropperjs/dist/cropper.min.js"); ?>"></script>
  <script src="<?= package('boxicons/dist/boxicons.js') ?>"></script>
  <script src="<?= package('jquery-form/dist/jquery.form.min.js') ?>"></script>
  <script src="<?= package('sweetalert2/dist/sweetalert2.min.js') ?>"></script>
  <script src="<?= package("aos/dist/aos.js"); ?>"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="<?= asset("scripts.min.js") ?>"></script>
  <?= $this->section('js') ?>
  <script>
    <?= alert() ?>
  </script>
</body>

</html>