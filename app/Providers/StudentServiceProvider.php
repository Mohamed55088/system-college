<?php

namespace App\Providers;


use App\Repository\studentRepository;
use App\Interfaces\studentInterface;
use Illuminate\Support\ServiceProvider;

class StudentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(studentInterface::class, studentRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}