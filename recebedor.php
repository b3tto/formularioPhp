<?php
	session_start();
	
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
	$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
	$idade = filter_input(INPUT_POST, 'idade', FILTER_VALIDATE_INT);


	if($nome && $idade && $email) {

		// Setando o cookie.
		setcookie('nome', $nome, time() + (86400 * 30));


		echo 'Nome: '.$nome."<br/>";
		echo 'Idade: '.$idade."<br/>";
		echo 'E-mail: '.$email;
	} else {

		$_SESSION['aviso'] = 'Preencha os campos corretamente!';

		header('location: index.php');
		exit;
	}

?>