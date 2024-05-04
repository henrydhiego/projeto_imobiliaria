<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar usuários da imobiliaria</title>
</head>
<body>

    <h1>Usuarios</h1>
    <div>
        <table>
            <thead>
                <tr>
                    <th>Login</th>
                    <th>Permissão</th>
                    <th><a href="cad_usuario.php"></a></th>
                </tr>
        </thead>
            <tbody>
                <?php

                require_once "../controller/usuario_controller.php";
                $usuarios = call_user_func(array('usuario_controller','listar'));

                if(isset($usuarios)){
                    foreach($usuarios as $usuario){
                        ?>
                        <tr>
                            <td><?php echo $usuario->getLogin(); ?></td>
                            <td><?php echo $usuario->getPermissao(); ?></td>
                            <td>
                                <a href="">Editar</a>
                                <a href="">Excluir</a>
                            </td>
                        </tr>
                        
                        <?php
                    }
                }else{
                    ?>
                    <tr>
                        <td colspan="5">Nenhum resgistro encontrado</td>
                    </tr>
                    <?php
                }

                ?>
            </tbody>
        </table>
    </div>
</body>
</html>