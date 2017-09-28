<?php

namespace AboutYou\Entity;


class Price
{
    /**
     * Current price.
     *
     * @var int
     */
    public $current;

    /**
     * Old price.
     *
     * @var int|null
     */
    public $old;

    /**
     * Defines if the price is sale.
     *
     * @var bool
     */
    public $isSale;

    /**
     * Variant that the price belongs to.
     *
     * @var \AboutYou\Entity\Variant
     */
    public $variant;
}
