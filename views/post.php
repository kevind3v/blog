<?= $this->layout('_theme', ["title" => $post->title]) ?>

<section class="post-section">
    <div class="cover-post" style="background-image: url('<?= url("{$post->cover}") ?>');"></div>
    <div class="post-content px-2">
        <article class="container shadow p-4">
            <div class="post-top row align-items-center justify-content-between px-3">
                <div>
                    <span class="badge post-category badge-danger"><?= $post->categories()->title ?></span>
                </div>
                <div class="post-actions">
                    <a title="Editar Artigo" href="<?= $router->route("post.form.edit", ["uri" => $post->uri]) ?>" class="btn actions edit mr-2">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                    <a title="Deletar Artigo" data-id="<?= $post->id ?>" data-action="<?= $router->route("post.delete") ?>" class="btn actions delete ml-2">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </div>
            </div>
            <div class="post-header mt-3">
                <h2 class="p__title mb-0"><?= $post->title ?></h2>
                <p class="date mb-2">
                    Criado por <a href="#">User Name</a> em
                    <b><?= date_str($post->created_at, "%d %b, %Y as %H:%M") ?></b>
                </p>
                <p class="p__subtitle"><?= $post->subtitle ?></p>
            </div>
            <div class="px-4">
                <hr>
            </div>
            <div class="post-body px-2">
                <?= $post->content ?>
            </div>
        </article>
        <article class="socials container text-center my-4">
            <a class="" href="https://www.instagram.com/kevind3v/" target="_blank" title="Instagram">
                <i class="fab fa-instagram"></i>
            </a>
            <a class="" href="https://www.linkedin.com/in/kevinssiqueira/" target="_blank" title="LinkedIn">
                <i class="fab fa-linkedin-in"></i>
            </a>
            <a class="" href="https://github.com/kevind3v" target="_blank" title="GitHub">
                <i class="fab fa-github"></i>
            </a>
            <a class="" href="mailto:kevinsiqueira.dev@gmail.com" target="_blank" title="E-mail">
                <i class="fas fa-envelope"></i>
            </a>
        </article>
    </div>
</section>


<?= $this->start("js"); ?>
<script>
    $('body').on('click', '[data-action]', function(e) {
        e.preventDefault();
        var data = $(this).data();
        const swall = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-edit-border mr-2',
                cancelButton: 'btn btn-border'
            },
            buttonsStyling: false
        })

        swall.fire({
            title: 'Excluir artigo?',
            text: 'Vai mesmo excluir o artigo??',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Deletar',
            cancelButtonText: 'Cancelar!',
        }).then((willDelete) => {
            if (willDelete.isConfirmed) {
                console.log(data.action);
                $.ajax({
                    url: data.action,
                    data: data,
                    type: 'POST',
                    dataType: 'json',
                    success: function(callback) {
                        if (callback.redirect) {
                            window.location.href = callback.redirect;
                        }
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Ops!!',
                            text: "Erro ao excluir produto",
                        });
                    },
                });
            }
        });
    });
</script>
<?= $this->end(); ?>