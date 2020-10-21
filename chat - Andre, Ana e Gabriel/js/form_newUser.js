'use strict';
function resetContentInsert() {
	if ($('#content_insert').children().length > 0) {
		// existe uma mensagem > remover conteúdo com animação
		$('#content_insert').animate({
			height: 0
		}, "fast", function() {
			$(this).empty();
			$('#content_insert').removeAttr('style');
		});	
	}
}
$(document).ready(function() {
	// submeter formulário pela função sendForm()
	$('#form_newUser').on('submit', function(e) {
		e.preventDefault();
		sendForm();
	});
	
	function sendForm() {
		var msg_error = 'Ocorreu um erro...';
		var msg_timeout = 'O servidor não está a responder';
		var message = '';
		var form = $('#form_newUser');
		resetContentInsert();
		$.ajax({
			data: form.serialize(),
			url: form.attr('action'),
			type: form.attr('method'),
			dataType: "json",
			error: function(xhr, status, error) {
				if (status==="timeout") {
					message = msg_timeout;
					message = '<div class="bg-error">'+ message +'</div>';
					$('#content_insert').empty().html(message).hide().fadeIn('slow');
				} else {
					message = msg_error;
					message = '<div class="bg-error">'+ message +'</div>';
					$('#content_insert').empty().html(message).hide().fadeIn('slow');
				}
			},
			success: function(response) {
				var action 	= response.action;
				var notification = response.notification;
				var bg_notification = null;
				switch (notification) {
					case 'success':
						bg_notification = 'bg-success';
						break;    
					case 'error':
						bg_notification = 'bg-error';
						break;    
				}
				message = '<div class="'+ bg_notification +'">'+ response.message +'</div>';
				if (action === 'insert') {
					$('#content_insert').finish();
					$('#content_insert').removeAttr('style');
					$('#content_insert').empty().html(message).hide().fadeIn('slow');
				} else {
					$('#content_insert').empty().html(message).hide().fadeIn('slow');
					setTimeout(function(){window.location="chat.php"} , 1700);
				}
			},
			timeout: 7000
		});
	}
});