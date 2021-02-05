<article class="col-12 col-md-6 col-lg-4">
    <div class="card mt-3" data-aos="zoom-in-up">
        <header class="card-top">
            <a href="<?= $router->route("web.post", ["uri" => $post->uri]) ?>">
                <img class="img-fluid img" src="<?= url("uploads/{$post->cover}") ?>" alt="<?= $post->uri ?>">
            </a>
        </header>
        <div class="card-content">
            <div class="body container mt-2 ml-2">
                <header>
                    <a href="<?= $router->route("web.by.category", ["category" => $post->categories()->uri]) ?>" class="badge badge-category badge-red">
                        <span><?= $post->categories()->title ?></span>
                    </a>
                    <a href="<?= $router->route("web.post", ["uri" => $post->uri]) ?>">
                        <h6 class="title mb-0"><?= $post->title ?></h6>
                    </a>
                    <p class="date"><?= date_str($post->created_at) ?></p>
                </header>
                <p class="subtitle">
                    <?= str_chars("{$post->subtitle}", 120) ?>
                    <a href="<?= $router->route("web.post", ["uri" => $post->uri]) ?>">Saiba Mais</a>
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
                        <span class="count-views pl-1"><?= $post->views ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>