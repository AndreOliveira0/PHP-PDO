<?php
	require_once "../models/Conexao.php";

	try{

		$name = filter_input(INPUT_POST,'name',FILTER_SANITIZE_STRING);
		$email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_STRING);
		$password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_STRING);
		
		$Conexao = Conexao::connect();

		$sql = "insert into users (name,email, password) values (:name, :email,:password)";

		$insert = $Conexao->prepare($sql);

		$insert->bindValue('name',$name);
		$insert->bindValue('email',$email);
		$insert->bindValue('password',$password);

		$insert->execute();

		header('location:/');

	} catch (Exception $e){
		echo $e->getMessage();
		header('location:../views/erro.php');
	}

?>

