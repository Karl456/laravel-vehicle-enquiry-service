<?php

namespace Karl456\VehicleEnquiryService\Providers;

use Illuminate\Support\ServiceProvider;
use Karl456\VehicleEnquiryService\VehicleEnquiryService;

class VehicleEnquiryServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/vehicle-enquiry-service.php' => config_path('vehicle-enquiry-service.php'),
            ], 'config');
        }
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/vehicle-enquiry-service.php', 'vehicle-enquiry-service');

        $this->app->singleton('vehicleenquiryservice', function ($app) {
            return new VehicleEnquiryService();
        });
    }

    public function provides(): array
    {
        return ['vehicleenquiryservice'];
    }
}
