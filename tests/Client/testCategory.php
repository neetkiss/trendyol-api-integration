<?php

require __DIR__.'/../../vendor/autoload.php';

use Trendyol\Client\TrendyolClient;
use Trendyol\Exceptions\TrendyolException;
use Trendyol\Services\ProductIntegration\CategoryService;

// Trendyol Client'ı oluşturun
$client = new TrendyolClient('username', 'password', 'supplierId');

// CategoryService sınıfını başlatın
$categoryService = new CategoryService($client);

// Tüm kategorileri çek
try {
    $categories = $categoryService->getAllCategories();
    print_r($categories);
} catch (TrendyolException $e) {
    echo 'Error: ' . $e->getMessage();
}

// Belirli bir kategori ağacını çek (örneğin kategori ID'si 411)
try {
    $categoryTree = $categoryService->getCategoryTree(411);
    print_r($categoryTree);
} catch (TrendyolException $e) {
    echo 'Error: ' . $e->getMessage();
}
