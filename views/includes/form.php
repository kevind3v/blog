<section class="form-article">
    <article class="bg-header">
        <div class="container py-2">
            <h1 class="pt-2"><?= $title ?></h1>
            <p><?= $subtitle ?></p>
        </div>
    </article>


    <article class="container mt-3">
        <div class="form shadow p-4">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <header class="mb-2">
                        <h4 class="__title mb-0"><?= $titleForm ?></h4>
                        <p class="__subtitle"><?= $subtitleForm ?></p>
                    </header>
                    <div class="ajax_response"></div>
                    <form method="post" class="form-content" action="#">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="title">Titulo do artigo</label>
                                <input type="text" value="<?= $data->title ?? "" ?>" class="form-control" id="post-title" name="title" placeholder="PHP 8" />
                            </div>
                            <div class="col-12 mb-3">
                                <label for="subtitle">Subtítulo</label>
                                <textarea type="text" rows="4" class="form-control" id="post-subtitle" name="subtitle" placeholder="Digite o subtítulo"><?= $data->subtitle ?? "" ?></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7 col-sm-12 mb-3">
                                <label>Foto</label>
                                <label class="btn file" for="upload_image">Escolher Foto</label>
                                <input type="file" class="image file-image" id="upload_image">
                                <input type="hidden" value="<?= $data->cover ?? "" ?>" name="image" id="image-form">
                            </div>
                            <div class="col-md-5 col-sm-12 mb-3">
                                <label for="category">Categoria</label>
                                <select class="form-control" name="category" onchange="categories(this)" id="post-category">
                                    <?php if (empty($data)) : ?>
                                        <option value="#" class="default-select">Selecione...</option>
                                    <?php else : ?>
                                        <option selected value="<?= $data->categories()->id ?>"><?= $data->categories()->title ?></option>
                                    <?php endif; ?>
                                    <?php if (!empty($categories)) : ?>
                                        <?php foreach ($categories as $value) : ?>
                                            <?php if (empty($data) || $value->id != $data->categories()->id) : ?>
                                                <option value="<?= $value->id ?>"><?= $value->title ?></option>
                                            <?php endif ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="content">Conteúdo</label>
                            <textarea placeholder="Digite aqui..." class="form-control" id="content" rows="15" name="content"><?= $data->content ?? "" ?></textarea>
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
                    <?= empty($data) ?
                        $this->insert("widget::card-form") :
                        $this->insert("widget::card-edit", ["data" => $data]) ?>
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