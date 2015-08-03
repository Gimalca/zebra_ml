<?php

namespace Application\Model\Dao;

use Zend\Db\Sql\Sql;
use Zend\Db\TableGateway\TableGateway;
use Zend\Model\Entity\Registro;

/**
 * 
 */
class RegistroDao {

    protected $tableGateway;
    public $registro_id;

    public function __construct(TableGateway $tablegateway) {

        $this->tableGateway = $tablegateway;
    }

    public function saveRegistro($data) {

        return $this->tableGateway->insert($data);
    }

    public function obtenerPorId($registro_id) {
        $registro_id = (int) $registro_id;
        $rowset = $this->tableGateway->select(array('registro_id' => $registro_id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("No se encontro una verga $registro_id");
        }
        return $row;
    }

    public function getAll() {
        $query = $this->tableGateway->getSql()->select();
        $query->order("registro_id DESC");
        //echo $query->getSqlString();die;

        $resultSet = $this->tableGateway->selectWith($query);
        //var_dump($resultSet);die;

        return $resultSet;
    }

}
