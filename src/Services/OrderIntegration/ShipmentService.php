<?php

namespace Trendyol\Services\OrderIntegration;

use Trendyol\Client\TrendyolClient;
use Trendyol\Exceptions\TrendyolException;

class ShipmentService
{
    private $client;

    public function __construct(TrendyolClient $client)
    {
        $this->client = $client;
    }

    /**
     * Kargo bilgilerini günceller.
     *
     * @param int $orderId
     * @param array $data - Kargo bilgileri
     * @return array
     * @throws TrendyolException
     */
    public function updateShipmentInfo($orderId, array $data)
    {
        $endpoint = 'suppliers/' . $this->client->getSupplierId() . '/orders/' . $orderId . '/shipment';
        return $this->client->request('PUT', $endpoint, [
            'json' => $data
        ]);
    }
}
