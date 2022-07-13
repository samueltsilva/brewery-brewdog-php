<?php

namespace App\Providers;

use App\Interfaces\Service\CreateUserService;
use App\Interfaces\Service\GetUserService;
use App\Interfaces\Service\LoginService;
use App\Interfaces\Service\UpdateUserService;
use App\Services\CreateUserServiceImpl;
use App\Services\GetUserServiceImpl;
use App\Services\LoginServiceImpl;
use App\Services\UpdateUserServiceImpl;
use Illuminate\Support\ServiceProvider;

class Dependencies extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(LoginService::class, LoginServiceImpl::class);
        $this->app->bind(CreateUserService::class, CreateUserServiceImpl::class);
        $this->app->bind(GetUserService::class, GetUserServiceImpl::class);
        $this->app->bind(UpdateUserService::class, UpdateUserServiceImpl::class);
    }
}
