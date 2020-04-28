<?php

namespace Entity;

use Entity\User;
use ludk\Utils\Serializer;

class Post
{

    public $id;
    public $creationDate;
    public $title;
    public $genre;
    public $link;
    public $content;
    public User $user;

    use Serializer;
}
