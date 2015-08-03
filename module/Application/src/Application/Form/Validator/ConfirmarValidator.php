<?php

namespace Application\Form\Validator;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Input;

class ConfirmarValidator extends InputFilter {

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
                    'name' => 'apellido',
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
                    'name' => 'id',
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
                    'name' => 'fijo',
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
                    'name' => 'celular',
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
        $this->add(
                array(
                    'name' => 'emailconf',
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
        $this->add(
                array(
                    'name' => 'producto',
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
                    'name' => 'modelo',
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
                    'name' => 'detalle',
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
                    'name' => 'metodo',
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
                    'name' => 'receptor',
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
                    'name' => 'emisor',
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
                    'name' => 'transferencia',
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
                    'name' => 'transferencia',
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
                    'name' => 'datepicker1',
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
        $this->add(
                array(
                    'name' => 'monto',
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
                    'name' => 'tipo',
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
                    'name' => 'encomienda',
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
                    'name' => 'envio',
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
                    'name' => 'direccion',
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
                    'name' => 'ciudad',
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
                    'name' => 'estado',
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
// $productImage = new FileInput('imagen');
// $productImage->setRequired(true)
//              ->setAllowEmpty(false);
// $productImage->getValidatorChain()
//     ->attach(new Size(array(
//     'messageTemplates' => array(
//         Size::TOO_BIG => 'The file TOO_BIG',
//         Size::TOO_SMALL => 'The file TOO_SMALL',
//         Size::NOT_FOUND => 'The NOT_FOUND'
//     ),
//     'options' => array(
//         'max' => 40000
//     )
// )));
// // Validator File Type //
// $mimeType = new MimeType();
// $mimeType->setMimeType(array('image/gif', 'image/jpg','image/jpeg','image/png'));
// $productImage->getValidatorChain()->attach($mimeType);
// /** Move File to Uploads/product **/
// $nameFile = sprintf("%simg_%s",'./public/assets/images/productos/', time());
// $rename = new RenameUpload($nameFile);
// //$rename->setTarget($nameFile);
// $rename->setUseUploadExtension(true);
// //$rename->setUseUploadName(true);
// $rename->setRandomize(true);
// $rename->setOverwrite(true);
// $productImage->getFilterChain()->attach($rename);       
// $this->add($productImage );
    }

}
