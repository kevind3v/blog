<?= $this->layout('_theme', ["title" => $title]) ?>

<?= $this->insert("widget::form", [
    "title" => "Publicar artigo",
    "subtitle" => "Crie novos artigos para o blog",
    "titleForm" => "Novo <span class='text-danger'>Artigo</span>",
    "subtitleForm" => "Preencha os campos abaixo",
    "categories" => $categories
]); ?>
