<?php

namespace Application\Form;

use Zend\Form\Form;
use Zend\Form\Element;

class Confirmar extends Form {

    public function __construct($name = NULL) {
        parent::__construct($name);

        $this->setAttribute('action', 'registro/confirmar');
        $this->setAttribute('method', 'post');

//      Datos del Cliente

        $this->add(array(
            'name' => 'seudonimo',
            'attributes' => array(
                'type' => 'text',
                'id' => 'seudonimo',
                'require' => true,
                'placeholder' => 'Seudonimo de Mercadolibre',
                'class' => 'gui-input',
            ),
        ));

        $nombre = New Element\Text();
        $nombre->setAttribute('name', 'nombre');
        $nombre->setAttribute('type', 'text');
        $nombre->setAttribute('id', 'nombre');
        $nombre->setAttribute('require', 'true');
        $nombre->setAttribute('class', 'gui-input');
        $nombre->setAttribute('placeholder', 'Nombre');
        $this->add($nombre);

        $this->add(array(
            'name' => 'apellido',
            'attributes' => array(
                'type' => 'text',
                'id' => 'apellido',
                'require' => 'true',
                'placeholder' => 'Apellido',
                'class' => 'gui-input',
            ),
        ));
        $this->add(array(
            'name' => 'tipoid',
            'type' => 'Zend\Form\Element\Select',
            'attributes' => array(
                'id' => 'productStockStatus',
                'class' => 'form-control gui-input',
                'style' => 'padding: 5px;'
            ),
            'options' => array(
                'value_options' => array(
                    '1' => 'V',
                    '2' => 'E',
                    '3' => 'J',
                )
            )
        ));
        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type' => 'text',
                'id' => 'id',
                'require' => 'true',
                'placeholder' => 'C.I. o RIF',
                'class' => 'gui-input',
            ),
        ));
        $this->add(array(
            'name' => 'fijo',
            'attributes' => array(
                'type' => 'tel',
                'id' => 'fijo',
                'require' => 'true',
                'placeholder' => 'Telefono Fijo',
                'class' => 'gui-input',
            ),
        ));
        $this->add(array(
            'name' => 'celular',
            'attributes' => array(
                'type' => 'tel',
                'id' => 'celular',
                'require' => 'true',
                'placeholder' => 'Telefono Celular',
                'class' => 'gui-input',
            ),
        ));
        $this->add(array(
            'name' => 'email',
            'attributes' => array(
                'type' => 'email',
                'id' => 'email',
                'require' => 'true',
                'placeholder' => 'Email',
                'class' => 'gui-input',
            ),
        ));
        $this->add(array(
            'name' => 'emailconf',
            'attributes' => array(
                'type' => 'emailconf',
                'id' => 'email',
                'require' => 'true',
                'placeholder' => 'Email',
                'class' => 'gui-input',
            ),
        ));

//      Datos del Producto

        $this->add(array(
            'name' => 'producto',
            'attributes' => array(
                'type' => 'text',
                'id' => 'producto',
                'require' => 'true',
                'placeholder' => 'Producto',
                'class' => 'gui-input',
            ),
        ));
        $this->add(array(
            'name' => 'cantidad',
            'attributes' => array(
                'type' => 'number',
                'id' => 'cantidad',
                'require' => 'true',
                'class' => 'gui-input',
                'min' => '1',
                'max' => '10',
                'value' => '1',
            ),
        ));
        $this->add(array(
            'name' => 'imagen',
            'attributes' => array(
                'type' => 'text',
                'id' => 'imagen',
                'require' => 'true',
                'placeholder' => 'Seleccione un Archivo',
                'class' => 'gui-input',
            ),
        ));
        $this->add(array(
            'name' => 'datepicker1',
            'attributes' => array(
                'type' => 'text',
                'id' => 'datepicker1',
                'require' => 'true',
                'placeholder' => 'Seleccione una Fecha',
                'class' => 'gui-input',
            ),
        ));
        $this->add(array(
            'name' => 'modelo',
            'attributes' => array(
                'type' => 'text',
                'id' => 'modelo',
                'require' => 'true',
                'placeholder' => 'Modelo',
                'class' => 'gui-input',
            ),
        ));
        $this->add(array(
            'name' => 'detalle',
            'attributes' => array(
                'type' => 'text',
                'id' => 'detalle',
                'require' => 'true',
                'placeholder' => 'Detalle del Producto',
                'class' => 'gui-input',
            ),
        ));

//      Detalle Del Pago

        $this->add(array(
            'name' => 'metodo',
            'type' => 'Zend\Form\Element\Select',
            'attributes' => array(
                'id' => 'productStockStatus',
                'class' => 'form-control gui-input',
            ),
            'options' => array(
                'empty_option' => 'Metodos de Pago',
                'value_options' => array(
                    '1' => 'Available',
                    '2' => 'Unavailable',
                    '3' => 'Discontinued',
                    '4' => 'Out of Stock',
                )
            )
        ));
        $this->add(array(
            'name' => 'receptor',
            'type' => 'Zend\Form\Element\Select',
            'attributes' => array(
                'id' => 'productStockStatus',
                'class' => 'form-control gui-input',
            ),
            'options' => array(
                'empty_option' => 'Banco Receptor',
                'value_options' => array(
                    '1' => 'Available',
                    '2' => 'Unavailable',
                    '3' => 'Discontinued',
                    '4' => 'Out of Stock',
                )
            )
        ));
        $this->add(array(
            'name' => 'emisor',
            'type' => 'Zend\Form\Element\Select',
            'attributes' => array(
                'id' => 'productStockStatus',
                'class' => 'form-control gui-input',
            ),
            'options' => array(
                'empty_option' => 'Banco Emisor',
                'value_options' => array(
                    '1' => 'Available',
                    '2' => 'Unavailable',
                    '3' => 'Discontinued',
                    '4' => 'Out of Stock',
                )
            )
        ));
        $this->add(array(
            'name' => 'transferencia',
            'attributes' => array(
                'type' => 'text',
                'id' => 'detalle',
                'require' => 'true',
                'placeholder' => 'Numero de Transferencia',
                'class' => 'gui-input',
            ),
        ));
        $this->add(array(
            'name' => 'monto',
            'attributes' => array(
                'type' => 'text',
                'id' => 'monto',
                'require' => 'true',
                'placeholder' => 'Monto',
                'class' => 'gui-input',
            ),
        ));

//      Datos del Envio

        $this->add(array(
            'name' => 'tipo',
            'type' => 'Zend\Form\Element\Select',
            'attributes' => array(
                'id' => 'productStockStatus',
                'class' => 'form-control gui-input',
            ),
            'options' => array(
                'empty_option' => 'Tipo de Entrega',
                'value_options' => array(
                    '1' => 'Available',
                    '2' => 'Unavailable',
                    '3' => 'Discontinued',
                    '4' => 'Out of Stock',
                )
            )
        ));
        $this->add(array(
            'name' => 'encomienda',
            'type' => 'Zend\Form\Element\Select',
            'attributes' => array(
                'id' => 'productStockStatus',
                'class' => 'form-control gui-input',
            ),
            'options' => array(
                'empty_option' => 'Servicio de Encomienda',
                'value_options' => array(
                    '1' => 'Available',
                    '2' => 'Unavailable',
                    '3' => 'Discontinued',
                    '4' => 'Out of Stock',
                )
            )
        ));
        $this->add(array(
            'name' => 'envio',
            'type' => 'Zend\Form\Element\Select',
            'attributes' => array(
                'id' => 'productStockStatus',
                'class' => 'form-control gui-input',
            ),
            'options' => array(
                'empty_option' => 'Modalidad de Envio',
                'value_options' => array(
                    '1' => 'Available',
                    '2' => 'Unavailable',
                    '3' => 'Discontinued',
                    '4' => 'Out of Stock',
                )
            )
        ));
        $this->add(array(
            'name' => 'direccion',
            'attributes' => array(
                'type' => 'text',
                'id' => 'direccion',
                'require' => 'true',
                'placeholder' => 'Direccion',
                'class' => 'gui-input',
            ),
        ));
        $this->add(array(
            'name' => 'ciudad',
            'type' => 'Zend\Form\Element\Select',
            'attributes' => array(
                'id' => 'ciudad',
                'class' => 'form-control gui-input',
            ),
            'options' => array(
                'empty_option' => 'Ciudad',
                'value_options' => array(
                    '1' => 'Available',
                    '2' => 'Unavailable',
                    '3' => 'Discontinued',
                    '4' => 'Out of Stock',
                )
            )
        ));
        $this->add(array(
            'name' => 'estado',
            'type' => 'Zend\Form\Element\Select',
            'attributes' => array(
                'id' => 'productStockStatus',
                'class' => 'form-control gui-input',
            ),
            'options' => array(
                'empty_option' => 'Estado',
                'value_options' => array(
                    '1' => 'Available',
                    '2' => 'Unavailable',
                    '3' => 'Discontinued',
                    '4' => 'Out of Stock',
                )
            )
        ));
        $this->add(array(
            'name' => 'observaciones',
            'attributes' => array(
                'type' => 'text',
                'id' => 'observaciones',
                'require' => 'true',
                'placeholder' => 'Observaciones',
                'class' => 'gui-input',
            ),
        ));

//      Terminos y condiciones

        $this->add(array(
            'name' => 'terminos',
            'type' => 'Zend\Form\Element\Checkbox',
            'options' => array(
                'unchecked_value' => 'acepto'
            )
        ));
    }

}
