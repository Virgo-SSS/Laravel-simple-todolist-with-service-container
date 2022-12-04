<?php 

namespace App\Services;

use App\Services\interface\UserInterface;


class UserService implements UserInterface
{
    private array $users = [
        // key => value
        // username => password
        'virgo' => 'Abc12345',
    ];
    public function login(string $username, string $password): bool
    {
        // cek apakah ada username dengan key $username di array users
        if(!isset($this->users[$username])) return false;
        
        // jika ada cek apakah value nya sama dengan $password
        $checkPass = $this->users[$username];
        return $password == $checkPass;
    }

}

?>