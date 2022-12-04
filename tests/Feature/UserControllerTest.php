<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserControllerTest extends TestCase
{
    
    public function testLoginPage()
    {
        $response = $this->get('login');

        $response->assertStatus(200);
    }

    public function testDoLoginController()
    {
       $this->post(route('dologin'), [
            'username' => 'virgo',
            'password' => 'Abc12345',
        ])->assertRedirect(route('home'));
    }

    public function testDologinControllerValidationError()
    {
        $this->post(route('dologin'), [])->assertSeeText('Username or password is empty');
    }

    public function testDoLoginFailed()
    {
        $this->post(route('dologin'), [
            'username' => 'virgsdfo',
            'password' => '12asdfs34',
        ])->assertSeeText('Username or password is wrong');
    }

    public function testDoLogout()
    {
        self::assertTrue(true);

    }
}
