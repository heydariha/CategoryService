<?php

namespace AboutYou\Entity;


class Category
{
    /**
     * Id of the Category.
     *
     * @var int
     */
    public $id;

    /**
     * Name of the Category.
     *
     * @var string
     */
    public $name;

    /**
     * List of Products that belong to a Category.
     *
     * @var \AboutYou\Entity\Product[]
     */
    public $products = [];
}
