<?= $this->layout('_theme', ["title" => $title]) ?>

<?= $this->insert("widget::form", [
    "title" => "Editar Artigo",
    "subtitle" => "Edite o artigo: {$post->title}",
    "titleForm" => "Edição de <span class='text-danger'>Artigo</span>",
    "subtitleForm" => "Preencha os campos abaixo",
    "data" => $post,
    "categories" => $categories
]); ?>

