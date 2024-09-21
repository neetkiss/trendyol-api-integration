<?php

namespace Trendyol\Services\ProductIntegration;

use Trendyol\Client\TrendyolClient;

class ProductService
{
    private $client;

    public function __construct(TrendyolClient $client)
    {
        $this->client = $client;
    }

    public function getProducts(array $query = [])
    {
        $supplierId = $this->client->getSupplierId();
        return $this->client->request('GET', "suppliers/{$supplierId}/products", [
            'query' => $query
        ]);
    }

    public function createProduct(array $productData)
    {
        $supplierId = $this->client->getSupplierId();
        return $this->client->request('POST', "suppliers/{$supplierId}/products", [
            'json' => $productData
        ]);
    }

    public function updateProduct($productId, array $productData)
    {
        $supplierId = $this->client->getSupplierId();
        return $this->client->request('PUT', "suppliers/{$supplierId}/products/{$productId}", [
            'json' => $productData
        ]);
    }
}
