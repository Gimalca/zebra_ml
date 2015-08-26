<?php

namespace Application\Model\Dao;

use Zend\Db\Sql\Sql;
use Zend\Db\TableGateway\TableGateway;
use Zend\Model\Entity\ShippingCourierService;
/**
 * 
 */
class ShippingCourierServiceDao 
{
	protected $tableGateway;

	public function __construct(TableGateway $tablegateway) 
    {

        $this->tableGateway = $tablegateway;
    }

	public function getAll() 
    {
        $query = $this->tableGateway->getSql()->select();
        //echo $query->getSqlString();die;

        $resultSet = $this->tableGateway->selectWith($query);
        //var_dump($resultSet);die;

        return $resultSet;
    }
}