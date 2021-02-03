<?= $this->layout('_theme', ["title" => ""]) ?>
<div class="bg-home"></div>

<section class="blog pb-5 post mt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-4 mr-md-3 ml-md-4 ml-lg-5">
                <div class="blog-content px-4 pb-3 pt-4">
                    <img class="img-fluid post-cover" src="<?= url("uploads/{$post->cover}") ?>" alt="">
                    <div class="date-post mt-2">Criado em <?= date_str($post->created_at, "%d %b, %Y às %H:%M") ?></div>
                    
                    <div class="row justify-content-around mt-3">
                    <a href="" class="btn btn-edit">Editar</a>
                    <a href="" class="btn btn-delete">Excluir</a>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-sm-3 mt-md-1 col-md-7 ">
                <div class="blog-content px-4 pb-3 pt-4">
                    <h2 class="post_title"><?= $post->title ?></h2>
                    <h5 class="post_subtitle"><?= $post->subtitle ?></h5>

                    <div class="content mt-4">
                        <?= $post->content ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<article class="blog-header container text-center">


</article>