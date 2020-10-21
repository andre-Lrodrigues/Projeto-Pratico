<?php
	session_start();

	require 'constants.inc.php';
	require 'DbConnPDO.class.php';
	require 'User.class.php';

	// Definir uma variável com o nickname recebido pelo método POST
	$nickname = filter_input(INPUT_POST, 'nickname', FILTER_SANITIZE_STRING);
	$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
	
	// 1. Verificar se o nickname contém o número mínimo de carateres
	if (strlen($nickname) < 3) {
		$message = 'O nickname deve ter no mínimo 3 carateres animal';
		echo json_encode(
			array(
				'action'        =>  'insert',
				'notification'  =>  'error',
				'message'       =>  $message
			)
		);
		exit;
	}

	// 2. Verificar dados de Login
	try {
		$user = new User();
		$login_check = $user->checkLogin($nickname, $password);
		if (!$login_check) {			
			$message = 'Usuário/Senha inválidos';
			echo json_encode(
				array(
					'action'        => 'insert',
					'notification'  => 'error',
					'message'       =>  $message
				)
			);
			exit;
		}else{
			$_SESSION['nickname'] = $nickname;
			$_SESSION['password'] = $password;			
			echo json_encode(
				array(
					'action'        =>  'replace',
					'notification'  =>  'success',
					'message'       =>  'Olá '.$nickname.', aguarde por favor...'
				)
			);
			exit;
		}
			
		
	} catch (Exception $e) {
		$message = 'Ocorreu um erro :( ';
		if (DEFAULT_APP_DEBUG) {
			$message .= ' ' . $e->getMessage();
		}
		echo json_encode(
			array(
				"action"        =>  "insert",
				"notification"  =>  "error",
				"message"       =>  $message
			)
		);
		exit;
	}
?>