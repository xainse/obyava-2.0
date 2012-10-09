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
	
	private $user_level		= 'user';
	
	private $allov_pages	= array('login', 'logout', 'registration', 'registration_confirm','thankyou','resend', 'edit',);
	
	private $users_controllers	= array('nabors', 'admins', 'links', 'checkers');
	
	public static $cronLogType = 'cron';
	
	function beforeFilter() {
		parent::befoneFilter();
		if (!$this->Session->check('Admin') && !in_array($this->action, $this->allow_pagers)){//||&this->Session->read("Admin.permission_level") !=$this->admin_level) {
			$this->Session->write('back_url', $this->here);
			$this->redirect(array('controller'=>'admins','action'=>'login'));
		}
		//check users and admin controllers
		if ($this->Session->read("Admin.permission_level")!=$this->admin_level &&
			$this->Session->read("Admin.permission_level")==$this->user_level&&
			!in_array($this->params['controller'], $this->users_controllers)) {
				$this->redirect('/');
		}
	}
		
		
		
		
		
		
}
	