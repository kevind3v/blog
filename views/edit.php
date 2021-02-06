<?= $this->layout('_theme', ["title" => $title]) ?>

<?= $this->insert("widget::form", [
    "title" => "Editar Artigo",
    "subtitle" => "Edite o artigo: {$post->title}",
    "titleForm" => "Edição de <span class='text-danger'>Artigo</span>",
    "subtitleForm" => "Preencha os campos abaixo",
    "data" => $post,
    "categories" => $categories
]); ?>

<?= $this->start('js') ?>
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
<?= $this->end() ?>