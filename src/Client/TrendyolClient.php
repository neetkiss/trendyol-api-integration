<?php

namespace Trendyol\Client;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Trendyol\Exceptions\TrendyolException;

class TrendyolClient
{
    private $client;
    private $supplierId;

    public function __construct($username, $password, $supplierId)
    {
        $this->client = new Client([
            'base_uri' => 'https://api.trendyol.com/sapigw/',
            'auth' => [$username, $password],
            'headers' => ['Content-Type' => 'application/json']
        ]);

        $this->supplierId = $supplierId;
    }

    public function request($method, $uri, $options = [])
    {
        try {
            $response = $this->client->request($method, $uri, $options);
            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            throw new TrendyolException($e->getMessage(), $e->getCode());
        }
    }

    public function getSupplierId()
    {
        return $this->supplierId;
    }
}
