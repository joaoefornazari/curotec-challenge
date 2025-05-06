<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use app\Http\Services\Interfaces\CategoryServiceInterface;
use App\Http\Services\Interfaces\ProjectServiceInterface;
use App\Http\Services\Interfaces\TaskServiceInterface;
use App\Http\Services\CategoryService;
use App\Http\Services\ProjectService;
use App\Http\Services\TaskService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProjectServiceInterface::class, ProjectService::class);
        $this->app->bind(TaskServiceInterface::class, TaskService::class);
        $this->app->bind(CategoryServiceInterface::class, CategoryService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
