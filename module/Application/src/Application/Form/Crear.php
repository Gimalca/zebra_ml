<?php

namespace Application\Form;

use Zend\Form\Form;
use Zend\Form\Element;

class Crear extends Form {

    public function __construct($name = NULL) {
        parent::__construct($name);

        $this->setAttribute('action', 'application/index/crear');
        $this->setAttribute('method', 'post');

//      Datos del Cliente

        $this->add(array(
            'name' => 'email',
            'attributes' => array(
                'type' => 'email',
                'id' => 'email',
                'require' => true,
                'placeholder' => 'Email de Contacto',
                'class' => 'gui-input',
            ),
        ));
        $this->add(array(
            'name' => 'nombre',
            'attributes' => array(
                'type' => 'text',
                'id' => 'nombre',
                'require' => 'true',
                'placeholder' => 'Nombre',
                'class' => 'gui-input',
            ),
        ));
        $this->add(array(
            'name' => 'seudonimo',
            'attributes' => array(
                'type' => 'text',
                'id' => 'seudonimo',
                'require' => 'true',
                'placeholder' => 'Seudonimo de Mercadolibre',
                'class' => 'gui-input',
            ),
        ));
    }

}
