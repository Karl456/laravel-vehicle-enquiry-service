<?php

namespace Karl456\VehicleEnquiryService;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class VehicleEnquiryService
{
    protected PendingRequest $client;

    public function __construct()
    {
        $this->client = Http::withUrlParameters(
            [
                'protocol' => 'https://',
                'test' => config()->get('vehicle-enquiry-service.live') ? '' : 'uat.',
                'url' => 'driver-vehicle-licensing.api.gov.uk/vehicle-enquiry/v1/vehicles',
            ])
            ->withHeaders([
                'x-api-key' => config()->get('vehicle-enquiry-service.key'),
            ]);
    }

    /**
     * @throws \Exception
     */
    public function enquire(string $registrationNumber)
    {
        try {
            return $this->client->post('{+protocol}{test}{+url}', [
                'registrationNumber' => $registrationNumber,
            ])->object();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
