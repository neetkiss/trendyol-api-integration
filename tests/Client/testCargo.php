<?php

require 'vendor/autoload.php';

use Trendyol\Client\TrendyolClient;
use Trendyol\Services\ProductIntegration\CargoService;

// Trendyol Client'ı oluşturun
$client = new TrendyolClient('username', 'password', 'supplierId');

// CargoService sınıfını başlatın
$cargoService = new CargoService($client);

// Tüm kargo sağlayıcılarını listele
try {
    $shipmentProviders = $cargoService->getAllShipmentProviders();
    print_r($shipmentProviders);
} catch (TrendyolException $e) {
    echo 'Error: ' . $e->getMessage();
}
