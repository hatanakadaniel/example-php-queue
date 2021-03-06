<?php

namespace App\Providers;

use App\Services\QueueService;
use App\Services\QueueServiceRabbitMQImpl;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(QueueService::class, QueueServiceRabbitMQImpl::class);
    }
}
