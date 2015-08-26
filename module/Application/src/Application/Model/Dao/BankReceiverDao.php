<?php

namespace Application\Model\Dao;

use Zend\Db\Sql\Sql;
use Zend\Db\TableGateway\TableGateway;
use Zend\Model\Entity\BankReceiver;
/**
 * 
 */
class BankReceiverDao 
{
	protected $tableGateway;

	public function __construct(TableGateway $tablegateway) 
    {

        $this->tableGateway = $tablegateway;
    }

	public function getAll() 
    {
        $query = $this->tableGateway->getSql()->select();
        $query->order("bank_receiver_id DESC");
        //echo $query->getSqlString();die;

        $resultSet = $this->tableGateway->selectWith($query);
        //var_dump($resultSet);die;

        return $resultSet;
    }
}