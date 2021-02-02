<?= $this->layout('_theme', ["title" => $title]) ?>

<section class="jumbotron pt-5 pb-4 bg-white">
    <h6 class="section-intro mb-5">Blog</h6>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-sm-12 col-lg-6">
                <img alt="Imagem Sobre" class="img-fluid" src="<?= asset("img/svg/about.svg") ?>">
            </div>
            <div class="col-12 d-md-none">
                <hr>
            </div>
            <div class="col-sm-12 col-lg-6 mt-lg-2">
                <h1 class="title">SOBRE O
                    <br><span>blog</span>?
                </h1>
                <p class="subtitle ml-0">
                    Projeto desenvolvido em <b>PHP</b>, <b>HTML</b> e <b>CSS</b> com <b>Bootstrap</b>. Tem como objetivo listar artigos em uma
                    plataforma simples e muito intuitiva, onde você poderá cadastrar um artigo novo.
                </p>
            </div>
        </div>
    </div>
</section>
<h6 class="section-intro">Criador do blog</h6>
<section class="about jumbotron py-4 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="img-thumb">
                    <img alt="Kevin Siqueira" class="img-fluid" src="https://github.com/kevind3v.png">
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="profile-wrapper">
                    <h3>Fala Dev</h3>
                    <p>
                        Sou um jovem técnico em Informática e Desenvolvimento de Sistemas tendo
                        inicio em 2018, atualmente sou estudante de análise e desenvolvimento de sistemas.
                        Desenvolvi vários projetos acadêmicos, sempre conversando sobre a experiência do usuário
                        e a qualidade do código.
                    </p>
                    <p>
                        A proposta do layout foi criar um blog, tendo o principal objetivo agregar mais um projeto
                        para meu portfolio. (Esse projeto foi desenvolvido em php puro na estrutura MVC.)
                    </p>
                    <div class="about-profile">
                        <ul>
                            <li>Nome:<span class="detail">Kevin Siqueira</span></li>
                            <li>Usuário:<span class="detail">@kevind3v</span></li>
                            <li>Idade:<span class="detail">18 anos</span></li>
                            <li>Bio:<span class="detail">Estudante e Desenvolvedor Full Stack</span></li>
                            <li>Localização:<span class="detail">São Paulo - Brasil</span></li>
                            <li>E-mail:<a href="mailto:kevinsiqueira.dev@gmail.com" class="detail">kevinsiqueira.dev@gmail.com</a></li>
                        </ul>
                        <div class="row socials">
                            <span>
                                <a href="https://www.instagram.com/kevind3v/" target="_blank" title="Instagram">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </span>
                            <span>
                                <a href="https://www.linkedin.com/in/kevinssiqueira/" target="_blank" title="LinkedIn">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </span>
                            <span>
                                <a href="https://medium.com/@kevind3v" target="_blank" title="Medium">
                                    <i class="fab fa-medium-m"></i>
                                </a>
                            </span>
                            <span>
                                <a href="https://github.com/kevind3v" target="_blank" title="GitHub">
                                    <i class="fab fa-github"></i>
                                </a>
                            </span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<h6 class="section-intro">Ficou com dúvida</h6>
<section class="faq mb-5">
    <div class="content container text-center">
        <img src="<?= asset("img/svg/faq.svg") ?>" width="250" class="img-fluid mb-3" alt="Faq" />
        <header>
            <h5 class="title">
                <span>Perguntas</span> frequentes:
            </h5>
            <p class="subtitle ml-0">
                Confira as principais dúvidas e repostas sobre o <b>blog</b>.
            </p>
        </header>
        <div class="row">
            <article class="col-12 col-md-6">
                <div class="collapse-content">
                    <div data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1" class="collapse-item row justify-content-between">
                        Consequat irure laborum?
                    </div>

                    <div style="font-size: var(--font-small)" class="collapse mt-3" id="collapseExample1">
                        <p align="left" style="margin: 0">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life
                            accusamus terry richardson ad squid. Nihil anim keffiyeh
                            helvetica, craft beer labore wes anderson cred nesciunt
                            sapiente ea proident.
                        </p>
                    </div>
                </div>
            </article>
            <article class="col-12 col-md-6">
                <div class="collapse-content">
                    <div data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2" class="collapse-item row justify-content-between">
                        Consequat irure laborum?
                    </div>
                    <div style="font-size: var(--font-small); text-align: left" class="collapse mt-3" id="collapseExample2">
                        <p style="margin: 0">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life
                            accusamus terry richardson ad squid. Nihil anim keffiyeh
                            helvetica, craft beer labore wes anderson cred nesciunt
                            sapiente ea proident.
                        </p>
                    </div>
                </div>
            </article>
            <article class="col-12 col-md-6">
                <div class="collapse-content">
                    <div data-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample3" class="collapse-item row justify-content-between">
                        Consequat irure laborum?
                    </div>
                    <div style="font-size: var(--font-small); text-align: left" class="collapse mt-3" id="collapseExample3">
                        <p style="margin: 0">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life
                            accusamus terry richardson ad squid. Nihil anim keffiyeh
                            helvetica, craft beer labore wes anderson cred nesciunt
                            sapiente ea proident.
                        </p>
                    </div>
                </div>
            </article>
            <article class="col-12 col-md-6">
                <div class="collapse-content">
                    <div data-toggle="collapse" href="#collapseExample4" role="button" aria-expanded="false" aria-controls="collapseExample4" class="collapse-item row justify-content-between">
                        Consequat irure laborum?
                    </div>
                    <div style="font-size: var(--font-small); text-align: left" class="collapse mt-3" id="collapseExample4">
                        <p style="margin: 0">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life
                            accusamus terry richardson ad squid. Nihil anim keffiyeh
                            helvetica, craft beer labore wes anderson cred nesciunt
                            sapiente ea proident.
                        </p>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>