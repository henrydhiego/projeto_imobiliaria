<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imobiliaria Golden House</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body class="corpo">

    <div class="form">  
        <form action="" method="post">
            Login: <input type="text" name="login" id="login" value="<?php echo isset($usuario)?$usuario->getLogin():''; ?>"><br/><br/>
            Senha: <input type="password" name="senha1" id="senha1" value="<?php echo isset($usuario)?$usuario->getSenha():''; ?>"><br/><br/>
            Confirmação de senha: <input type="password" name="senha2" id="senha2"><br/><br/>
            Tipo de Usuario: <select name="permissao" id="permissao">
                <option value="0"></option>
                <option value="A" <?php echo isset($usuario) && $usuario->getPermissao()=='A'?'selected':'' ?>>Administrador</option>
                <option value="C" <?php echo isset($usuario) && $usuario->getPermissao()=='C'?'selected':'' ?>>Comum</option>
            </select><br/><br/>
            <input type="submit" name="bnt_salvar" id="bnt_salvar">

            <input type="hidden" name="id" id="id" value="<?php echo isset($usuario)?$usuario->getId():''; ?>">
        </form>
    </div>
<?php

    if(isset($_POST['bnt_salvar'])){
        
        require_once 'controller/usuario_controller.php';
        call_user_func(array('usuario_controller','salvar'));
      //  header('Location: index.php?action=listar');
    }

?>

</body>
</html>


