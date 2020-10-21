<?php
	session_start();

	error_reporting(E_ALL);
	ini_set('display_errors','On');
	
	$_SESSION['nickname'] = '';
?>

<!doctype html>
<html lang="pt-BR">
	<head>
		 <?php
			include 'includes/heads.php'
		 ?>
	</head>

	<body>
		<?php
			include 'includes/header.php'
		?>
		
		<div class="container">			  
			<div class="row d-flex justify-content-center center">	

				<fieldset class="fieldlogin p-2">
				   <legend  class="w-auto"> Login </legend>
						<div>
							<form name="form_login" id="form_login" action="user_verify.php" method="post" >
								<div class="formelements">
									<p>ID: <input name="nickname" type="text" autofocus required maxlength="32"> </p>
										
									<p>Password: <input type="password" name="password" /></p>

									<div>
									  <p id="content_insert_login" class="msg_login"> </p>
									</div>
									
									<div class ="row">
										<div class="col-sm-6">
											<p><input type="submit" name="submit" value="Entrar" class="btn btn-primary login"/></p>
										</div>
										<div class="col-sm-6">
											<button type="button"  class="btn btn-primary newUser" data-toggle="modal" data-target="#newUser">
												Cadastrar
											</button>	
										</div>										
									</div>													
								</div>
							</form>
						</div>				
				</fieldset>	   

				<?php
					include 'includes/modal_cadastro.php'
				?>

			</div>
		</div>
		
		<script src="js/form_newUser.js"></script>
		<script src="js/form_login.js"></script>
				
		<?php
			include 'includes/scripts.php'
		?>
	</body>
</html>