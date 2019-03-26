<?php
	require_once "../models/Conexao.php";

	try{

		$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
		
		$Conexao = Conexao::connect();

		$sql = "delete from users where id = :id";

		$insert = $Conexao->prepare($sql);

		$insert->bindValue('id',$id);

		$insert->execute();

		header('location:/');

	} catch (Exception $e){
		echo $e->getMessage();
		header('location:/views/erro.php');
	}

?>

