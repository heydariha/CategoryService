<?php

require_once __DIR__ . '/vendor/autoload.php';

use AboutYou\Service\ProductLoader;
use AboutYou\Service\validateProduct;
use AboutYou\Service\ProductServiceInterface;
use AboutYou\Service\UnorderedProductService;


$obj    = new UnorderedProductService(new ProductLoader);
$result = $obj->getProductsForCategory('Clothes');
// echo "<pre>";print_r($result);exit;