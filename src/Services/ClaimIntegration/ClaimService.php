<?php

namespace Trendyol\Services\ClaimIntegration;

use Trendyol\Client\TrendyolClient;
use Trendyol\Exceptions\TrendyolException;

class ClaimService
{
    private $client;

    public function __construct(TrendyolClient $client)
    {
        $this->client = $client;
    }

    /**
     * İade siparişlerini çeker.
     *
     * @param array $query Optional query parameters such as 'startDate', 'endDate'
     * @return array
     * @throws TrendyolException
     */
    public function getReturnedOrders(array $query = [])
    {
        $endpoint = 'suppliers/' . $this->client->getSupplierId() . '/returns';
        return $this->client->request('GET', $endpoint, [
            'query' => $query
        ]);
    }

    /**
     * İade talebi oluşturur.
     *
     * @param array $data - İade talebi verisi
     * @return array
     * @throws TrendyolException
     */
    public function createReturnRequest(array $data)
    {
        $endpoint = 'suppliers/' . $this->client->getSupplierId() . '/return-request';
        return $this->client->request('POST', $endpoint, [
            'json' => $data
        ]);
    }

    /**
     * İade siparişlerini onaylar.
     *
     * @param int $returnId
     * @param array $data - Onay verisi
     * @return array
     * @throws TrendyolException
     */
    public function approveReturnedOrders($returnId, array $data)
    {
        $endpoint = 'suppliers/' . $this->client->getSupplierId() . '/returns/' . $returnId . '/approve';
        return $this->client->request('PUT', $endpoint, [
            'json' => $data
        ]);
    }

    /**
     * İade siparişine red talebi oluşturur.
     *
     * @param int $returnId
     * @param array $data - Red talebi verisi
     * @return array
     * @throws TrendyolException
     */
    public function createRejectionRequestOnReturnedOrders($returnId, array $data)
    {
        $endpoint = 'suppliers/' . $this->client->getSupplierId() . '/returns/' . $returnId . '/rejection';
        return $this->client->request('POST', $endpoint, [
            'json' => $data
        ]);
    }

    /**
     * İade red sebeplerini çeker.
     *
     * @return array
     * @throws TrendyolException
     */
    public function getClaimIssueReasons()
    {
        $endpoint = 'suppliers/' . $this->client->getSupplierId() . '/return-reasons';
        return $this->client->request('GET', $endpoint);
    }
}
