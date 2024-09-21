<?php

require __DIR__.'/../../vendor/autoload.php';

use Trendyol\Client\TrendyolClient;
use Trendyol\Exceptions\TrendyolException;
use Trendyol\Services\QuestionAnswerIntegration\QuestionAnswerService;

// Trendyol Client'ı oluşturun
$client = new TrendyolClient('username', 'password', 'supplierId');

// QuestionAnswerService sınıfını başlatın
$questionAnswerService = new QuestionAnswerService($client);

// Müşteri sorularını çekme
try {
    $questions = $questionAnswerService->getCustomerQuestions(['startDate' => '2024-01-01', 'endDate' => '2024-12-31']);
    print_r($questions);
} catch (TrendyolException $e) {
    echo 'Error: ' . $e->getMessage();
}

// Müşteri sorusunu cevaplama
try {
    $questionId = 12345; // Cevaplanacak soru ID'si
    $answerData = [
        'text' => 'Bu ürünün stok durumu hakkında bilgi almak için lütfen stok kontrol panelini ziyaret edin.'
    ];
    $response = $questionAnswerService->answerCustomerQuestion($questionId, $answerData);
    print_r($response);
} catch (TrendyolException $e) {
    echo 'Error: ' . $e->getMessage();
}
