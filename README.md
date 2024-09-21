
# Trendyol PHP API Integration

This library provides a comprehensive PHP integration with Trendyol's API, allowing developers to easily interact with various endpoints such as product management, order management, return handling, and customer question-answering.

## Installation

To install the package, use Composer:

```bash
composer require neetkiss/trendyol-api-integration
```

## Features

- **Product Integration:**
  - Manage products, prices, and stock information.
  - Retrieve category and brand information.
  - Manage product features and attributes.

- **Order Integration:**
  - Retrieve and update order information.
  - Manage shipment details and invoices.

- **Claim Integration:**
  - Retrieve return orders and handle return requests.
  - Manage return approvals and rejection reasons.

- **Question & Answer Integration:**
  - Retrieve customer questions and post answers.

## Usage

### Product Integration

```php
use Trendyol\Client\TrendyolClient;
use Trendyol\Services\ProductIntegration\ProductService;

$client = new TrendyolClient('username', 'password', 'supplierId');
$productService = new ProductService($client);

// Get all products
$products = $productService->getProducts(['page' => 1, 'size' => 50]);
print_r($products);
```

### Order Integration

```php
use Trendyol\Client\TrendyolClient;
use Trendyol\Services\OrderIntegration\OrderService;

$client = new TrendyolClient('username', 'password', 'supplierId');
$orderService = new OrderService($client);

// Get all orders
$orders = $orderService->getOrders(['status' => 'Created']);
print_r($orders);
```

### Claim Integration

```php
use Trendyol\Client\TrendyolClient;
use Trendyol\Services\ClaimIntegration\ClaimService;

$client = new TrendyolClient('username', 'password', 'supplierId');
$claimService = new ClaimService($client);

// Get all return orders
$returnOrders = $claimService->getReturnedOrders();
print_r($returnOrders);
```

### Question & Answer Integration

```php
use Trendyol\Client\TrendyolClient;
use Trendyol\Services\QuestionAnswerIntegration\QuestionAnswerService;

$client = new TrendyolClient('username', 'password', 'supplierId');
$questionAnswerService = new QuestionAnswerService($client);

// Get customer questions
$questions = $questionAnswerService->getCustomerQuestions();
print_r($questions);
```

## Contribution

Feel free to contribute to this project by submitting issues or pull requests. Any contributions are welcome!

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.
