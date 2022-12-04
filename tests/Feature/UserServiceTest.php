<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Services\interface\UserInterface;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserServiceTest extends TestCase
{
    private UserInterface $userInterface;
    
    // testing untuk uji coba apakah user service provider berjalan atau tidak
    protected function setUp(): void
    {
        parent::setUp();

        $this->userInterface = $this->app->make(UserInterface::class);
    }

    public function testSample()
    {
        $this->assertTrue(true);
    }

    public function testLogin()
    {
        // cek jika username virgo dan password Abc12345 benar, maka return true
        self::assertTrue($this->userInterface->login('virgo', 'Abc12345'));
    }

    public function testLoginUsernameNotFound()
    {
        // cek jika username virgo dan password 1234 salah, maka return false
        self::assertFalse($this->userInterface->login('test', '1234'));
    }

    public function testLoginWrongPassword()
    {
        // cek jika username virgo dan password 1234 salah, maka return false
        self::assertFalse($this->userInterface->login('virgo', '1234'));
    }
}
