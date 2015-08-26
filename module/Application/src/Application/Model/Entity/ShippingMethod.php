<?php 
namespace Application\Model\Entity;

class ShippingMethod
{
    public $shipping_method_id;
    public $name;
    
    public function exchangeArray($data=NULL)
    {
        $this->shipping_method_id = (isset($data['shipping_method_id'])) ? $data['shipping_method_id'] : null;
        $this->name     = (isset($data['name'])) ? $data['name'] : null;

    }
    public function getArrayCopy() {
        return get_object_vars($this);
    }
}