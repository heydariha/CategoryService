<?php

namespace AboutYou\Service;

/**
 * The implementation is responsible for resolving the id of the category from the
 * given category name (in this simple case via an array of CategoryName => id). The second
 * responsibility is to sort the returning result from the category service in whatever
 * way. 
 * 
 * This breaks with the rule of the separation of concerns, but for this test case we want to
 * keep it simple.
 */
interface ProductServiceInterface
{
    /**
     * Get Products by Category name.
     *
     * @param string $categoryName
     *
     * @return \AboutYou\Entity\Product[]
     *
     * @throws \InvalidArgumentException if category name is unknown.
     */
    public function getProductsForCategory($categoryName);
    public function makeSortProducts(array $productsArr,$key);
}

