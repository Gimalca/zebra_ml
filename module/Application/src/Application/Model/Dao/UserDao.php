<?php

namespace Application\Model\Dao;

use Zend\Db\Sql\Sql;
use Zend\Db\TableGateway\TableGateway;

use Application\Model\Entity\User;
use Application\Model\Entity\BankTransmitter;
use Application\Model\Entity\State;
use Application\Model\Entity\PaymentMethod;
use Application\Model\Entity\ShippingMethod;
use Application\Model\Entity\ShippingCourierService;


use Application\Model\Dao\BankTransmitterDao;
use Application\Model\Dao\StateDao;
use Application\Model\Dao\PaymentMethodDao;
use Application\Model\Dao\ShippingMethodDao;
use Application\Model\Dao\ShippingCourierServiceDao;

/**
 * 
 */
class UserDao {

    protected $tableGateway;
    public $user_id;

    public function __construct(TableGateway $tablegateway) 
    {

        $this->tableGateway = $tablegateway;
    }

    public function saveUser($data) 
    {

        
        return $this->tableGateway->insert($data);
    }

    public function guardarUser($data) 
    {
        $idData =  $data['user_id'];

        $id = (int) $idData;

        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->obtenerPorId($id)) {
                return $this->tableGateway->update($data, array('user_id' => $id));
            } else {
                throw new \Exception('El Formulario no Existe');
            }
        }
    }

    public function obtenerPorId($id) 
    {
        $user_id = (int) $id;
        $rowset = $this->tableGateway->select(array('user_id' => $user_id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("El Usuario no Existe");
        }
        return $row;
    }

    public function getAll() 
    {
        $query = $this->tableGateway->getSql()->select();
        $query->order("user_id DESC");
        //echo $query->getSqlString();die;

        $resultSet = $this->tableGateway->selectWith($query);
        //var_dump($resultSet);die;

        return $resultSet;
    }
    
    public function saveUser(User $data)
    {
        
        

        if ($productId == 0) {
            // insert Product Table
            $sProduct = $this->tableGateway->insert($data_product);

            if ($sProduct) {

                $productId = $this->tableGateway->getLastInsertValue();
                // Insert Product Description
                $sDescription = $this->saveProductDescription($productId, $data_product_description);
                // Insert Images
                $sImage = $this->saveProductImage($productId, $data_product_image);
                // insert Url Alias
                $sUrlAlias = $this->saveUrlAlias($productId, $data_product_urlAlias);
                // insert Categories
                $sUrlAlias = $this->saveProductCategories($productId, $data_product_categories);

                return $productId;
            } else {
                throw new \Exception('Form id does not exist');
            }
        } else {

            if ($this->getById($productId)) {

                $data_product['date_modified'] = date("Y-m-d H:i:s");
                //print_r($data_product);die;
                $this->tableGateway->update($data_product, array(
                    'product_id' => $productId,
                ));
                // update Product Description
                $sDescription = $this->saveProductDescription($productId, $data_product_description, 1);
                // update Images ( AJAX )
                //$sImage = $this->saveProductImage($productId, $data_product_image);
                // update Url Alias
                $sUrlAlias = $this->saveUrlAlias($productId, $data_product_urlAlias, 1);
                // update Categories
                $sUrlAlias = $this->saveProductCategories($productId, $data_product_categories, 1);

                return $productId;
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }

}
