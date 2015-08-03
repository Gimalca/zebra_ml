<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Authentication\Result;
use Zend\Authentication\Storage\Session as SessionStorage;
use Zend\Db\Adapter\Adapter as DbAdapter;
use Zend\Authentication\Adapter\DbTable as IndexAdapter;
use Application\Model\Entity\User;
use Application\Form\Login;
use Application\Form\Validator\LoginValidator;
use Application\Form\Crear;
use Application\Form\Validator\CrearValidator;
use Application\Model\Entity\Registro;
use Application\Model\Dao\RegistroDao;
use Application\Model\Entity\Admin;
use Application\Model\Dao\AdminDao;
use Zend\I18n\Validator\Alnum;
use Zend\Mail;
use Zend\Mail\Message;
use Zend\Mime\Message as MimeMessage;
use Zend\Mime\Part as MimePart;
use Zend\ServiceManager\ServiceManager;
use Zend\Authentication\AuthenticationService;

class IndexController extends AbstractActionController {

    private $registroDao;
    
    public function indexAction() {
        return new ViewModel();
    }

    public function loginAction() {
        $userLogin = new AuthenticationService();
        if ($userLogin->hasIdentity()) {
            $identity = $userLogin->getIdentity();
            return $this->forward()->dispatch('Application\Controller\Index', array('action' => 'listar'));
        } else {
            $form = new Login();
            $form->get('submit')->setValue('Login');
            $messages = null;

            $request = $this->getRequest();
            if ($request->isPost()) {
                $loginFilters = new LoginValidator();
                $form->setInputFilter($loginFilters->getInputFilter());
                $form->setData($request->getPost());
                if ($form->isValid()) {
                    $data = $form->getData();
                    $sm = $this->getServiceLocator();
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');

                    $config = $this->getServiceLocator()->get('Config');

                    $indexAdapter = new IndexAdapter($dbAdapter, 'users', // there is a method setTableName to do the same
                            'usr_name', // there is a method setIdentityColumn to do the same
                            'usr_password' // there is a method setCredentialColumn to do the same
                    );
                    $indexAdapter
                            ->setIdentity($data['usr_name'])
                            ->setCredential($data['usr_password'])
                    ;

                    $auth = new AuthenticationService();
                    // or prepare in the globa.config.php and get it from there. Better to be in a module, so we can replace in another module.
                    //$auth = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
                    // $sm->setService('Zend\Authentication\AuthenticationService', $auth); // You can set the service here but will be loaded only if this action called.
                    $result = $auth->authenticate($indexAdapter);

                    switch ($result->getCode()) {
                        case Result::FAILURE_IDENTITY_NOT_FOUND:
                            // do stuff for nonexistent identity
                            break;

                        case Result::FAILURE_CREDENTIAL_INVALID:
                            // do stuff for invalid credential
                            break;

                        case Result::SUCCESS:
                            $storage = $auth->getStorage();
                            $storage->write($indexAdapter->getResultRowObject(
                                            null, 'usr_password'
                            ));
                            $time = 1209600; // 14 days 1209600/3600 = 336 hours => 336/24 = 14 days
//						if ($data['rememberme']) $storage->getSession()->getManager()->rememberMe($time); // no way to get the session
                            if ($data['rememberme']) {
                                $sessionManager = new \Zend\Session\SessionManager();
                                $sessionManager->rememberMe($time);
                            }
                            return $this->forward()->dispatch('Application\Controller\Index', array('action' => 'listar'));

                            break;

                        default:
                            // do stuff for other failure
                            break;
                    }
                    foreach ($result->getMessages() as $message) {
                        $messages .= "$message\n";
                    }
                }
            }
            $viewModel = new ViewModel(array('form' => $form, 'messages' => $messages));
            $viewModel->setTerminal(true);
            return $viewModel;
        }
    }

    public function logoutAction() {
        $auth = new AuthenticationService();
        // or prepare in the globa.config.php and get it from there
        // $auth = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');

        if ($auth->hasIdentity()) {
            $identity = $auth->getIdentity();
        }

        $auth->clearIdentity();
//		$auth->getStorage()->session->getManager()->forgetMe(); // no way to get the sessionmanager from storage
        $sessionManager = new \Zend\Session\SessionManager();
        $sessionManager->forgetMe();

        return $this->redirect()->toRoute('application/default', array('controller' => 'index', 'action' => 'login'));
    }

    public function listarAction() {
        $userLogin = new AuthenticationService();
        if ($userLogin->hasIdentity()) {
            $identity = $userLogin->getIdentity();
            $registroDao = $this->getServicesDao('RegistroDao');
            $view['registros'] = $registroDao->getAll();

            return new ViewModel($view);
        } else {

            return $this->forward()->dispatch('Application\Controller\Index', array('action' => 'login'));
        }
    }

    public function crearAction() {
        $userLogin = new AuthenticationService();
        if ($userLogin->hasIdentity()) {
            $identity = $userLogin->getIdentity();
            $request = $this->getRequest();
            $response = $this->getResponse();
            $formCrear = New Crear();
            $adminEntity = new Admin();

            if ($request->isPost()) {

                $dataform = array_merge_recursive(
                        $request->getPost()->toArray(), $request->getFiles()->toArray()
                );

                $formCrear->setInputFilter(new CrearValidator());
                $formCrear->setData($dataform);

                if ($formCrear->isValid()) {
                    $prueba = $formCrear->getData();
                    $adminEntity->exchangeArray($prueba);
                    $data = $adminEntity->getArrayCopy();
                    $adminDao = $this->getServicesDao('AdminDao');
                    $save = $adminDao->saveAdmin($data);
                    if ($save) {
                        $this->sendConfirmationEmail($adminEntity);
                        return $this->redirect()->toRoute('application', array('controller' => 'index', 'action' => 'listar'));
                    }
                } else {
                    //$mensaje = $formCrear->getMessages();
                    //print_r($mensaje);
                    $formCrear->populateValues($dataform);
                }
            }
            $view = array(
                //'title' => 'confirmar',
                'form' => $formCrear,
            );
            $viewModel = new ViewModel($view);
            return $viewModel;
        } else {

            return $this->forward()->dispatch('Application\Controller\Index', array('action' => 'login'));
        }
    }

    public function editarAction() {

        $registro_id = (int) $this->params()->fromRoute('id', 0);
        if (!$registro_id) {
            return $this->redirect()->toRoute('listar');
        }

        $form = new \Application\Form\Confirmar("registro");
        $usuario = $this->getRegistroDao()->obtenerPorId($registro_id);
//
        $form->bind($usuario);

        $modelView = new ViewModel(array('title' => 'Editar usuario', 'form' => $form));
        $modelView->setTemplate('application/index/editar');
        return $modelView;
    }
    
        public function guardarAction() {
        if (!$this->request->isPost()) {
            return $this->redirect()->toRoute('application/default', array('controller' => 'index'));
        }

        $form = new ProductoForm("producto");

        $form->setInputFilter(new ProductoValidator());
        // Obtenemos los datos desde el Formulario con POST data:
        $data = $this->request->getPost();

        $form->setData($data);

        // Validando el form
        if (!$form->isValid()) {
            $modelView = new ViewModel(array('title' => 'Validando Producto','form' => $form));
            $modelView->setTemplate('application/registro/confirmar');
            return $modelView;
        }

        $producto = new Producto();
        $producto->exchangeArray($form->getData());

        $this->getProductoDao()->guardar($producto);
        return $this->redirect()->toRoute('catalogo');
    }

    public function sendConfirmationEmail($adminEntity) {
        // $view = $this->getServiceLocator()->get('View');
        $htmlBody = 'Estimado Sr. ' . $adminEntity->nombre .
                ' Se ha Registrado una venta den mercadolibre <button type="button">Click Me!</button>';
        $html = new MimePart($htmlBody);
        $html->type = "text/html";
        $body = new MimeMessage();
        $body->setParts(array($html));
        $transport = $this->getServiceLocator()->get('mail.transport');
        $message = new Message();
        $this->getRequest()->getServer();  //Server vars
        $message->addTo($adminEntity->email)
                ->addFrom('info@gimalca.com')
                ->addCc('edrop14@gimail.com')
                ->setSubject('Compra por Mercadolibre de Suministro Zebra segundo')
                ->setBody($body);
        $transport->send($message);
    }

    private function getServicesDao($service) {
        $sm = $this->getServiceLocator();
        $tableGateway = $sm->get($service);
        return $tableGateway;
    }

    public function getRegistroDao() {
        if (!$this->registroDao) {
            $sm = $this->getServiceLocator();
            $this->registroDao = $sm->get('RegistroDao');
        }
        return $this->registroDao;
    }

}
