<?php

namespace App\Providers;

use App\Interfaces\Repository\UsersRepository;
use App\Repositories\UsersRepositoryImpl;
use Illuminate\Support\ServiceProvider;

class Repositories extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(UsersRepository::class, UsersRepositoryImpl::class);
    }
}
