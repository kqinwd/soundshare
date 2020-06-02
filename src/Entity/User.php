<?php

namespace Entity;

use ludk\Utils\Serializer;

class User
{

    public int $id;
    public string $username;
    public string $mail;
    public string $password;

    use Serializer;
}
