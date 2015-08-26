<?php

namespace Application\Model\Dao;

use Zend\Db\Sql\Sql;
use Zend\Db\TableGateway\TableGateway;
use Zend\Model\Entity\Registro;

/**
 * 
 */
class UserDao {

   protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }
	
    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function getUser($usr_id)
    {
        $usr_id  = (int) $usr_id;
        $rowset = $this->tableGateway->select(array('usr_id' => $usr_id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

	public function getUserByToken($token)
    {
        $rowset = $this->tableGateway->select(array('usr_registration_token' => $token));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $token");
        }
        return $row;
    }

    public function getUserByEmail($usr_email)
    {
        $rowset = $this->tableGateway->select(array('usr_email' => $usr_email));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $usr_email");
        }
        return $row;
    }

    public function changePassword($usr_id, $password)
    {
		$data['password'] = $password;
		$this->tableGateway->update($data, array('usr_id' => (int)$usr_id));
    }
	
    public function saveUser(User $user)
    {
		// for Zend\Db\TableGateway\TableGateway we need the data in array not object
        $data = array(
            'usr_name' 				=> $user->usr_name,
            'usr_password'  		=> $user->usr_password,
            'usr_email'  			=> $user->usr_email,
            'usr_password_salt' 	=> $user->usr_password_salt,
            'usr_registration_date' => $user->usr_registration_date,
            'usr_registration_token'=> $user->usr_registration_token,
        );
		// If there is a method getArrayCopy() defined in Auth you can simply call it.
		// $data = $user->getArrayCopy();

        $usr_id = (int)$user->usr_id;
        if ($usr_id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getUser($usr_id)) {
                $this->tableGateway->update($data, array('usr_id' => $usr_id));
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }
	
    public function deleteUser($id)
    {
        $this->tableGateway->delete(array('usr_id' => $usr_id));
    }	

}
