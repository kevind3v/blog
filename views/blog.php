<?= $this->layout('_theme', ["title" => $search ?? ""]) ?>

<section class="section-home">
    <article class="bg-header">
        <div class="container py-2">
            <h1 class="pt-2">Blog </h1>
            <?php if (!empty($data) && !empty($search)) : ?>
                <p>Resultados da busca para <b><?= $search ?></b></p>
            <?php else : ?>
                <p> Seja bem-vindo(a) e fique a vontade!! </p>
            <?php endif; ?>
        </div>
    </article>

    <article class="filters">
        <div class="container py-3 text-center text-md-left">
            <div class="row justify-content-between">
                <div class="col-12 col-md-8 order-2 order-md-1">
                    <button data-toggle="collapse" href="#showCategories" role="button" aria-expanded="false" aria-controls="collapseExample1" class="collapse-item btn-category align-items-center">
                        <i class='bx bxs-category'></i>
                        <span>Categoria</span>
                    </button>
                    <span class="mx-2 space">|</span>
                    <a href="<?= url() ?>" class="current">Todos</a>
                </div>
                <div class="col-12 col-md-4 order-1 order-md-2 my-3 my-md-0">
                    <form class="search-box form-content" action="<?= $router->route("web.search") ?>" method="get" enctype="multipart/form-data">
                        <input type="text" value="<?= $search ?? "" ?>" name="search" required placeholder="Buscar artigo...">
                        <button class="btn-search">
                            <i class='bx bx-search-alt'></i>
                        </button>
                    </form>
                </div>
                <div class="col-12 text-left order-2 collapse" id="showCategories">
                    <?php if (!empty($categories)) : ?>
                        <?php foreach ($categories as $value) : ?>
                            <a href="<?= $router->route("web.by.category", ["category" => $value->uri]) ?>" data-aos="fade-down" class="badge py-1 my-1 mr-1 badge-category badge-danger">
                                <?= $value->title ?>
                            </a>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <article class="empty_content">
                            <p class="empty_content_desc">Ainda não tem categoria cadastrada.
                                <a class="text-danger" href="<?= $router->route("web.category") ?>"><b>Criar categoria</b></a>
                            </p>
                        </article>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </article>

    <article class="container mt-3">
        <h4 class="count-result mb-0" data-aos="zoom-in">
            Total de <?= $data->count, ($data->count == 1) ? ' artigo' : ' artigos' ?>
            <?php if (!empty($search) || !empty($category)) : ?>
                para <span><?= $search ?? $category ?></span>
            <?php endif; ?>
        </h4>
    </article>

    <?php if (empty($data->posts) && !empty($search)) : ?>
        <article class="empty container text-center mt-1">
            <div class="empty_content">
                <img data-aos="fade-up" class="img-fluid mb-2" src="<?= asset('img/svg/empty.svg') ?>" alt="Vazio!!">
                <h3 data-aos="zoon-out">Vazio :/</h3>
                <p data-aos="zoom-in">Busca por <b style="opacity: 0.5;"><?= $search ?></b> não retornou nada :(</p>
                <a data-aos="fade-down" href="" title="Blog" class="btn btn-gradient py-2 px-5">Voltar</a>
            </div>
        </article>
    <?php elseif (empty($data->posts)) : ?>
        <article class="empty container text-center mt-1">
            <div class="empty_content">
                <img data-aos="fade-down" class="img-fluid mb-4" src="<?= asset('img/svg/under.svg') ?>" alt="Sem Artigos">
                <h3 data-aos="zoom-in">Sem artigos!</h3>
                <p data-aos="zoom-out">Ainda não possuímos artigos publicados :(</p>
            </div>
        </article>
    <?php else : ?>
        <article class="cards container mt-1">
            <div class="row">
                <?php foreach ($data->posts as $post) : ?>
                    <?= $this->insert("widget::card", ["post" => $post, "router" => $router]); ?>
                <?php endforeach; ?>
            </div>
            <?= $data->paginator ?>
        </article>
    <?php endif; ?>

</section>