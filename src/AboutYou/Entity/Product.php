<?php

namespace AboutYou\Entity;


class Product
{
    /**
     * Id of the Product.
     *
     * @var int
     */
    public $id;

    /**
     * Name of the Product.
     *
     * @var string
     */
    public $name;

    /**
     * Description of the Product.
     * 
     * @var string
     */
    public $description;

    /**
     * Unsorted list of Variants with their corresponding prices.
     * 
     * @var \AboutYou\Entity\Variant[]
     */
    public $variants = [];
}
