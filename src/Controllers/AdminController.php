<?php

namespace Src\Controllers;

use Router\Controller\Action;
use Router\Model\Container;

/**
 * AdminController - Controla os recursos privados da aplicacao
 */
class AdminController extends Action
{
    public function login()
    {
        $this->view->login = isset($_GET['login']) ? $_GET['login'] : '';
        $this->render('login');
    }

    public function cadastro()
	{
		$this->view->erroCadastro = false;

		$this->render('cadastro');
    }
    
    public function registrar()
	{
		/**
		 * Recebe os dados do formulario via post
		 */
		$usuario = Container::getModel('Usuario');

		$usuario->__set('nome', $_POST['nome']);
		$usuario->__set('email', $_POST['email']);
		$usuario->__set('senha', md5($_POST['senha']));

		/**
		 * Condicao para sucesso do resgitro
		 */
		
		if ($usuario->validarCadastro() && count($usuario->getUsuarioPorEmail()) == 0) {

			$usuario->salvar();

			$this->render('cadastro_sucesso');

		} else {

			$this->view->erroCadastro = true;

			$this->render('cadastro');
        }
    }    

    public function admin()
    {
        $this->validaAutenticacao();
        $acao = isset($_GET['atualiza']) ? $_GET['atualiza'] : '';

        $lead = Container::getModel('Lead');
        $leads = $lead->getAll();
        $this->view->leads = $leads;
        $this->view->acao = $acao;
       

        $this->render('admin');
    }

    public function atualizaLead()
    {    
       $this->validaAutenticacao();
       
       $lead = Container::getModel('Lead');
       $lead->__set('id', $_POST['id-lead']);
       $lead->__set('nome', $_POST['name-lead']);
       $lead->__set('email', $_POST['email-lead']);
       $lead->__set('telefone', $_POST['tel-lead']);
       $lead->atualizar();

       header('Location: /admin?atualizado');
    }

    public function deleteLead()
    {
       $this->validaAutenticacao();

       $acao = isset($_GET['delete']) ? $_GET['delete'] : '';

       $lead = Container::getModel('Lead');
       $lead->__set('id', $acao);
       $lead->delete();

       header('Location: /admin');
    }

    public function validaAutenticacao()
    {
        session_start();

        if(!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) || $_SESSION['nome'] == '') {
            header('Location: /?login=erro');
        } else {
            $nome = explode(' ', $_SESSION['nome']);
            echo '<h3>Ola, '.ucfirst($nome['0']).'</h3>';
        }
    }
}