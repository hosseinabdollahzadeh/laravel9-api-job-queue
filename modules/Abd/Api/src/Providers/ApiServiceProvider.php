<?php
namespace Abd\Api\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ApiServiceProvider extends ServiceProvider
{
    public $namespace = "Abd\Api\Http\Controllers";
    public function register()
    {
        Route::middleware("web")->namespace($this->namespace)->group(__DIR__ . "/../Routes/api_routes.php");
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
    }

    public function boot()
    {

    }
}
