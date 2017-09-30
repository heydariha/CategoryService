<?php

require_once __DIR__ . '/vendor/autoload.php';

use AboutYou\Service\ProductLoader;
use AboutYou\Service\validateProduct;
use AboutYou\Service\ProductServiceInterface;
use AboutYou\Service\UnorderedProductService;



class ProductFactory{
    public static function create()
    {
        return new UnorderedProductService(new ProductLoader);
    }
}

$obj    = ProductFactory::create();
$result = $obj->getProductsForCategory('Clothes');
// echo "<pre>";print_r($result);exit;