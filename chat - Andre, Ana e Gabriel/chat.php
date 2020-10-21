<?php
	session_start();

	error_reporting(E_ALL);
	ini_set('display_errors','On');

	require 'constants.inc.php';
	require 'DbConnPDO.class.php';
	
	if($_SESSION['nickname'] == null){ //Bloqueia acesso diretamente pela página chat.php
		header ("location: index.php");
	}
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
				<div id="log">
					<span class="long-content">&nbsp;</span>
				</div>		
		

				<div id="composer">
					<form name="form_message" id="form_message" method="post" action="set_message.ajax.php">
					  <input name="nickname" type="hidden" id="nickname" value="<?php echo $_SESSION['nickname']; ?>">

						<table class="footer_chat">				
							<th>						
								<td class="footer_textbox">
									<textarea class="textbox_message" style="resize: none" cols="30" rows="5" name="message" type="text" required  id="message" placeholder="Escreva sua mensagem..."></textarea>
									
								</td>					
								
								<td class="footer_buttons">				
									<button class="btn_chat" id="btn_send"><i class="material-icons">arrow_forward</i></button>				
								</td>
						
							</th>				
						</table>
					</form>
				</div>		
					
		</div>

		<script src="js/chat.js"></script>
		

		
		<?php
			include 'includes/scripts.php'
		?>
	</body>
</html>