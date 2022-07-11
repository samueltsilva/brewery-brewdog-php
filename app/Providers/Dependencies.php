<?php

namespace App\Providers;

use App\Interfaces\Service\LoginService;
use App\Services\LoginServiceImpl;
use Illuminate\Support\ServiceProvider;

class Dependencies extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(LoginService::class, LoginServiceImpl::class);
    }
}
