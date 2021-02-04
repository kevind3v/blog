<?= $this->layout('_theme') ?>

<section class="section-home">
    <article class="bg-header">
        <div class="container py-2">
            <h1 class="pt-2">Blog</h1>
            <p> Seja bem-vindo(a) e fique a vontade!! </p>
        </div>
    </article>

    <article class="filters">
        <div class="container py-3 text-center text-md-left">
            <div class="row justify-content-between">
                <div class="col-12 col-md-8 order-2 order-md-1">
                    <button class="btn-category align-items-center">
                        <i class='bx bxs-category'></i>
                        <span>Categoria</span>
                    </button>
                    <span class="mx-2 space">|</span>
                    <span class="current">Todos</span>
                </div>
                <div class="col-12 col-md-4 order-1 order-md-2 my-3 my-md-0">
                    <form class="search-box" action="#" method="get" enctype="multipart/form-data">
                        <input type="text" required placeholder="Buscar artigo...">
                        <button class="btn-search">
                            <i class='bx bx-search-alt'></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </article>

    <?php if (empty($blog) && !empty($search)) : ?>
        <article class="empty container text-center mt-3">
            <div class="empty_content">
                <img data-aos="fade-up" class="img-fluid mb-2" src="<?= asset('img/svg/empty.svg') ?>" alt="Vazio!!">
                <h3 data-aos="fade-right">Vazio :/</h3>
                <p data-aos="fade-left">Busca por <b style="opacity: 0.5;">PHP</b> não retornou nada :(</p>
                <a data-aos="fade-down" href="" title="Blog" class="btn btn-gradient py-2 px-5">Voltar</a>
            </div>
        </article>
    <?php elseif (empty($blog)) : ?>
        <article class="empty container text-center mt-3">
            <div class="empty_content">
                <img data-aos="fade-down" class="img-fluid mb-4" src="<?= asset('img/svg/under.svg') ?>" alt="Sem Artigos">
                <h3 data-aos="fade-left">Sem artigos!</h3>
                <p data-aos="fade-right">Ainda não possuímos artigos publicados :(</p>
            </div>
        </article>
    <?php else : ?>
        <article class="cards container mt-3">
            <div class="row">
                <?php foreach ($blog as $post) : ?>
                    <?php $this->insert("card", ["post" => $post, "router" => $router]); ?>
                <?php endforeach; ?>
            </div>
            <?= $paginator ?>
        </article>
    <?php endif; ?>

</section>