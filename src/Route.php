<?php

namespace Src;

use Router\Init\Bootstrap;

class Route extends Bootstrap {

	protected function initRoutes() {

		$routes['home'] = [
			'route'      => '/', 
			'controller' => 'IndexController', 
			'action'     => 'index'
		];

		$routes['clube'] = [
			'route'      => '/clube', 
			'controller' => 'IndexController', 
			'action'     => 'clube'
		];

		$routes['login'] = [
			'route'      => '/login', 
			'controller' => 'AdminController', 
			'action'     => 'login'
		];

		$routes['autenticar'] = [
			'route'      => '/autenticar', 
			'controller' => 'AuthController', 
			'action'     => 'autenticar'
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