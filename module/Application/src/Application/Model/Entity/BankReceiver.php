<?php 
namespace Application\Model\Entity;

class BankReceiver
{
    public $bank_receiver_id;
    public $name;

    public function exchangeArray($data=NULL)
    {
        $this->bank_receiver_id = (isset($data['bank_receiver_id'])) ? $data['bank_receiver_id'] : null;
        $this->name     = (isset($data['name'])) ? $data['name'] : null;

    }
    public function getArrayCopy() {
        return get_object_vars($this);
    }
}