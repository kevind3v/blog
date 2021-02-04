<article class="col-12 col-md-6 col-lg-4">
    <div class="card px-1 mt-3" data-aos="zoom-in-up">
        <header class="card-top">
            <a href=''>
                <img class="img-fluid img" src="<?= asset('img/card.png') ?>" alt="">
            </a>
        </header>
        <div class="card-content">
            <div class="body container mt-3 ml-2">
                <header>
                    <a href="">
                        <h6 class="title">O mundo do PHP 8</h6>
                    </a>
                    <p class="date">20 Dez, 2020 - 14h30</p>
                </header>
                <p class="subtitle">
                    <?= str_chars("Anim excepteur labore eiusmod laborum Lorem Lorem est occaecat do reprehenderit. Enim ea officia consequat veniam elit tempor aute et nisi. Commodo occaecat pariatur officia ea officia culpa. Occaecat non anim anim dolore sint laborum Lorem irure adipisicing qui aute aliquip et nulla. Dolor exercitation ut pariatur deserunt do exercitation anim eiusmod qui. Nisi cillum velit esse sunt cillum in minim aute eiusmod deserunt.", 120) ?>
                    <a href="">Saiba Mais</a>
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
                        <span class="count-views pl-1">150</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>