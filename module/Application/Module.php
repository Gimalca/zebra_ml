<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;


use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
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
use Application\Model\Entity\State;
use Application\Model\Dao\StateDao;
use Application\Model\Entity\BankTransmitter;
use Application\Model\Dao\BankTransmitterDao;
use Application\Model\Entity\BankReceiver;
use Application\Model\Dao\BankReceiverDao;
use Application\Model\Entity\PaymentMethod;
use Application\Model\Dao\PaymentMethodDao;
use Application\Model\Entity\AdminLogin;
use Application\Model\Dao\AdminLoginDao;
use Application\Model\Entity\ShippingMethod;
use Application\Model\Dao\ShippingMethodDao;
use Application\Model\Entity\ShippingCourierService;
use Application\Model\Dao\ShippingCourierServiceDao;

class Module implements AutoloaderProviderInterface
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
                'AdminLoginTable' => function ($sm) 
                {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resulSet = new ResultSet();
                    $resulSet->setArrayObjectPrototype(new AdminLogin()); // Notice what is set here
                    return new TableGateway('zml_admin', $dbAdapter, null, $resulSet);
                },
                'AdminLoginDao' => function($sm) 
                {
                    $tableGateway = $sm->get('AdminLoginTable');
                    $table = new AdminLoginDao($tableGateway);
                    return $table;
                },/*
                'AdminTable' => function($sm) 
                {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSet = new ResultSet();
                    $resultSet->setArrayObjectPrototype(new Registro());
                    return new TableGateway('admin', $dbAdapter, null, $resultSet);
                },
                'AdminDao' => function($sm) 
                {
                    $tableConf = $sm->get('AdminTable');
                    $table = new AdminDao($tableConf);
                    return $table;
                },*/
                // Add this for SMTP transport
                'mail.transport' => function ($sm) 
                {
                    $config = $sm->get('Config');
                    $transport = new Smtp();
                    $transport->setOptions(new SmtpOptions($config['mail']['transport']['options']));
                    return $transport;
                },
                'BankTransmitterTable' => function ($sm)
                {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resulSet = new ResultSet();
                    $resulSet->setArrayObjectPrototype(new BankTransmitter()); // Notice what is set here
                    return new TableGateway('zml_bank_transmitter', $dbAdapter, null, $resulSet);
                },
                'BankTransmitterDao' => function($sm)
                {
                    $tableGateway = $sm->get('BankTransmitterTable');
                    $table = new BankTransmitterDao($tableGateway);
                    return $table;
                },
                'BankReceiverTable' => function ($sm)
                {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resulSet = new ResultSet();
                    $resulSet->setArrayObjectPrototype(new BankReceiver()); // Notice what is set here
                    return new TableGateway('zml_bank_receiver', $dbAdapter, null, $resulSet);
                },
                'BankReceiverDao' => function($sm)
                {
                    $tableGateway = $sm->get('BankReceiverTable');
                    $table = new BankReceiverDao($tableGateway);
                    return $table;
                },
                'StateTable' => function ($sm)
                {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resulSet = new ResultSet();
                    $resulSet->setArrayObjectPrototype(new State()); // Notice what is set here
                    return new TableGateway('zml_state', $dbAdapter, null, $resulSet);
                },
                'StateDao' => function($sm)
                {
                    $tableGateway = $sm->get('StateTable');
                    $table = new StateDao($tableGateway);
                    return $table;
                },
                'PaymentMethodTable' => function ($sm)
                {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resulSet = new ResultSet();
                    $resulSet->setArrayObjectPrototype(new PaymentMethod()); // Notice what is set here
                    return new TableGateway('zml_payment_method', $dbAdapter, null, $resulSet);
                },
                'PaymentMethodDao' => function($sm)
                {
                    $tableGateway = $sm->get('PaymentMethodTable');
                    $table = new PaymentMethodDao($tableGateway);
                    return $table;
                },
                'ShippingMethodTable' => function ($sm)
                {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resulSet = new ResultSet();
                    $resulSet->setArrayObjectPrototype(new ShippingMethod()); // Notice what is set here
                    return new TableGateway('zml_shipping_method', $dbAdapter, null, $resulSet);
                },
                'ShippingMethodDao' => function($sm)
                {
                    $tableGateway = $sm->get('ShippingMethodTable');
                    $table = new ShippingMethodDao($tableGateway);
                    return $table;
                },
                'ShippingCourierServiceTable' => function ($sm)
                {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resulSet = new ResultSet();
                    $resulSet->setArrayObjectPrototype(new ShippingCourierService()); // Notice what is set here
                    return new TableGateway('zml_shipping_courier_service', $dbAdapter, null, $resulSet);
                },
                'ShippingCourierServiceDao' => function($sm)
                {
                    $tableGateway = $sm->get('ShippingCourierServiceTable');
                    $table = new ShippingCourierServiceDao($tableGateway);
                    return $table;
                },
            ),
        );
    }
}
