<?php

namespace Src\Models;

use CoffeeCode\DataLayer\DataLayer;

class Category extends DataLayer
{
    public function __construct()
    {
        parent::__construct("categories", ["title", "uri"]);
    }

    public function findByUri(string $uri, string $columns = "*"): ?Category
    {
        $find = $this->find("uri = :uri", "uri={$uri}", $columns);
        return $find->fetch();
    }

    public function check(string $name): bool
    {
        if ($this->findByUri(str_slug($name))) {
            return true;
        }
        return false;
    }
}
