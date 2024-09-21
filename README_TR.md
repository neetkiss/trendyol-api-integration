
# Trendyol PHP API Entegrasyonu

Bu kütüphane, Trendyol'un API'si ile PHP entegrasyonunu sağlayarak geliştiricilerin ürün yönetimi, sipariş yönetimi, iade işlemleri ve müşteri sorularını cevaplama gibi çeşitli uç noktalarla kolayca etkileşimde bulunmalarını sağlar.

## Kurulum

Paketi yüklemek için Composer'ı kullanın:

```bash
composer require neetkiss/trendyol-api-integration
```

## Özellikler

- **Ürün Entegrasyonu:**
  - Ürünleri, fiyatları ve stok bilgilerini yönetin.
  - Kategori ve marka bilgilerini alın.
  - Ürün özelliklerini ve niteliklerini yönetin.

- **Sipariş Entegrasyonu:**
  - Sipariş bilgilerini alın ve güncelleyin.
  - Kargo detaylarını ve faturaları yönetin.

- **İade Entegrasyonu:**
  - İade siparişlerini alın ve iade taleplerini yönetin.
  - İade onaylarını ve red sebeplerini yönetin.

- **Soru & Cevap Entegrasyonu:**
  - Müşteri sorularını alın ve cevaplayın.

## Kullanım

### Ürün Entegrasyonu

```php
use Trendyol\Client\TrendyolClient;
use Trendyol\Services\ProductIntegration\ProductService;

$client = new TrendyolClient('kullaniciadi', 'sifre', 'tedarikciId');
$productService = new ProductService($client);

// Tüm ürünleri alın
$products = $productService->getProducts(['page' => 1, 'size' => 50]);
print_r($products);
```

### Sipariş Entegrasyonu

```php
use Trendyol\Client\TrendyolClient;
use Trendyol\Services\OrderIntegration\OrderService;

$client = new TrendyolClient('kullaniciadi', 'sifre', 'tedarikciId');
$orderService = new OrderService($client);

// Tüm siparişleri alın
$orders = $orderService->getOrders(['status' => 'Created']);
print_r($orders);
```

### İade Entegrasyonu

```php
use Trendyol\Client\TrendyolClient;
use Trendyol\Services\ClaimIntegration\ClaimService;

$client = new TrendyolClient('kullaniciadi', 'sifre', 'tedarikciId');
$claimService = new ClaimService($client);

// Tüm iade siparişlerini alın
$returnOrders = $claimService->getReturnedOrders();
print_r($returnOrders);
```

### Soru & Cevap Entegrasyonu

```php
use Trendyol\Client\TrendyolClient;
use Trendyol\Services\QuestionAnswerIntegration\QuestionAnswerService;

$client = new TrendyolClient('kullaniciadi', 'sifre', 'tedarikciId');
$questionAnswerService = new QuestionAnswerService($client);

// Müşteri sorularını alın
$questions = $questionAnswerService->getCustomerQuestions();
print_r($questions);
```

## Katkıda Bulunma

Bu projeye katkıda bulunmak için sorun bildirimi veya pull request göndererek katkıda bulunabilirsiniz. Her türlü katkı kabul edilir!

## Lisans

Bu proje MIT Lisansı ile lisanslanmıştır. Detaylar için [LICENSE](LICENSE) dosyasına bakın.
