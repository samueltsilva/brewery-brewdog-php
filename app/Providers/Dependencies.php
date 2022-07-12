<?php

namespace App\Providers;

use App\Interfaces\Service\CreateUserService;
use App\Interfaces\Service\LoginService;
use App\Services\CreateUserServiceImpl;
use App\Services\LoginServiceImpl;
use Illuminate\Support\ServiceProvider;

class Dependencies extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(LoginService::class, LoginServiceImpl::class);
        $this->app->bind(CreateUserService::class, CreateUserServiceImpl::class);
    }
}
