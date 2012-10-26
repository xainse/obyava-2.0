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
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Security', 'Utility');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	
	public $helpers			= array ('Html', 'Form', 'Session','Js');

	private $isCron			= false;
	
//	private $user_level		= 'user';
	
	private $allow_pages	= array('login', 'logout', 'registration', 'registration_confirm','thankyou','resend', 'edit',);
	
	private $users_controllers	= array('nabors', 'admins', 'links', 'checkers');
	
	public static $cronLogType = 'cron';
	
	public $components = array(
			'Auth' => array(
				'loginAction' => array(
				'controller' => 'admins',
				'action' => 'login',
				//'plugin' => 'users'
			),
			'loginRedirect' => array('controller' => 'admins', 'action' => 'dashboard', 'gate' => true),
			'authError' => 'Did you really think you are allowed to see that?',
			'authenticate' => array(
				'Form' => array(
					'userModel' => 'Admin', 
					'fields' => array('username'=>'login','password'=>'password'), 
					),
				)
			),
				'Cookie' => array('name' => 'obyavasec'),
				'Session'
		);
	
	
	public function beforeFilter(){
		parent::beforeFilter();
				
		$this->set('Auth',$this->Auth->user());
				
		if ($this->params['prefix'] == 'gate') {
			if (!$this->Auth->user('id')) {

				$this->Session->write('back_url', $this->here);
				$this->redirect(array('controller'=>'admins','action'=>'login', 'gate'=>false));
			}
			$this->disableCache();
			$this->layout = 'admin_layout';
		}
	}
	
}
	