<?php

namespace Trendyol\Services\OrderIntegration;

use Trendyol\Client\TrendyolClient;
use Trendyol\Exceptions\TrendyolException;

class InvoiceService
{
    private $client;

    public function __construct(TrendyolClient $client)
    {
        $this->client = $client;
    }

    /**
     * Fatura bilgisini gönderir.
     *
     * @param int $orderId
     * @param array $data - Fatura bilgileri
     * @return array
     * @throws TrendyolException
     */
    public function sendInvoiceInfo($orderId, array $data)
    {
        $endpoint = 'suppliers/' . $this->client->getSupplierId() . '/orders/' . $orderId . '/invoices';
        return $this->client->request('POST', $endpoint, [
            'json' => $data
        ]);
    }
}
