<?php 
namespace Application\Model\Entity;

class ShippingCourierService
{
    public $shipping_courier_service_id;
    public $name;
    
    public function exchangeArray($data=NULL)
    {
        $this->shipping_courier_service_id = (isset($data['shipping_courier_service_id'])) ? $data['shipping_courier_service_id'] : null;
        $this->name     = (isset($data['name'])) ? $data['name'] : null;

    }
    public function getArrayCopy() {
        return get_object_vars($this);
    }
}