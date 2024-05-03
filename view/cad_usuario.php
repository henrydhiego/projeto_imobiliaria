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
            Login: <input type="text" name="login" id="login"><br/><br/>
            Senha: <input type="password" name="senha1" id="senha1"><br/><br/>
            Confirmação de senha: <input type="password" name="senha2" id="senha2"><br/><br/>
            Tipo de Usuario: <select name="permissao" id="permissao">
                <option value="0"></option>
                <option value="A">Administrador</option>
                <option value="C">Comum</option>
            </select><br/><br/>
            <input type="submit" name="bnt_salvar" id="bnt_salvar">
        </form>
    </div>
<?php

    if(isset($_POST['bnt_salvar'])){
        
        require_once '../controller/usuario_controller.php';
        call_user_func(array('usuario_controller','salvar'));
    }

?>

</body>
</html>


