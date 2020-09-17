<?php

namespace Router\Model;

class Container
{	
	/**
	 * getModel
	 *
	 * @param  mixed $model
	 * @return PDO
	 */
	public static function getModel($model)
	{
		$class = "\\Src\\Models\\".ucfirst($model);
		$conn = Connection::getDb();

		return new $class($conn);
	}
}