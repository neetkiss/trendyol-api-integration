<?php

require __DIR__.'/../../vendor/autoload.php';

use Trendyol\Client\TrendyolClient;
use Trendyol\Exceptions\TrendyolException;
use Trendyol\Services\ClaimIntegration\ClaimService;

// Trendyol Client'ı oluşturun
$client = new TrendyolClient('username', 'password', 'supplierId');

// ClaimService sınıfını başlatın
$claimService = new ClaimService($client);

// İade siparişlerini çekme
try {
    $returnedOrders = $claimService->getReturnedOrders(['startDate' => '2024-01-01', 'endDate' => '2024-12-31']);
    print_r($returnedOrders);
} catch (TrendyolException $e) {
    echo 'Error: ' . $e->getMessage();
}

// İade talebi oluşturma
try {
    $returnRequest = [
        'barcode' => '1234567890123',
        'quantity' => 1,
        'reasonId' => 1001 // Red sebebi ID'si
    ];
    $response = $claimService->createReturnRequest($returnRequest);
    print_r($response);
} catch (TrendyolException $e) {
    echo 'Error: ' . $e->getMessage();
}
