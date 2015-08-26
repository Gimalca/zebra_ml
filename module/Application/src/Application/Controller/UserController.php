<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\I18n\Validator\Alnum;

use Application\Form\Confirmar;
use Application\Form\Validator\ConfirmarValidator;

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

use Zend\Mail;
use Zend\Mail\Message;

use ArrayObject;

use Zend\Mime\Message as MimeMessage;
use Zend\Mime\Part as MimePart;

class UserController extends AbstractActionController 
{

    // private $confirmarForm;
    private $bankTransmitterDao;
    private $bankReceiverDao;
    private $sateDao;
    private $paymentMethodDao; 
    private $shippingMethodDao;
    private $shippingCourierServiceDao;


    public function indexAction() {
        return new ViewModel();
    }

    public function confirmarAction() {
        $bank = $this->getBankTransmitterSelect();
        $bankR = $this->getBankReceiverSelect();
        $state = $this->getSateSelect();
        $paymentMethod = $this->getPaymentMethodSelect();
        $shippingMethod = $this->getShippingMethodSelect();
        $shippingCourierService = $this->getShippingCourierServiceSelect();

        $request = $this->getRequest();
        $response = $this->getResponse();
        $userEntity = new User();
        $form_confirmar = New Confirmar();
        $form_confirmar->get('emisor')->setValueOptions($bank);
        $form_confirmar->get('receptor')->setValueOptions($bankR);
        $form_confirmar->get('estado')->setValueOptions($state);
        $form_confirmar->get('tipo')->setValueOptions($shippingMethod);
        $form_confirmar->get('metodo')->setValueOptions($paymentMethod);
        $form_confirmar->get('encomienda')->setValueOptions($shippingCourierService);



        if ($request->isPost()) {

            $dataform = $request->getPost();
            $validacionEditar = $this->params()->fromPost('verificar');
            $form_confirmar->setInputFilter(new ConfirmarValidator());
            $form_confirmar->setData($dataform);

            // var_dump($form_confirmar->isValid());die;

            if ($form_confirmar->isValid()) {


                $confirmarData = $form_confirmar->getData();

                print_r($confirmarData);die;

                if ($validacionEditar == 1) {
                    if ($save) {
                        return $this->redirect()->toRoute('application/default', array(
                                    'controller' => 'index',
                                    'action' => 'editar'
                        ));
                    } else {
                        return $this->redirect()->toRoute('application/default', array(
                                    'controller' => 'index',
                                    'action' => 'editar'
                        ));
                    }
                } else {
                    if ($save) {
                        $this->sendConfirmationEmail($userEntity);
                        return $this->redirect()->toRoute('application/default', array(
                                    'controller' => 'User',
                                    'action' => 'confirmar'
                        ));
                    } else {     
                        $form_confirmar->populateValues($dataform);
                    }
                }
            }else {
                $messages = $form_confirmar->getMessages();
                //print_r($form_confirmar);
                var_dump($form_confirmar->isValid());
                var_dump($messages); 
                $form_confirmar->populateValues($dataform);

        }}

        $view = array(
            //'title' => 'confirmar',
            'form' => $form_confirmar,
        );

        $viewModel = new ViewModel($view);
        $viewModel->setTerminal(true);
        return $viewModel;
    }

    public function sendConfirmationEmail($userEntity) {
        // $view = $this->getServiceLocator()->get('View');
        $htmlBody = 'Estimado Sr. ' . $userEntity->getNombre() .
                ' Se ha Registrado una venta den mercadolibre <button type="button">Click Me!</button>';
        $html = new MimePart($htmlBody);
        $html->type = "text/html";
        $body = new MimeMessage();
        $body->setParts(array($html));
        $transport = $this->getServiceLocator()->get('mail.transport');
        $message = new Message();
        $this->getRequest()->getServer();  //Server vars
        $message->addTo($userEntity->getEmail())
                ->addFrom('info@gimalca.com')
//                ->addCc('elkikels@gmail.com')
                ->setSubject('Compra por Mercadolibre de Suministro Zebra')
                ->setBody($body);
        $transport->send($message);
    }

    private function getServicesDao($service) 
    {
        $sm = $this->getServiceLocator();
        $tableGateway = $sm->get($service);
        return $tableGateway;
    }

    public function getBankTransmitterSelect() 
    {        
        $bankTransmitterDao = $this->getServicesDao('BankTransmitterDao');
        $results = $bankTransmitterDao->getAll();
        
        $result = array();
        foreach ($results as $bankR) 
        {
           //$result[] = $row->getArrayCopy();
           $result[$bankR->bank_transmitter_id] = $bankR->name;
        }
    
       return $result;
        
    }

    public function getBankReceiverSelect() 
    {        
        $bankReceiverDao = $this->getServicesDao('BankReceiverDao');
        $results = $bankReceiverDao->getAll();
        
        $result = array();
        foreach ($results as $bank) 
        {
           //$result[] = $row->getArrayCopy();
           $result[$bank->bank_receiver_id] = $bank->name;
        }
    
       return $result;
        
    }

    public function getSateSelect() 
    {        
        $stateDao = $this->getServicesDao('StateDao');
        $results = $stateDao->getAll();
        
        $result = array();
        foreach ($results as $state) 
        {
           //$result[] = $row->getArrayCopy();
           $result[$state->state_id] = $state->name;
        }
    
       return $result;
        
    }

    public function getPaymentMethodSelect() 
    {        
        $paymentMethodDao = $this->getServicesDao('PaymentMethodDao');
        $results = $paymentMethodDao->getAll();
        
        $result = array();
        foreach ($results as $paymentMethod) 
        {
           //$result[] = $row->getArrayCopy();
           $result[$paymentMethod->payment_method_id] = $paymentMethod->name;
        }
    
       return $result;
        
    }

    public function getShippingMethodSelect() 
    {        
        $shippingMethodDao = $this->getServicesDao('ShippingMethodDao');
        $results = $shippingMethodDao->getAll();
        
        $result = array();
        foreach ($results as $shippingMethod) 
        {
           //$result[] = $row->getArrayCopy();
           $result[$shippingMethod->shipping_method_id] = $shippingMethod->name;
        }
    
       return $result;
        
    }

    public function getShippingCourierServiceSelect() 
    {        
        $shippingCourierServiceDao = $this->getServicesDao('ShippingCourierServiceDao');
        $results = $shippingCourierServiceDao->getAll();
        
        $result = array();
        foreach ($results as $shippingCourierService) 
        {
           //$result[] = $row->getArrayCopy();
           $result[$shippingCourierService->shipping_courier_service_id] = $shippingCourierService->name;
        }
    
       return $result;
        
    }
}
