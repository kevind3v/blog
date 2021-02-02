<?php

namespace Src\Models;

use CoffeeCode\DataLayer\DataLayer;

class Post extends DataLayer
{

    /**
     * @param bool $all = ignore status and post_at
     */
    public function __construct()
    {
        parent::__construct("posts", ["title", "subtitle", "content"]);
    }

    public function findByUri(string $uri, string $columns = "*"): ?Post
    {
        $find = $this->find("uri = :uri", "uri={$uri}", $columns);
        return $find->fetch();
    }

    public function categories(): ?Category
    {
        if ($this->category) {
            return (new Category())->findById($this->category);
        }
        return null;
    }
}
