<?php 
namespace Application\Model\Entity;

class Admin
{
    public $seudonimo;
    public $nombre;
    public $email;


    public function exchangeArray($data=NULL)
    {
        $this->seudonimo     = (isset($data['seudonimo'])) ? $data['seudonimo'] : null;
        $this->nombre = (isset($data['nombre'])) ? $data['nombre'] : null;
        $this->email  = (isset($data['email'])) ? $data['email'] : null;

    }
    public function getArrayCopy() {
        return get_object_vars($this);
    }
}