<?php

namespace Router\Model;


abstract class Model 
{
	protected $db;
	
	/**
	 * __construct
	 *
	 * @param  mixed $db
	 * @return PDO
	 */
	public function __construct(\PDO $db) 
	{
		$this->db = $db;
	}
}
