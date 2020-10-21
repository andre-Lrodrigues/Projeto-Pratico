<!-- modal a editar -->

	<div class="modal" tabindex="-1" role="dialog" id="newUser"> <!--ID do modal-->
			<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Novo Usuário</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form name="form_newUser" id="form_newUser" method="post" action="user_registration.php">
				
				<div class="modal-body">
					<div class="row"> <!--Linhas para os tamanhos de telas-->
						<div class="form-group col-sm-6 col-12">
							<label>Nickname:
								<input id="nickname"  type="text" name="nickname" class="form-control" required />
							</label>
						</div>
						
						<div class="form-group col-sm-6 col-12">
							<label>Senha:
								<input type="password" name="password" class="form-control" required />
							</label>
						</div>						
					</div>
					
					<div class="row justify-content-center center">							
							<p id="content_insert" class="msg_login"> </p>					
					</div>
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
					<button type="submit" class="btn btn-primary">Registar</button>
				</div>
			</form>
			</div>
			</div>
		</div>
		<!-- modal a editar -->