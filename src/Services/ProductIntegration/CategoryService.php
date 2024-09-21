<?php

namespace Trendyol\Services\ProductIntegration;

use Trendyol\Client\TrendyolClient;
use Trendyol\Exceptions\TrendyolException;

class CategoryService
{
    private $client;

    public function __construct(TrendyolClient $client)
    {
        $this->client = $client;
    }

    /**
     * Tüm kategorileri çek.
     *
     * @param array $query
     * @return array
     * @throws TrendyolException
     */
    public function getAllCategories(array $query = [])
    {
        $endpoint = 'product-categories';
        return $this->client->request('GET', $endpoint, [
            'query' => $query
        ]);
    }

    /**
     * Belirli bir kategoriye göre kategori ağacını çek.
     *
     * @param int $categoryId
     * @return array
     * @throws TrendyolException
     */
    public function getCategoryTree($categoryId)
    {
        $endpoint = "product-categories/{$categoryId}";
        return $this->client->request('GET', $endpoint);
    }

    /**
     * Belirli bir kategoriye ait özellikleri çek.
     *
     * @param int $categoryId
     * @return array
     * @throws TrendyolException
     */
    public function getCategoryAttributes($categoryId)
    {
        $endpoint = "product-categories/{$categoryId}/attributes";
        return $this->client->request('GET', $endpoint);
    }
}
