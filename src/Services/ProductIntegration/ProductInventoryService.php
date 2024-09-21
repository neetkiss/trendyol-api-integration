<?php

namespace Trendyol\Services\ProductIntegration;

use Trendyol\Client\TrendyolClient;
use Trendyol\Exceptions\TrendyolException;

class ProductInventoryService
{
    private $client;

    public function __construct(TrendyolClient $client)
    {
        $this->client = $client;
    }

    /**
     * Ürünlerin stok ve fiyat bilgilerini günceller.
     *
     * @param int $supplierId
     * @param array $data - Stok ve fiyat bilgilerini içeren dizi
     * [
     *     'items' => [
     *         [
     *             'barcode' => '1234567890123',
     *             'quantity' => 100,
     *             'salePrice' => 99.99,
     *             'listPrice' => 109.99
     *         ]
     *     ]
     * ]
     * @return array
     * @throws TrendyolException
     */
    public function updatePriceAndInventory($supplierId, array $data)
    {
        $endpoint = "suppliers/{$supplierId}/products/price-and-inventory";
        return $this->client->request('POST', $endpoint, [
            'json' => $data
        ]);
    }
}
