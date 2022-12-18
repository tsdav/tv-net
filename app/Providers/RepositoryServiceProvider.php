<?php

namespace App\Providers;

use App\Interfaces\AdminRepositoryInterface;
use App\Interfaces\PackageRepositoryInterface;
use App\Interfaces\ReportRepositoryInterface;
use App\Interfaces\TvNetRepositoryInterface;
use App\Repositories\AdminRepository;
use App\Repositories\PackageRepository;
use App\Repositories\ReportRepository;
use App\Repositories\ServiceRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ReportRepositoryInterface::class, ReportRepository::class);
        $this->app->bind(AdminRepositoryInterface::class, AdminRepository::class);
        $this->app->bind(TvNetRepositoryInterface::class, PackageRepository::class);
        $this->app->bind(TvNetRepositoryInterface::class, ServiceRepository::class);
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
