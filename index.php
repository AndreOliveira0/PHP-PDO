<?php
	require_once "models/Conexao.php";

	require "vendor/autoload.php";

	try{
		
		$Conexao = Conexao::connect();
		$query = $Conexao->query("select * from users");
		$users = $query->fetchAll();

	} catch (Exception $e){
		echo $e->getMessage();
		exit;
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
        <h1 class="text-center">Controle de Usuários</h1>

        <div class="container">           
	        <table class="table">
				<tr>
				    <td>Nome</td>
				    <td>E-mail</td>
				    <td>Senha</td>
				    <td>Edit</td>
				    <td>Delete</td>
				</tr>
				<?php 
					foreach ($users as $user): 
				?>
	    		<tr>
			        <td><?=$user->name?></td>
			        <td><?=$user->email?></td>
			        <td><?=$user->password?></td>
			        <td>
			            <a href="views/user_edit.php?id=<?=$user->id;?>" class="btn btn-warning btn-xs">Editar</a>
			        </td>
			        <td>
			            <a href="controllers/user_delete.php?id=<?=$user->id;?>" class="btn btn-danger btn-xs">Deletar</a>
			        </td>
	    		</tr>
	    		<?php 
					endforeach;
				?>
			</table>

	        <div class="btn-group">
	            <a class="btn btn-default" href="../views/user_create.php" role="button">Cadastrar</a>
	     	</div>
        </div>

        <!-- jQuery -->
        <script src="//code.jquery.com/jquery.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
         <script src="Hello World"></script>
    </body>
</html>