<?= $this->layout('_theme', ["title" => $title]) ?>

<?= $this->start('navbar') ?>
<li class="nav-item">
    <a href="<?= url() ?>" class="nav-link link">Nova Categoria</a>
</li>
<?= $this->end() ?>

<div class="bg-home"></div>
<section class="div-section pt-3">
    <div class="form-content container my-4 px-4 py-4">
        <div class="row">
            <div class="col-12 col-md-6">
                <header class="mb-2">
                    <h4 class="title">Novo <span class="text-danger">Artigo</span></h4>
                    <p class="subtitle ml-0">Preencha os campos abaixo</p>
                </header>
                <form method="post" id="form" action="#">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="name">Titulo do artigo</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="PHP 8" />
                        </div>
                        <div class="col-12 mb-3">
                            <label for="subtitle">Subtítulo</label>
                            <textarea type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Digite o subtítulo"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7 col-sm-12 mb-3">
                            <label>Foto</label>
                            <label class="btn file" for="upload_image">Escolher Foto</label>
                            <input type="file" class="image" id="upload_image">
                            <input type="hidden" name="image" id="image-form">
                        </div>
                        <div class="col-md-5 col-sm-12 mb-3">
                            <label for="category">Categoria</label>
                            <select class="form-control" name="category" id="category">
                                <option value="#" disabled selected>Selecione...</option>

                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="content">Conteúdo</label>
                        <textarea placeholder="Digite aqui..." class="form-control" id="content" rows="5" name="content"></textarea>
                    </div>
                    <button class="btn btn-yellow btn-lg text-white btn-block" type="submit">Cadastrar produto</button>
                </form>
            </div>
            <div class="col-12 d-md-none d-lg-block col-lg-1"></div>
            <div class="col-12 col-md-6 col-lg-4">
                <header class="mt-2">
                    <h5 class="title">Preview <span class="text-danger">Card</span></h5>
                </header>
                <article class="pr-3 mt-2 ">
                    <div class="news-item pb-1">

                        <a href="#">
                            <img class="img-fluid img" src="https://via.placeholder.com/300x210" alt="">
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
                                <span style="opacity: 0.5;"><?= date_str("now") ?></span>
                            </p>
                        </div>
                    </div>
                </article>
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

<?= $this->start('js'); ?>
<script src='https://cdn.tiny.cloud/1/ano7ln2z5t36elzqajxcl0zh2swhoak771laui2lexcvpreg/tinymce/5/tinymce.min.js' referrerpolicy="origin">
</script>
<script>
    tinymce.init({
        selector: '#content',
        menubar: false,
        language: "pt_BR",
        resize: false,
        plugins: [
            'advlist autolink lists charmap print hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
            'table emoticons template paste help'
        ],
        toolbar: 'undo redo | code | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
        'bullist numlist outdent indent | print | forecolor backcolor emoticons | help ',
        content_css: 'body { font-family:"Nunito",Arial,sans-serif;  }'
    });
</script>
<?= $this->end(); ?>