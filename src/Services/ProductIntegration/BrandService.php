<?php

namespace Trendyol\Services\ProductIntegration;

use Trendyol\Client\TrendyolClient;
use Trendyol\Exceptions\TrendyolException;

class BrandService
{
    private $client;

    public function __construct(TrendyolClient $client)
    {
        $this->client = $client;
    }

    /**
     * Tüm markaları çeker.
     *
     * @param array $query Optional query parameters such as 'name', 'page', 'size'
     * @return array
     * @throws TrendyolException
     */
    public function getAllBrands(array $query = [])
    {
        $endpoint = 'brands';
        return $this->client->request('GET', $endpoint, [
            'query' => $query
        ]);
    }

    /**
     * Belirli bir markayı ID ile çeker.
     *
     * @param int $brandId
     * @return array
     * @throws TrendyolException
     */
    public function getBrandById($brandId)
    {
        $endpoint = "brands/{$brandId}";
        return $this->client->request('GET', $endpoint);
    }
}
