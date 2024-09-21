<?php

namespace Trendyol\Services\QuestionAnswerIntegration;

use Trendyol\Client\TrendyolClient;
use Trendyol\Exceptions\TrendyolException;

class QuestionAnswerService
{
    private $client;

    public function __construct(TrendyolClient $client)
    {
        $this->client = $client;
    }

    /**
     * Müşteri sorularını çeker.
     *
     * @param array $query Optional query parameters such as 'startDate', 'endDate'
     * @return array
     * @throws TrendyolException
     */
    public function getCustomerQuestions(array $query = [])
    {
        $endpoint = 'suppliers/' . $this->client->getSupplierId() . '/questions';
        return $this->client->request('GET', $endpoint, [
            'query' => $query
        ]);
    }

    /**
     * Müşteri sorularını cevaplar.
     *
     * @param int $questionId - Cevaplanacak soru ID'si
     * @param array $data - Cevap verisi
     * @return array
     * @throws TrendyolException
     */
    public function answerCustomerQuestion($questionId, array $data)
    {
        $endpoint = 'suppliers/' . $this->client->getSupplierId() . '/questions/' . $questionId . '/answers';
        return $this->client->request('POST', $endpoint, [
            'json' => $data
        ]);
    }
}
