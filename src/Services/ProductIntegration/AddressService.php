<?php

namespace Trendyol\Services\ProductIntegration;

use Trendyol\Client\TrendyolClient;
use Trendyol\Exceptions\TrendyolException;

class AddressService
{
    private $client;

    public function __construct(TrendyolClient $client)
    {
        $this->client = $client;
    }

    /**
     * Tedarikçinin iade ve sevkiyat adreslerini çeker.
     *
     * @param int $supplierId
     * @return array
     * @throws TrendyolException
     */
    public function getSupplierAddresses($supplierId)
    {
        $endpoint = "suppliers/{$supplierId}/addresses";
        return $this->client->request('GET', $endpoint);
    }
}
