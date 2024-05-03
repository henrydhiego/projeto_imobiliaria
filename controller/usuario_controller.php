<?php

require_once '../model/usuario.php';

class usuario_controller{

    public static function salvar(){
        $usuario = new usuario();

        $usuario->setLogin($_POST['login']);
        $usuario->setSenha($_POST['senha1']);
        $usuario->setPermissao($_POST['permissao']);

        $usuario->save();
    }
}
?>