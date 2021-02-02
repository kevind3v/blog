<?= $this->layout('_theme', ["title" => $title]) ?>

<section class="error container mt-5 mb-3 text-center">
    <div class="row align-items-start">
        <div class="col-12 col-lg-6 order-2 order-lg-1">
            <div class="error-content container text-center">
                <p class="p-error pt-4"><?= $error->code; ?></p>
                <h1><?= $error->title; ?></h1>
                <p class="error-text"><?= $error->message; ?></p>
            </div>
        </div>
        <div class="col-12 col-lg-6 text-center order-1 order-lg-2">
            <img class="img-fluid" src="<?= asset('img/svg/error.svg') ?>" alt="Error">
        </div>
    </div>
    <a class="btn btn-gradient mt-5 mb-3 py-3 px-5" title="Voltar para inicio" href="<?= url_back() ?>">Página anterior</a>
</section>
