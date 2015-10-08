<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

//    public function beforeFilter() {
//        $this->layout = 'bootstrap';
//         // $this->Auth->allow('index', 'view');
//        $this->Auth->allow('login','logout');
//        //$this->Auth->deny();  //todos los controladores se deniegan a no ser > que estes logueado
//    }

    public $components = array(
        'Session',
        'Acl',
        'Auth'
//        'Auth' => array(
//            'loginRedirect' => array(
//                'controller' => 'pages',
//                'action' => 'home'
//            ),
//            'logoutRedirect' => array(
//                'controller' => 'pages',
//                'action' => 'display',
//                'home'
//            ),
//            'authenticate' => array(
//                'Form' => array(
//                    'passwordHasher' => 'Blowfish'
//                )
//            )
//        )
    );
    
    
function beforeFilter() {
    $this->layout = 'bootstrap';
    
    //Configure AuthComponent
    $this->Auth->authorize = array(
        'Controller',
        'Actions' => array('actionPath' => 'controllers')
    );
    $this->Auth->authenticate = array(
        'Form' => array(
            'fields' => array(
                'username' => 'username',
                'password' => 'password'
            ),
            'passwordHasher' => 'Blowfish'
        )
    );
    $this->Auth->loginAction = array(
        'controller' => 'users',
        'action' => 'login',
        'admin' => false,
        'plugin' => false
    );
    $this->Auth->logoutRedirect = array(
        'controller' => 'pages',
        'action' => 'display',
        'admin' => false,
        'plugin' => false
    );
    $this->Auth->loginRedirect = array(
        'controller' => 'pages',
        'action' => 'home',
        'admin' => false,
        'plugin' => false
    );
    
    $this->Auth->authError = "Usted no posee permisos para realizar esta acción.";
}
    
    function isAuthorized($user) {
         return false;
//        return $this->Auth->loggedIn();
    }

}//end de App Controller

