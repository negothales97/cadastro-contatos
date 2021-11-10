<?php

namespace App\Providers;

use App\Interfaces\AddressRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\ContactRepositoryInterface;
use App\Interfaces\PhoneNumberRepositoryInterface;
use App\Repositories\AddressRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ContactRepository;
use App\Repositories\PhoneNumberRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CategoryRepositoryInterface::class, function ($app) {
            return new CategoryRepository();
        });
        $this->app->bind(ContactRepositoryInterface::class, function ($app) {
            return new ContactRepository();
        });
        $this->app->bind(AddressRepositoryInterface::class, function ($app) {
            return new AddressRepository();
        });
        $this->app->bind(PhoneNumberRepositoryInterface::class, function ($app) {
            return new PhoneNumberRepository();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
