<?php

namespace Trendyol\Services\OrderIntegration;

use Trendyol\Client\TrendyolClient;
use Trendyol\Exceptions\TrendyolException;

class OrderService
{
    private $client;

    public function __construct(TrendyolClient $client)
    {
        $this->client = $client;
    }

    public function getOrders(array $query = [])
    {
        $endpoint = 'suppliers/' . $this->client->getSupplierId() . '/orders';
        return $this->client->request('GET', $endpoint, [
            'query' => $query
        ]);
    }

    public function updateShippingCode($orderId, array $data)
    {
        $endpoint = 'suppliers/' . $this->client->getSupplierId() . '/orders/' . $orderId . '/shipment';
        return $this->client->request('PUT', $endpoint, [
            'json' => $data
        ]);
    }

    public function updatePackageStatus($orderId, $status, array $data)
    {
        $endpoint = 'suppliers/' . $this->client->getSupplierId() . '/orders/' . $orderId . '/status/' . $status;
        return $this->client->request('PUT', $endpoint, [
            'json' => $data
        ]);
    }

    public function cancelOrderPackageItem($orderId, array $data)
    {
        $endpoint = 'suppliers/' . $this->client->getSupplierId() . '/orders/' . $orderId . '/cancellation';
        return $this->client->request('PUT', $endpoint, [
            'json' => $data
        ]);
    }

    public function sendInvoiceLink($orderId, array $data)
    {
        $endpoint = 'suppliers/' . $this->client->getSupplierId() . '/orders/' . $orderId . '/invoices';
        return $this->client->request('POST', $endpoint, [
            'json' => $data
        ]);
    }

    public function splitOrderPackageItem($orderId, array $data)
    {
        $endpoint = 'suppliers/' . $this->client->getSupplierId() . '/orders/' . $orderId . '/split';
        return $this->client->request('POST', $endpoint, [
            'json' => $data
        ]);
    }

    public function changeCargoProvider($orderId, array $data)
    {
        $endpoint = 'suppliers/' . $this->client->getSupplierId() . '/orders/' . $orderId . '/change-cargo-provider';
        return $this->client->request('POST', $endpoint, [
            'json' => $data
        ]);
    }
}
