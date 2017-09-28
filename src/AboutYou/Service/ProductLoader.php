<?php

namespace AboutYou\Service;

/**
 * This class is loads products service.
 */

class ProductLoader implements CategoryServiceInterface
{
    /**
    *   @param integer $categoryId
    *  
    *   @return \AboutYou\Entity\Product[]
    **/ 
    public function getProducts($categoryId)
    {
        $string = file_get_contents("./data/{$categoryId}.json");
        $jsonArr=json_decode($string,true);
        if($jsonArr['id'] != $categoryId)
            return array();
        return $this->loadProducts($jsonArr);
    }

    /**
    *   @param integer $categoryId
    *  
    *   @return \AboutYou\Entity\Product[]
    **/ 
    public function loadProducts(array $jsonArr)
    {        
        $result = array();
        foreach($jsonArr['products'] as $index=>$val)
        {
            $obj    = new \AboutYou\Entity\Product;
            $obj->id     = $index;
            $obj->name   = $val['name'];
            $obj->description   = $val['description'];
            $obj->variants   = $this->loadVariavnts($val['variants'],$obj);
            $result[]   = $obj;
        }
        return $result;
    }

    public function loadVariavnts(array $variantsArr,$productObj)
    {
        $result = array();
        foreach($variantsArr as $index=>$val)
        {
            $obj             = new \AboutYou\Entity\Variant;
            $obj->id         = $index;
            $obj->isDefault  = $val['isDefault'];
            $obj->isAvailable = $val['isAvailable'];
            $obj->quantity   = $val['quantity'];
            $obj->size       = $val['size'];
            $obj->price      = $this->loadPrice($val['price'],$obj);
            $obj->product    = $productObj;
            $result[]        = $obj;
        }
        return $result;
    }

    public function loadPrice(array $priceArr,$variantObj)
    {
        $obj             = new \AboutYou\Entity\Price;
        $obj->current    = $priceArr['current'];
        $obj->old        = $priceArr['old'];
        $obj->isSale     = $priceArr['isSale'];
        $obj->variant    = $variantObj;
        return $obj;
    }

}