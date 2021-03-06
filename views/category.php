<?= $this->layout('_theme', ["title" => $title]) ?>

<section class="category">
    <article class="bg-header">
        <div class="container py-2">
            <h1 class="pt-2">Cadastro de categoria</h1>
            <p>Crie novas categorias para os artigos</p>
        </div>
    </article>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-lg-6 mb-3">
                <div class="form shadow p-4">
                    <header class="mb-2">
                        <h4 class="__title mb-0">Nova <span class="text-danger">Categoria</span></h4>
                        <p class="__subtitle">Preencha o campo abaixo</p>
                    </header>
                    <div class="ajax_response"></div>
                    <form method="post" class="form-content" action="#">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="name-category">Nome Categoria</label>
                                <input type="text" class="form-control" id="name-category" name="category" placeholder="Ex: Programação" />
                            </div>
                        </div>
                        <button class="btn btn-default py-2 btn-block" type="submit">Salvar Categoria</button>
                    </form>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="shadow px-4 py-3 categories">
                    <header class="mt-2 px-2">
                        <div class="row justify-content-between">
                            <h5>Todas as <b class="text-danger">Categorias</b></h5>
                            <span class="count-category"><b>Total:</b> <?= !empty($categories) ? count($categories) : 0  ?></span>
                        </div>
                    </header>
                    <?php if (!empty($categories)) : ?>
                        <?php foreach ($categories as $value) : ?>
                            <a href="#" data-aos="fade-down" class="badge py-1 my-1 mr-1 badge-category badge-danger"><?= $value->title ?></a>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <article class="empty_content text-center my-5">
                            <h5 class="empty_content_title">Sem categorias</h5>
                            <p class="empty_content_desc pb-2">O blog não possui categoria cadastrada :(</p>
                        </article>
                    <?php endif; ?>
                </div>
            </div>
        </div>
</section>