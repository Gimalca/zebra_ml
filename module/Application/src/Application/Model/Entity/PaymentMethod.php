<?php 
namespace Application\Model\Entity;

class PaymentMethod
{
    public $payment_method_id;
    public $name;
    
    public function exchangeArray($data=NULL)
    {
        $this->payment_method_id = (isset($data['payment_method_id'])) ? $data['payment_method_id'] : null;
        $this->name     = (isset($data['name'])) ? $data['name'] : null;

    }
    public function getArrayCopy() {
        return get_object_vars($this);
    }
}