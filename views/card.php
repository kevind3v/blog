<article class="pr-3 mt-3 col-12 col-md-6 col-lg-4">
    <div class="news-item pb-1">

        <a href="#">
            <img class="img-fluid img" src="<?= url("uploads/{$post->cover}") ?>" alt="">
        </a>

        <div class="content">
            <p class="mt-2 mb-2"><a href="#" class="category"><?= $post->categories()->title ?></a></p>

            <h5 class="news-title">
                <a href="#"><?= $post->title ?></a>
            </h5>

            <p class="news-subtitle">
                <a href="#"><?= strchars($post->subtitle, 120) ?></p>

            <p class="meta">
                <span style="opacity: 0.5;"><?= date_str($post->created_at) ?></span>
            </p>
        </div>
    </div>
</article>

