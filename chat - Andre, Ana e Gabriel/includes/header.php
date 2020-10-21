<?php					 
  date_default_timezone_set('America/Sao_Paulo');
  $time = date('[d/m/Y - H:i]');
  $hour = date('H');

  if($hour >= 1){
	$saudacao = 'Bom dia <img src="icons/emojis/suncloud.png" width="18" >';	
  }					  
  if($hour >= 12){
	$saudacao = 'Boa tarde <img src="icons/emojis/sun.png" width="18" >';	
  }
  if($hour >= 18){
	$saudacao = 'Boa noite <img src="icons/emojis/moon.png" width="18">';	
  }
?>

<nav class="navbar navbar-default custom navbar navbar-expand-md navbar-dark fixed-top">	
	
	<?php		 
		if($_SESSION['nickname'] == !NULL){
			echo'			
				<div class="navbar-brand logotipo" >		
					<div class="saudacao">'.$saudacao.'</div>
					<div class="name_user"><span id="welcome">Seja bem vindo:</span> '.$_SESSION['nickname'].'</div> 
				</div>	
			';				
		}else{
			echo'
				<a href="index.php" class="navbar-brand logotipo">
					<h4> >> Chat group ---</h4>
				</a>		
		
		    ';
		}
	?>		
	
	<ul class="navbar-nav navbar">					
		<?php		 
			if($_SESSION['nickname'] == !NULL){
				echo'							
					<li class="nav-item nav-item-custom"><a class="nav-link" href="logout.php">Logout </a></li>					
				';				
			}else{
				echo'							
					<li class="nav-item nav-item-custom"><a class="nav-link" href="index.php"> </a></li>					
				';					
			}
		?>	
	</ul>	
</nav>
