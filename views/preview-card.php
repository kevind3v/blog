<article class="cards">
    <div class="card px-1 mt-3" data-aos="zoom-in-up">
        <header class="card-top">
            <a href=''>
                <img class="img-fluid img" src="<?= asset('img/card.png') ?>" alt="">
            </a>
        </header>
        <div class="card-content">
            <div class="body container mt-3 ml-2">
                <header>
                    <a href="#" class="badge badge-category badge-red">
                        <span class="card-category">Categoria</span>
                    </a>
                    <a href="#">
                        <h6 class="title mb-0 mt-4">O mundo do PHP 8</h6>
                    </a>
                    <p class="date"><?= date_str("now") ?></p>
                </header>
                <p class="subtitle">
                    <span class="card-subtitle">subtítulo</span>
                    <a href="#">Saiba Mais</a>
                </p>
            </div>
            <div class="card-footer">
                <div style="opacity: 0.5;">
                    <hr>
                </div>
                <div class="row justify-content-between">
                    <div class="share ml-4">
                        <a href="#">
                            <img src="<?= asset('img/svg/share.svg') ?>" alt="">
                        </a>
                    </div>
                    <div class="views row mr-4 pr-1">
                        <img src="<?= asset('img/svg/viewer.svg') ?>" alt="">
                        <span class="count-views pl-1">0</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>