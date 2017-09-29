<?php

namespace AboutYou\Service;


/**
* This class validats Category
**/
class validateCategory implements ValidationServiceInterface
{
    /**
    * This method validats Category
    *
    *  @param $object
    *
    *  @return boolean
    **/

    public function validateEntity($obj)
    {
        $mask   = '/[^a-z_0-9]/i';
        if(preg_match($mask, $obj->id) || preg_match($mask, $obj->name))
        {
          die("not valid string for Category name or ID");
        }
        return true;
    }
}

/**
* This class validats PRODUCTION
**/
class validateProduct implements ValidationServiceInterface
{
    /**
    * This method validats Product
    *
    *  @param $object
    *
    *  @return boolean
    **/

    public function validateEntity($obj)
    {
        if(preg_match('/[^0-9]/i', $obj->id))
        {
          die("not valid string for Product ID \n".sprintf('Please check %s ', $obj->id));
        }

        if(preg_match('/[^a-z\'_\- \"0-9]/i', $obj->name))
        {
          die("not valid string for Product name \n".sprintf('Please check %s', $obj->name));
        }

        if(preg_match('/[^a-z\'_\- \"0-9]/i', $obj->description))
        {
          die("not valid string for Product description \n".sprintf('Please check %s', $obj->description));
        }
        return true;
    }
}


/**
* This class validats Variant
**/
class validateVariant implements ValidationServiceInterface
{
    /**
    * This method validats Variant
    *
    *  @param $object
    *
    *  @return boolean
    **/

    public function validateEntity($obj)
    {
        // echo "<pre>";print_r($obj);exit;
        if(preg_match('/[^0-9]/i', $obj->id))
        {
            die("not valid string for Variant ID \n".sprintf('Please check %s ', $obj->id));
        }

        if(!is_bool($obj->isDefault))
        {
            die("not valid isDefault for Variant \n".sprintf('Please check %s ', $obj->isDefault));
        }

        if(!is_bool($obj->isAvailable))
        {
            die("not valid isAvailable for Variant \n".sprintf('Please check %s ', $obj->isAvailable));
        }

        if(!is_numeric($obj->quantity))
        {
            die("not valid isAvailable for Variant \n".sprintf('Please check %s ', $obj->quantity));
        }

        if(!is_numeric($obj->size) && !in_array(strtolower($obj->size),array("s","m","l","xl","xxl","xxxl")))
        {
            die("not valid isAvailable for Variant \n".sprintf('Please check %s ', $obj->size));
        }
        return true;
    }
}


/**
* This class validats Price
**/
class validatePrice implements ValidationServiceInterface
{
    /**
    * This method validats Price
    *
    *  @param $object
    *
    *  @return boolean
    **/

    public function validateEntity($obj)
    {
        if(!is_numeric($obj->current) )
        {
            die("not valid current for Price \n".sprintf('Please check %s ', $obj->current));
        }

        if(!is_numeric($obj->old) && $obj->old!='' )
        {
            die("not valid old Price \n".sprintf('Please check {%s} ', $obj->old));
        }

        if(!is_bool($obj->isSale))
        {
            die("not valid isSale for Price \n".sprintf('Please check {%s} ', $obj->isSale));
        }

        return true;
    }
}