<?php

namespace AboutYou\Service;

/**
 * This class is an (unfinished) example implementation of an unordered product service.
 */
class UnorderedProductService implements ProductServiceInterface
{
    /**
     * @var ProductServiceInterface
     */
    // private $productService;
    private $categoryService;

    /**
     * Maps from category name to the id for the category service.
     *  
     * @var array
     */
    private $categoryNameToIdMapping = [
        'Clothes' => 17325
    ];

    /**
     * @param ProductServiceInterface $productService
     */
    // public function __construct(ProductServiceInterface $productService)
    public function __construct(CategoryServiceInterface $categoryService)
    {
    //    $this->productService = $productService;
       $this->categoryService = $categoryService;
    }

    /**
     * @inheritdoc
     */
    public function getProductsForCategory($categoryName)
    {
        if (!isset($this->categoryNameToIdMapping[$categoryName]))
        {
            throw new \InvalidArgumentException(sprintf('Given category name [%s] is not mapped.', $categoryName));
        }
        $categoryId = $this->categoryNameToIdMapping[$categoryName];
        // $productResults = $this->productService->getProductsForCategory($categoryId);
        $productResults = $this->categoryService->getProducts($categoryId);
        $productResults = $this->makeSortProducts($productResults,"description");
// echo "<pre>";print_r($productResults);exit;
    }

    public function makeSortProducts(array $productsArr,$key)
    {
        usort($productsArr, function($productA, $productB) use ($key) {
            if ($productA->$key == $productB->$key) {
                return 0;
            }
            return ($productA->$key < $productB->$key) ? -1 : 1;
        });
        return $productsArr;
    }
}
