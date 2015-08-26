<?php

namespace Application\Model\Entity;

class AdminLogin 
{

    public $usr_id;
    public $usr_name;
    public $usr_password;

    public function exchangeArray($data) {
        $this->usr_id = (!empty($data['usr_id'])) ? $data['usr_id'] : null;
        $this->usr_name = (!empty($data['usr_name'])) ? $data['usr_name'] : null;
        $this->usr_password = (!empty($data['usr_password'])) ? $data['usr_password'] : null;
    }

    public function getArrayCopy() {
        return get_object_vars($this);
    }

}
