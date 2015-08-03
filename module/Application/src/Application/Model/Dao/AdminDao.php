<?php

namespace Application\Model\Dao;

use Zend\Db\Sql\Sql;
use Zend\Db\TableGateway\TableGateway;
use Zend\Model\Entity\Admin;

/**
 * 
 */
class AdminDao {

    protected $tableGateway;

    public function __construct(TableGateway $tablegateway) {

        $this->tableGateway = $tablegateway;
    }

    public function saveAdmin($data) {

        return $this->tableGateway->insert($data);
    }



}
