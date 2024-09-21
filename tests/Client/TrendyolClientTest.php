<?php

namespace Trendyol\Tests\Client;

use PHPUnit\Framework\TestCase;
use Trendyol\Client\TrendyolClient;

class TrendyolClientTest extends TestCase
{
    public function testRequest()
    {
        $client = new TrendyolClient('username', 'password', 'supplierId');
        $this->assertInstanceOf(TrendyolClient::class, $client);
    }
}
