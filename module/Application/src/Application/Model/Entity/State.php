<?php 
namespace Application\Model\Entity;

class State
{
    public $state_id;
    public $name;
    public $code;
    
    public function exchangeArray($data=NULL)
    {
        $this->state_id = (isset($data['state_id'])) ? $data['state_id'] : null;
        $this->name     = (isset($data['name'])) ? $data['name'] : null;
        $this->code     = (isset($data['code'])) ? $data['code'] : null;

    }
    public function getArrayCopy() {
        return get_object_vars($this);
    }
}