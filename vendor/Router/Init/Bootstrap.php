<?php

namespace Router\Init;

abstract class Bootstrap 
{		
	/**
	 * routes
	 *
	 * @var mixed
	 */
	private $routes;
	
	/**
	 * initRoutes
	 *
	 * @return mixed
	 */
	abstract protected function initRoutes(); 
	
	/**
	 * __construct
	 *
	 * @return mixed
	 */
	public function __construct() 
	{
		$this->initRoutes();
		$this->run($this->getUrl());
	}
	
	/**
	 * getRoutes
	 *
	 * @return mixed $this->routes
	 */
	public function getRoutes() 
	{
		return $this->routes;
	}
	
	/**
	 * setRoutes
	 *
	 * @param  mixed $routes
	 * @return void
	 */
	public function setRoutes(array $routes) 
	{
		$this->routes = $routes;
	}
	
	/**
	 * run
	 *
	 * @param  mixed $url
	 * @return void
	 */
	protected function run($url) 
	{
		foreach ($this->getRoutes() as $key => $route) {
			if($url == $route['route']) {
				$class = "Src\\Controllers\\".ucfirst($route['controller']);

				$controller = new $class;
				
				$action = $route['action'];

				$controller->$action();
			}
		}
	}
	
	/**
	 * getUrl
	 *
	 * @return mixed
	 */
	protected function getUrl() 
	{
		return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	}
}