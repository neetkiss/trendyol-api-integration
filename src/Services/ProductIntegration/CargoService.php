<?php

namespace Trendyol\Services\ProductIntegration;

use Trendyol\Client\TrendyolClient;
use Trendyol\Exceptions\TrendyolException;

class CargoService
{
    private $client;

    public function __construct(TrendyolClient $client)
    {
        $this->client = $client;
    }

    /**
     * Tüm kargo sağlayıcılarını çeker.
     *
     * @return array
     * @throws TrendyolException
     */
    public function getAllShipmentProviders()
    {
        $endpoint = 'shipment-providers';
        return $this->client->request('GET', $endpoint);
    }
}
