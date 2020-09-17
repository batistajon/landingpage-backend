<?php

namespace Src\Controllers;

use Router\Controller\Action;
use Router\Model\Container;

/**
 * IndexController
 */
class IndexController extends Action 
{
	public function index()
	{
		$this->view->erroCadastro = false;
		$this->view->login = isset($_GET['login']) ? $_GET['login'] : '';
		$this->render('index');
	}

	public function calltoaction()
	{
		$lead = Container::getModel('Lead');

		$lead->__set('nome', $_POST['name-lead']);
		$lead->__set('email', $_POST['email-lead']);
		$lead->__set('telefone', $_POST['tel-lead']);
		
		if ($lead->validarCadastro() && count($lead->getLeadPorEmail()) == 0) {

			$lead->salvar();

			$this->render('obrigado');

		} else {

			$this->view->erroCadastro = true;

			$this->render('index');
		}
	}
}