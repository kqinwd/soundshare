<?php

namespace Entity;

use Entity\User;
use ludk\Utils\Serializer;

class Post
{

    public int $id;
    public string $creationDate;
    public string $title;
    public string $genre;
    public string $link;
    public string $content;
    public User $user;

    use Serializer;
}
