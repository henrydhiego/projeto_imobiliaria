<?php

require_once '../model/usuario.php';

class usuario_controller{

    //Salvar o usuario que foi colocado no HTML

    public static function salvar(){
        $usuario = new usuario();

        //armazena os dados no banco de dados, pegando do HTML
        $usuario->setLogin($_POST['login']);
        $usuario->setSenha($_POST['senha1']);
        $usuario->setPermissao($_POST['permissao']);

        // chamando a função onde salva as informações no banco de dados
        $usuario->save();
    }

    public static function listar(){
        //Criando um objeto chamado usuario
        $usuarios = new usuario();
        //chamando a função de listar
        return $usuarios->listAll();
    }
}
?>