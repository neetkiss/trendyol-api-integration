<?php

require __DIR__.'/../../vendor/autoload.php';

use Trendyol\Client\TrendyolClient;
use Trendyol\Exceptions\TrendyolException;
use Trendyol\Services\ProductIntegration\ProductInventoryService;

// Trendyol Client'ı oluşturun
$client = new TrendyolClient('username', 'password', 'supplierId');

// ProductInventoryService sınıfını başlatın
$productInventoryService = new ProductInventoryService($client);

// Stok ve fiyat bilgilerini güncelle
try {
    $supplierId = 12345; // Buraya kendi tedarikçi ID'nizi girin
    $data = [
        'items' => [
            [
                'barcode' => '1234567890123',
                'quantity' => 100,
                'salePrice' => 99.99,
                'listPrice' => 109.99
            ]
        ]
    ];
    $response = $productInventoryService->updatePriceAndInventory($supplierId, $data);
    print_r($response);
} catch (TrendyolException $e) {
    echo 'Error: ' . $e->getMessage();
}
