<?php

namespace Src\Controllers;

use Router\Controller\Action;
use Router\Model\Container;

/**
 * AuthController - Controla as autenticacoes dos usuarios
 */
class AuthController extends Action
{    
    /**
     * autenticar
     *
     * @return void
     */
    public function autenticar()
    {
        $usuario = Container::getModel('Usuario');

        $usuario->__set('email', $_POST['email']);
        $usuario->__set('senha', md5($_POST['senha']));
        $usuario->auth();

        if($usuario->__get('id') != '' && $usuario->__get('nome') != '') {
            
            session_start();

            $_SESSION['id'] = $usuario->__get('id');
            $_SESSION['nome'] = $usuario->__get('nome');

            header('Location: /admin');

        } else {

            header('Location: /?login=erro');
        }
    }
    
    /**
     * sair
     *
     * @return void
     */
    public function sair()
    {
        session_start();
        session_destroy();
        header('Location: /');
    }
}