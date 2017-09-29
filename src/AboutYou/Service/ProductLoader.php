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

        $obj            = new \AboutYou\Entity\Category;
        $obj->id        = $jsonArr['id'];
        $obj->name      = $jsonArr['name'];
        $validate       = new SetValidator(new validateCategory());
        $validate->validate($obj);
        $obj->products  = $this->loadProducts($jsonArr);
        return $obj->products;
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
            $validate       = new SetValidator(new validateProduct());
            $validate->validate($obj);
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
            $obj->isDefault  = $val['isDefault']?true:false;
            $obj->isAvailable = $val['isAvailable']?true:false;
            $obj->quantity   = $val['quantity'];
            $obj->size       = $val['size'];
            $validate       = new SetValidator(new validateVariant());
            $validate->validate($obj);
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
        $obj->isSale     = $priceArr['isSale']?true:false;
        $validate       = new SetValidator(new validatePrice());
        $validate->validate($obj);
        $obj->variant    = $variantObj;
        return $obj;
    }

}

class SetValidator{
    private $validator;
    public function __construct(ValidationServiceInterface $validator)
    {
        $this->validator = $validator;
    }

    public function validate($obj)
    {
        $this->validator->validateEntity($obj);
    }
}
