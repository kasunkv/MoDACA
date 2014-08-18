<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
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
	public $components = array('DebugKit.Toolbar', 'Session', 'Paginator', 'Auth' => array(
                                    'loginAction' => array(
                                        'controller' => 'pages',
                                        'action' => 'home',
                                    ),
                                    'loginRedirect' => array (
                                        'controller' => 'students',
                                        'action' => 'index',
                                    ),
                                    'logoutRedirect' => array(
                                        'controller' => 'pages',
                                        'action' => 'home',
                                    ),
                                    'authError' => 'Did you really think you are allowed to see that?',
                                    
                                    ));
        
//        public $components = array('DebugKit.Toolbar', 'Session', 'Paginator', 'Auth' => array(
//            'loginRedirect' => array (
//                'controller' => 'pages',
//                'action' => 'home',
//            ),
//            'logoutRedirect' => array(
//                'controller' => 'pages',
//                'action' => 'home',
//            ),
//            'authError' => 'Invalid username/password',
//        ));
}
