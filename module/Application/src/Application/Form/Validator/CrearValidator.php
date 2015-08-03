<?php

namespace Application\Form\Validator;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Input;

class CrearValidator extends InputFilter {

    protected $opcionesAlnum = array(
        'allowWhiteSpace' => true,
        'messages' => array(
            'notAlnum' => "El valor no es alfanumerico"
        )
    );

    public function __construct() {



        $this->add(
                array(
                    'name' => 'seudonimo',
                    'require' => true,
                    'validators' => array(
                        array(
                            'name' => 'Alnum',
                            'options' => $this->opcionesAlnum
                        )
                    ),
                    'filters' => array(
                        array(
                            'name' => 'StripTags'
                        ),
                        array(
                            'name' => 'StringTrim'
                        ),
                    )
                )
        );

        $this->add(
                array(
                    'name' => 'nombre',
                    'require' => true,
                    'validators' => array(
                        array(
                            'name' => 'Alnum',
                            'options' => $this->opcionesAlnum
                        )
                    ),
                    'filters' => array(
                        array(
                            'name' => 'StripTags'
                        ),
                        array(
                            'name' => 'StringTrim'
                        ),
                    )
                )
        );
        $this->add(
                array(
                    'name' => 'email',
                    'require' => true,
                    'filters' => array(
                        array(
                            'name' => 'StripTags'
                        ),
                        array(
                            'name' => 'StringTrim'
                        ),
                    )
                )
        );
        
    }

}
