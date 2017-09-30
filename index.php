<?php

require_once __DIR__ . '/vendor/autoload.php';

use AboutYou\Service\ProductLoader;
use AboutYou\Service\validateProduct;
use AboutYou\Service\ProductServiceInterface;
use AboutYou\Service\UnorderedProductService;

$ProductService     = new UnorderedProductService(new ProductLoader);
$obj                = new \AboutYou\Service\ProductInjection($ProductService);
$result = $obj->product->getProductsForCategory('Clothes');
// echo "<pre>";print_r($result);exit;