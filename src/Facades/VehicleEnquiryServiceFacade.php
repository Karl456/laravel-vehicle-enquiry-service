<?php

namespace Karl456\VehicleEnquiryService\Facades;

use Illuminate\Support\Facades\Facade;

class VehicleEnquiryServiceFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'vehicleenquiryservice';
    }
}
