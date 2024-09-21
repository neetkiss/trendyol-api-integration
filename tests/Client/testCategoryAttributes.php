<?php

require 'vendor/autoload.php';

use Trendyol\Client\TrendyolClient;
use Trendyol\Services\ProductIntegration\CategoryService;

// Trendyol Client'ı oluşturun
$client = new TrendyolClient('username', 'password', 'supplierId');

// CategoryService sınıfını başlatın
$categoryService = new CategoryService($client);

// Belirli bir kategoriye ait özellikleri çek
try {
    $categoryId = 411; // Buraya istediğiniz kategori ID'sini girin
    $attributes = $categoryService->getCategoryAttributes($categoryId);
    print_r($attributes);
} catch (TrendyolException $e) {
    echo 'Error: ' . $e->getMessage();
}
