<?php 
namespace Application\Model\Entity;

class BankTransmitter
{
    public $bank_transmitter_id;
    public $name;

    public function exchangeArray($data=NULL)
    {
        $this->bank_transmitter_id = (isset($data['bank_transmitter_id'])) ? $data['bank_transmitter_id'] : null;
        $this->name     = (isset($data['name'])) ? $data['name'] : null;

    }
    public function getArrayCopy() {
        return get_object_vars($this);
    }
}