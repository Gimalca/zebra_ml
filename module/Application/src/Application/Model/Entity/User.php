<?php

namespace Application\Model\Entity;

class User {

    public $usr_id;
    public $usr_name;
    public $usr_password;
    public $usr_password_salt;
    public $usr_registration_date;
    public $usr_registration_token;
    public $usr_email_confirmed;

    public function exchangeArray($data) {
        $this->usr_id = (!empty($data['usr_id'])) ? $data['usr_id'] : null;
        $this->usr_name = (!empty($data['usr_name'])) ? $data['usr_name'] : null;
        $this->usr_password = (!empty($data['usr_password'])) ? $data['usr_password'] : null;
        $this->usr_email = (!empty($data['usr_email'])) ? $data['usr_email'] : null;
        $this->usr_password_salt = (!empty($data['usr_password_salt'])) ? $data['usr_password_salt'] : null;
        $this->usr_registration_date = (!empty($data['usr_registration_date'])) ? $data['usr_registration_date'] : null;
        $this->usr_registration_token = (!empty($data['usr_registration_token'])) ? $data['usr_registration_token'] : null;
    }

    public function getArrayCopy() {
        return get_object_vars($this);
    }

}
