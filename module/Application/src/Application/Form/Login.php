<?php
namespace Application\Form;

use Zend\Form\Form;
use Zend\Form\Element\Checkbox;

class Login extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('auth');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'name' => 'usr_name',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'gui-input',
            ),
        ));
        $this->add(array(
            'name' => 'usr_password',
            'attributes' => array(
                'type'  => 'password',
                                'class' => 'gui-input',
            ),
        ));
        $this->add(array(
            'name' => 'rememberme',
            'type' => 'Zend\Form\Element\Checkbox',
            'options' => array(
                'unchecked_value' => 'acepto'
            )
        ));
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Go',
                'id' => 'submitbutton',
                'class' => 'button btn-primary mr10 pull-right'
            ),
        )); 
    }
}