<?= $this->layout('_theme', ["title" => $title]) ?>

<div class="bg-home"></div>
<section class="div-section py-5">
    <div class="container my-4">
        <div class="row">
            <div class="col-12 col-md-6 order-2 order-md-1">
                <div class="form-content px-4 py-4">
                    <header class="mb-2">
                        <h4 class="title">Nova <span class="text-danger">Categoria</span></h4>
                        <p class="subtitle ml-0">Preencha o campo abaixo</p>
                    </header>
                    <div class="ajax_response"></div>
                    <form method="post" id="form" action="#">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="category">Nome Categoria</label>
                                <input type="text" class="form-control" id="category" name="category" placeholder="Financeiro" />
                            </div>

                        </div>
                        <button class="btn btn-red py-2 btn-block" type="submit">Salvar Categoria</button>
                    </form>
                </div>
            </div>
            <div class="col-12 col-md-6 mb-2 order-1 order-md-2">
                <div class="form-content px-4 py-3">
                    <header class="mt-2">
                        <h5 class="title">Todas as <span class="text-danger">Categorias</span></h5>
                    </header>
                    <?php if (!empty($categories)) : ?>
                        <?php foreach ($categories as $value) : ?>
                            <a href="#" class="badge py-1 my-1 mr-1 badge-category badge-danger"><?= $value->title ?></a>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <article class="empty_content text-center">
                            <img class="img-fluid mb-3" src="<?= asset('img/svg/empty.svg') ?>" alt="Vazio!!">
                            <h5 class="empty_content_title">Sem categorias</h5>
                            <p class="empty_content_desc">Nenhum resultado encontrado :(</p>
                        </article>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-left mb-2">
                    <h5 class="bold">Cortar <span class="text-warning">Imagem</span></h5>
                </div>
                <div class="row">
                    <div class="col-11 ml-1 col-lg-7">
                        <img src="" id="image_upload">
                    </div>
                    <div class="col-12 col-lg-4 mt-2">
                        <p class="bold ml-3 mb-0">Preview</p>
                        <div class="preview"></div>
                    </div>
                </div>
                <div class="text-right mt-2">
                    <span class="close-modal" data-dismiss="modal">Cancelar</span>
                    <button type="button" id="crop" class="btn btn-yellow ml-2 px-5">Cortar Imagem</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- LINKS NAVBAR -->
<?= $this->start('navbar') ?>
<li class="nav-item">
    <a href="<?= url("nova-categoria") ?>" class="nav-link link">Nova Categoria</a>
</li>
<?= $this->end() ?>
