<?php

require 'vendor/autoload.php';

use Trendyol\Client\TrendyolClient;
use Trendyol\Services\ProductIntegration\AddressService;

// Trendyol Client'ı oluşturun
$client = new TrendyolClient('username', 'password', 'supplierId');

// AddressService sınıfını başlatın
$addressService = new AddressService($client);

// Tedarikçi adreslerini listele
try {
    $supplierId = 12345; // Buraya kendi tedarikçi ID'nizi girin
    $addresses = $addressService->getSupplierAddresses($supplierId);
    print_r($addresses);
} catch (TrendyolException $e) {
    echo 'Error: ' . $e->getMessage();
}
