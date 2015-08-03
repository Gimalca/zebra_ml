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
use Application\Form\Confirmar;
use Application\Form\Validator\ConfirmarValidator;
use Zend\I18n\Validator\Alnum;
use Application\Model\Entity\Registro;
use Zend\Mail;
use Zend\Mail\Message;
use Zend\Mime\Message as MimeMessage;
use Zend\Mime\Part as MimePart;

class RegistroController extends AbstractActionController {

    public function indexAction() {
        return new ViewModel();
    }
    public function confirmarAction() {
        $request = $this->getRequest();
        $response = $this->getResponse();
        $registroEntity = new Registro();

        $form_confirmar = New Confirmar();

        if ($request->isPost()) {

            $dataform = array_merge_recursive(
                    $request->getPost()->toArray(), $request->getFiles()->toArray()
                    
            );
            $vaina = $this->params()->fromPost('verificar');
            $form_confirmar->setInputFilter(new ConfirmarValidator());
            $form_confirmar->setData($dataform);

            if ($form_confirmar->isValid()) {

                $prueba = $form_confirmar->getData();
                $registroEntity->exchangeArray($prueba);
                $data = $registroEntity->getArrayCopy();
                $registroDao = $this->getServicesDao('RegistroDao');
                $save = $registroDao->saveRegistro($data);
                if ($save) {
                    echo "Exito";
                    if($vaina == 1 ){
                        return $this->redirect()->toRoute('application/default', array(
                            'controller' => 'index',
                            'action' => 'listar'
                        ));
                    }             
                    else{
                    $this->sendConfirmationEmail($registroEntity);
                    return $this->redirect()->toRoute('application/default', array(
                            'controller' => 'registro',
                            'action' => 'confirmar'
                        ));
                    }
                    
                }
            } else {
                //$mensaje = $form_confirmar->getMessages();
                //print_r($mensaje);
                $form_confirmar->populateValues($dataform);
            }
        }

        $view = array(
            //'title' => 'confirmar',
            'form' => $form_confirmar,
        );

        $viewModel = new ViewModel($view);
        $viewModel->setTerminal(true);
        return $viewModel;
    }

    public function loginAction() {
        $viewModel = new ViewModel();
        $viewModel->setTerminal(true);
        return $viewModel;
    }

    public function sendConfirmationEmail($registroEntity) {
        // $view = $this->getServiceLocator()->get('View');
        $htmlBody = 'Estimado Sr. ' . $registroEntity->getNombre() .
                ' Se ha Registrado una venta den mercadolibre <button type="button">Click Me!</button>';
        $html = new MimePart($htmlBody);
        $html->type = "text/html";
        $body = new MimeMessage();
        $body->setParts(array($html));
        $transport = $this->getServiceLocator()->get('mail.transport');
        $message = new Message();
        $this->getRequest()->getServer();  //Server vars
        $message->addTo($registroEntity->getEmail())
                ->addFrom('info@gimalca.com')
//                ->addCc('elkikels@gmail.com')
                ->setSubject('Compra por Mercadolibre de Suministro Zebra')
                ->setBody($body);
        $transport->send($message);
    }

    private function getServicesDao($service) {
        $sm = $this->getServiceLocator();
        $tableGateway = $sm->get($service);
        return $tableGateway;
    }

}
