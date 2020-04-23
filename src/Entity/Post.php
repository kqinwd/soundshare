<?php

namespace Entity;

use Entity\User;

class Post
{

    public $id;
    public $creationDate;
    public $title;
    public $genre;
    public $link;
    public $content;
    public User $user;
}
