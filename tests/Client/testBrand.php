<?php

require 'vendor/autoload.php';

use Trendyol\Client\TrendyolClient;
use Trendyol\Services\ProductIntegration\BrandService;

// Trendyol Client'ı oluşturun
$client = new TrendyolClient('username', 'password', 'supplierId');

// BrandService sınıfını başlatın
$brandService = new BrandService($client);

// Tüm markaları listele
try {
    $brands = $brandService->getAllBrands(['name' => 'Adidas', 'page' => 0, 'size' => 10]);
    print_r($brands);
} catch (TrendyolException $e) {
    echo 'Error: ' . $e->getMessage();
}

// Belirli bir marka bilgisini çek
try {
    $brandId = 100; // Buraya istediğiniz marka ID'sini girin
    $brand = $brandService->getBrandById($brandId);
    print_r($brand);
} catch (TrendyolException $e) {
    echo 'Error: ' . $e->getMessage();
}
