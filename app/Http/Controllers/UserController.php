<?php

namespace App\Http\Controllers;

use App\Services\interface\UserInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // menggunakan dependency injection
    private UserInterface $userInterface;

    public function __construct(UserInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    public function index()
    {
        return view('login', ['title' => 'Login']);
    }

    public function dologin(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        // validate username and password
        if (empty($username) || empty($password)) {
            return view('login', ['title' => 'Login', 'error' => 'Username or password is empty']);
        } 

        if($this->userInterface->login($username, $password)) return redirect()->route('home');
    
        return view('login', ['title' => 'Login', 'error' => 'Username or password is wrong']);
    }

    public function dologout()
    {
        // 
    }
}
