<?php
    require_once 'controller/usuario_controller.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php
        if (isset($_GET['action'])){
            if($_GET['action'] == 'editar'){
            //Chama uma função PHP que permite informar a classe e o Método que será acionado
                $usuario = call_user_func(array('usuario_controller','editar'),$_GET['id']);
                require_once 'view/cad_usuario.php';
            }
 
            if($_GET['action'] == 'listar'){
                require_once 'view/listar_usuario.php';
            }
 
            if($_GET['action'] == 'excluir'){
            //Chama uma função PHP que permite informar a classe e o Método que será acionado
                $usuario = call_user_func(array('usuario_controller','excluir'),$_GET['id']);
                require_once 'view/listar_usuario.php';
            }
        }else{
            require_once 'view/cad_usuario.php';
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>