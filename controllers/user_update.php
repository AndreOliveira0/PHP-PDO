<?php
	require_once "../models/Conexao.php";

	try{

		$name = filter_input(INPUT_POST,'name',FILTER_SANITIZE_STRING);
		$email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_STRING);
		$password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_STRING);
		$id = filter_input(INPUT_POST,'id',FILTER_SANITIZE_STRING);
		
		$Conexao = Conexao::connect();

		$sql = "update users set name = :name, email = :email, password = :password where id = :id";

		$update = $Conexao->prepare($sql);

		$update->bindValue('name',$name);
		$update->bindValue('email',$email);
		$update->bindValue('password',$password);
		$update->bindValue('id',$id);

		$update->execute();

		header('location:/');

	} catch (Exception $e){
		echo $e->getMessage();
		header('location:/views/erro.php');
	}

?>

