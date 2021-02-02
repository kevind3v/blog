<?= $this->layout('_theme') ?>

<div class="bg-home"></div>
<section class="blog pb-5">
    <article class="blog-header container text-center">
        <h1 class="">Blog</h1>
        <p>
            Seja Bem-vindo(a) e fique a vontade!!
        </p>
        </div>
    </article>

    <article class="blog-search container">
        <form name="search" class="ml-2 ml-lg-0" action="#" method="get" enctype="multipart/form-data">
            <label class="row blog-form-search align-items-center">
                <input type="text" name="s" placeholder="Encontre um artigo:" required />
                <button class="align-self-center ml-2"></button>
            </label>
        </form>
    </article>
    <article class="blog-content container mt-3 text-center">
        <div class="empty_content">
            <img class="img-fluid mb-2" src="<?= asset('img/svg/empty.svg') ?>" alt="Vazio!!">
            <h3 class="empty_content_title">Vazio :/</h3>
            <p class="empty_content_desc">Busca por <b style="opacity: 0.5;">
                    PHP
                </b> não retornou nada :(</p>
            <a href="" title="Blog" class="btn btn-gradient py-3 px-5">Voltar ao
                blog</a>
        </div>
    </article>
    <article class="blog-content container mt-3 text-center">
        <div class="empty_content">
            <img class="img-fluid mb-3" src="<?= asset('img/svg/under.svg') ?>" alt="Vazio!!">
            <h3 class="empty_content_title">Ainda estamos trabalhando aqui!!</h3>
            <p class="empty_content_desc">O conteúdo está sendo preparado :)</p>
        </div>
    </article>
    <article class="container mt-3 text-center">
        <div class="blog_articles row">
            <?php for ($i = 0; $i < 6; $i++) : ?>
                <?= $this->insert('card') ?>
            <?php endfor; ?>
        </div>
    </article>
</section>

<!-- STYLE -->
<?= $this->start('style'); ?>
<style>
    .bg-nav {
        background: transparent;
    }
</style>
<?= $this->end(); ?>
