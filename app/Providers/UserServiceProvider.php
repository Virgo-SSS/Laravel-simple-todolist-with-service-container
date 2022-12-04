<?php

namespace App\Providers;

use App\Services\UserService;
use Illuminate\Support\ServiceProvider;
use App\Services\interface\UserInterface;
use Illuminate\Contracts\Support\DeferrableProvider;

class UserServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        // teknik membuat singleton menggunakan property singletons, 
        // ini sama saja seperti di function register() 
        // bisa lihat di materi folder serviceContainter
        
        // beritahu laravel tolong bikin object userinterface tapi dalam bentuk userservice
        UserInterface::class => UserService::class, 

        // jangan lupa setelah membuat serviceProvider, service provider nya di daftarkan
        // di config/app.php, bagian  Application Service Providers...
    ];

    // deferaable untuk membuat agar provider ini hanya di panggil ketka di butuh kan
    public function provides(): array
    {
        return [UserInterface::class];
    }

    
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {   
        // ini sama seperti di property $singletons, bisa lihat di materi folder 
        // beritahu laravel tolong bikin object userinterface tapi dalam bentuk userservice
        
        // $this->app->singleton(UserInterface::class, UserService::class);

        // jangan lupa setelah membuat serviceProvider, service provider nya di daftarkan
        // di config/app.php, bagian  Application Service Providers...
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
