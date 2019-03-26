<?php
	require_once "../models/Conexao.php";

	try{

		$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
		
		$Conexao = Conexao::connect();

		$sql = "select * from users where id = :id";

		$list = $Conexao->prepare($sql);

		$list->bindValue('id',$id);

		$list->execute();

		$usuarioEncontrado = $list->fetch();

	} catch (Exception $e){
		echo $e->getMessage();
		header('location:views/erro.php');
	}
?>


<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Title Page</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    </head>
    <body>
        <h1 class="text-center">Atualizar Cadastro de Usuários</h1>

        <div class="container">  

            <form action="../controllers/user_update.php" method="POST" role="form">

                <div class="btn-group">
                    <a class="btn btn-default" href="/" role="button">Voltar ao início</a>
                </div>

                <br />
                <br />            	

				<input type="hidden" name="id" value="<?=$usuarioEncontrado->id?>">
	
				<div class="form-group">
			        <label for="">Nome</label>
			        <input type="text" class="form-control" name="name" placeholder="Digite o nome" value="<?=$usuarioEncontrado->name?>">
			    </div>

			    <div class="form-group">
			        <label for="">Email</label>
			        <input type="text" class="form-control" name="email" placeholder="Digite o e-mail" value="<?=$usuarioEncontrado->email?>">
			    </div>

			    <div class="form-group">
			        <label for="">Password</label>
			        <input type="text" class="form-control" name="password" placeholder="Digite a senha" value="<?=$usuarioEncontrado->password?>">
			    </div>

                <button type="submit" class="btn btn-primary">Editar</button>
            </form>
        </div>

        <!-- jQuery -->
        <script src="//code.jquery.com/jquery.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
         <script src="Hello World"></script>
    </body>
</html>