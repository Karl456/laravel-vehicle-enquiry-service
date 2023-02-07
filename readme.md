A Laravel package for getting vehicle data from the DVLA via the Vehicle Enquiry Service.

Full documentation can be found here: https://developer-portal.driver-vehicle-licensing.api.gov.uk/apis/vehicle-enquiry-service/vehicle-enquiry-service-description.html

## API Key

To obtain an API key you must submit a request here: https://register-for-ves.driver-vehicle-licensing.api.gov.uk/

## Installation

```
composer require karl456/laravel-vehicle-enquiry-service
```

Add your VES API key to your .env file

```
VEHICLE_ENQUIRY_SERVICE_KEY=
VEHICLE_ENQUIRY_SERVICE_LIVE=true/false
```

You can publish the config file with:

```php
php artisan vendor:publish --provider="Karl456\VehicleEnquiryService\Providers\VehicleEnquiryServiceProvider" --tag="config"
```

## Usage

```php

use Karl456\VehicleEnquiryService\Facades\VehicleEnquiryServiceFacade;

$response = VehicleEnquiryServiceFacade::enquire($registrationNumber);

$response->taxStatus;
```
