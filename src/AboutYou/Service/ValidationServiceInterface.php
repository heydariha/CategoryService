<?php

namespace AboutYou\Service;

interface ValidationServiceInterface
{
    /**
     * This method should validats all data have benn read from data source
     * 
     * @param integer $object
     *
     * @return Boolean
     */
    public function validateEntity($object);
}
