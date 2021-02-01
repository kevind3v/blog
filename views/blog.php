<?= $this->layout('_theme') ?>

<section class="blog pb-5">
    <article class="blog-header container text-center">
        <h1 class="">Blog</h1>
        <p>
            Seja Bem-vindo(a) ao <b class="text-danger">blog</b>. Fique a vontade!!
        </p>
        </div>
    </article>
    <div class="bg-home"></div>
    <article class="blog-search container ">
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
            <article class="pr-3 mt-2 col-12 col-md-6 col-lg-4">
                <div class="news-item pb-1">

                    <a href="#">
                        <div class="img" style="background-image: url('/assets/img/card.jpg');"> </div>
                    </a>

                    <div class="content">
                        <p class="mt-2 mb-2"><a href="#" class="category">Categoria</a></p>

                        <h5 class="news-title">
                            <a href="#">Dolore amet esse aute cillum est minim minim.</a>
                        </h5>

                        <p class="news-subtitle">
                            <a href="#">Nisi ullamco duis est nulla ipsum Lorem excepteur proident commodo laborum quis occaecat velit cupidatat.</a>
                        </p>

                        <p class="meta">
                            <a href="#" class="author">Kevin Santos</a>
                            <br>
                            <span style="opacity: 0.5;">20 Dez, 2020 - 14h30</span>
                        </p>
                    </div>
                </div>
            </article>
            <article class="pr-3  mt-2  col-12 col-md-6 col-lg-4">
                <div class="news-item pb-1">

                    <a href="#">
                        <div class="img" style="background-image: url('/assets/img/card.jpg');"> </div>
                    </a>

                    <div class="content">
                        <p class="mt-2 mb-2"><a href="#" class="category">Categoria</a></p>

                        <h5 class="news-title">
                            <a href="#">Dolore amet esse aute cillum est minim minim.</a>
                        </h5>

                        <p class="news-subtitle">
                            <a href="#">Nisi ullamco duis est nulla ipsum Lorem excepteur proident commodo laborum quis occaecat velit cupidatat.</a>
                        </p>

                        <p class="meta">
                            <a href="#" class="author">Kevin Santos</a>
                            <br>
                            <span style="opacity: 0.5;">20 Dez, 2020 - 14h30</span>
                        </p>
                    </div>
                </div>
            </article>
            <article class="pr-3 mt-2  col-12 col-md-6 col-lg-4">
                <div class="news-item pb-1">

                    <a href="#">
                        <div class="img" style="background-image: url('/assets/img/card.jpg');"> </div>
                    </a>

                    <div class="content">
                        <p class="mt-2 mb-2"><a href="#" class="category">Categoria</a></p>

                        <h5 class="news-title">
                            <a href="#">Dolore amet esse aute cillum est minim minim.</a>
                        </h5>

                        <p class="news-subtitle">
                            <a href="#">Nisi ullamco duis est nulla ipsum Lorem excepteur proident commodo laborum quis occaecat velit cupidatat.</a>
                        </p>

                        <p class="meta">
                            <a href="#" class="author">Kevin Santos</a>
                            <br>
                            <span style="opacity: 0.5;">20 Dez, 2020 - 14h30</span>
                        </p>
                    </div>
                </div>
            </article>
        </div>
    </article>
</section>