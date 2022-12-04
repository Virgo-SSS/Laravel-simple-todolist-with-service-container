<?php 

namespace App\Services\interface;


interface UserInterface
{
    function login(string $username, string $password): bool;
}

?>