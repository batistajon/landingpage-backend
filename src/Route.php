<?php

namespace Src;

use Router\Init\Bootstrap;

/**
 * Route
 */
class Route extends Bootstrap 
{	
	/**
	 * initRoutes
	 *
	 * @return void
	 */
	protected function initRoutes() 
	{	
		/**
		 * Index Controller
		*/
		$routes['home'] = [
			'route'      => '/', 
			'controller' => 'IndexController', 
			'action'     => 'index'
		];

		$routes['calltoaction'] = [
			'route'      => '/calltoaction', 
			'controller' => 'IndexController', 
			'action'     => 'calltoaction'
		];

		/**
		 * Auth Controller
		 */
		$routes['autenticar'] = [
			'route'      => '/autenticar', 
			'controller' => 'AuthController', 
			'action'     => 'autenticar'
		];

		/**
		 * Admin Controller
		 */
		$routes['login'] = [
			'route'      => '/login', 
			'controller' => 'AdminController', 
			'action'     => 'login'
		];

		
		$routes['cadastro'] = [
			'route'      => '/cadastro', 
			'controller' => 'AdminController', 
			'action'     => 'cadastro'
		];

		$routes['registrar'] = [
			'route'      => '/registrar', 
			'controller' => 'AdminController', 
			'action'     => 'registrar'
		];

		$routes['admin'] = [
			'route'      => '/admin', 
			'controller' => 'AdminController', 
			'action'     => 'admin'
		];

		$routes['atualiza_lead'] = [
			'route'      => '/atualiza_lead', 
			'controller' => 'AdminController', 
			'action'     => 'atualizaLead'
		];

		$routes['delete_lead'] = [
			'route'      => '/delete_lead', 
			'controller' => 'AdminController', 
			'action'     => 'deleteLead'
		];

		$this->setRoutes($routes);
	}
}