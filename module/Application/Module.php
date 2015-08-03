<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Mail\Transport\Smtp;
use Zend\Mail\Transport\SmtpOptions;
use Application\Model\Dao\UserDao;
use Application\Model\Entity\User;
use Application\Model\Dao\RegistroDao;
use Application\Model\Entity\Registro;
use Application\Model\Entity\Admin;
use Application\Model\Dao\AdminDao;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }


    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    public function getServiceConfig() {
        return array(
            'factories' => array(
                // For Yable data Gateway
                'UserTable' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resulSet = new ResultSet();
                    $resulSet->setArrayObjectPrototype(new User()); // Notice what is set here
                    return new TableGateway('users', $dbAdapter, null, $resulSet);
                },
                'UserDao' => function($sm) {
                    $tableGateway = $sm->get('UserTable');
                    $table = new UserDao($tableGateway);
                    return $table;
                },
                'AdminTable' => function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSet = new ResultSet();
                    $resultSet->setArrayObjectPrototype(new Registro());
                    return new TableGateway('admin', $dbAdapter, null, $resultSet);
                },
                'AdminDao' => function($sm) {
                    $tableConf = $sm->get('AdminTable');
                    $table = new AdminDao($tableConf);
                    return $table;
                },
                // Add this for SMTP transport
                'mail.transport' => function ($sm) {
                    $config = $sm->get('Config');
                    $transport = new Smtp();
                    $transport->setOptions(new SmtpOptions($config['mail']['transport']['options']));
                    return $transport;
                },
                'RegistroTable' => function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSet = new ResultSet();
                    $resultSet->setArrayObjectPrototype(new Registro());
                    return new TableGateway('registro', $dbAdapter, null, $resultSet);
                },
                'RegistroDao' => function($sm) {
                    $tableConf = $sm->get('RegistroTable');
                    $table = new RegistroDao($tableConf);
                    return $table;
                },
            ),
        );
    }
}
