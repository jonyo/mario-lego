<?php

function template(string $name, array $vars = []): void
{
    extract($vars);
    include "templates/$name.php";
}
