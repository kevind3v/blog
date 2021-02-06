<article class="cards">
    <div class="card mt-3" data-aos="zoom-in-up">
        <header class="card-top">
            <a href="#">
                <img class="img-fluid img" id="preview-img" src="<?= url("{$data->cover}") ?>" alt="<?= $data->title ?>">
            </a>
        </header>
        <div class="card-content">
            <div class="body container mt-2 ml-2">
                <header>
                    <a href="#" class="badge badge-category badge-red">
                        <span class="card-category"><?= $data->categories()->title ?></span>
                    </a>
                    <a href="#">
                        <h6 class="title mb-0 card-title"><?= $data->title ?></h6>
                    </a>
                    <p class="date"><?= date_str($data->created_at) ?></p>
                </header>
                <p class="subtitle">
                    <span class="card-subtitle"><?= $data->subtitle ?></span>
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
                        <span class="count-views pl-1"><?= $data->views ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>