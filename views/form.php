<?= $this->layout('_theme', ["title" => $title]) ?>

<section class="form-article">
    <article class="bg-header">
        <div class="container py-2">
            <h1 class="pt-2">Publicar artigo</h1>
            <p>Crie novos artigos para o blog</p>
        </div>
    </article>

    <article class="container mt-3">
        <div class="form shadow p-4">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <header class="mb-2">
                        <h4 class="__title mb-0">Nova <span class="text-danger">Categoria</span></h4>
                        <p class="__subtitle">Preencha os campos abaixo</p>
                    </header>
                    <div class="ajax_response"></div>
                    <form method="post" class="form-content" action="#">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="title">Titulo do artigo</label>
                                <input type="text" class="form-control" id="post-title" name="title" placeholder="PHP 8" />
                            </div>
                            <div class="col-12 mb-3">
                                <label for="subtitle">Subtítulo</label>
                                <textarea type="text" class="form-control" id="post-subtitle" name="subtitle" placeholder="Digite o subtítulo"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7 col-sm-12 mb-3">
                                <label>Foto</label>
                                <label class="btn file" for="upload_image">Escolher Foto</label>
                                <input type="file" class="image file-image" id="upload_image">
                                <input type="hidden" name="image" id="image-form">
                            </div>
                            <div class="col-md-5 col-sm-12 mb-3">
                                <label for="category">Categoria</label>
                                <select class="form-control" name="category" onchange="categories(this)" id="post-category">
                                    <option value="#" class="default-select">Selecione...</option>
                                    <?php if (!empty($categories)) : ?>
                                        <?php foreach ($categories as $value) : ?>
                                            <option value="<?= $value->id ?>"><?= $value->title ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="content">Conteúdo</label>
                            <textarea placeholder="Digite aqui..." class="form-control" id="content" rows="5" name="content"></textarea>
                        </div>
                        <button class="btn btn-default py-2 btn-block" type="submit">Salvar artigo</button>
                    </form>
                </div>
                <div class="col-12 col-lg-1 order-2 order-lg-1"></div>
                <div class="col-12 col-md-6 col-lg-4 order-1 order-lg-2">
                    <header class="mt-2">
                        <h5 class="__title mb-0">
                            Preview <span class="text-danger">Card</span>
                        </h5>
                    </header>
                    <?= $this->insert("preview-card"); ?>
                </div>
            </div>
        </div>
    </article>
</section>



<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-left mb-2">
                    <h5 class="bold">Cortar <span class="text-danger">Imagem</span></h5>
                </div>
                <div class="row">
                    <div class="col-12 ml-1 col-lg-6">
                        <img src="" id="image_upload">
                    </div>
                    <div class="col-12 col-lg-4 mt-2 ml-lg-3">
                        <b class="ml-3 mb-0">Preview</b>
                        <div class="preview"></div>
                    </div>
                </div>
                <div class="text-right mt-2">
                    <span class="close-modal" data-dismiss="modal">Cancelar</span>
                    <button type="button" id="crop" class="btn btn-default ml-2 px-5">Cortar Imagem</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->start('js'); ?>
<script src='https://cdn.tiny.cloud/1/ano7ln2z5t36elzqajxcl0zh2swhoak771laui2lexcvpreg/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#content',
        menubar: false,
        language: 'pt_BR',
        resize: false,
        plugins: [
            'advlist autolink lists charmap print hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
            'table emoticons template paste help',
        ],
        toolbar: 'undo redo | code | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
            'bullist numlist outdent indent | print | forecolor backcolor emoticons | help ',
    });
</script>
<?= $this->end(); ?>