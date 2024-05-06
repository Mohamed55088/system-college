<?php

namespace App\Providers;

use App\Interfaces\teacherInterface;
use App\Repository\teacherRepository;
use Illuminate\Support\ServiceProvider;

class TeacherServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(teacherInterface::class, teacherRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}