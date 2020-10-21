////////////////////////////////////////////////////////////////////////////////
//////// ENTER, envia, mas SHIFT + ENTER passa para uma nova linha /////////////
																   /////////////
$("#message").keypress(function (e) {
	if(e.which == 13 && !e.shiftKey) {        
		$(this).closest("form").submit();		
		e.preventDefault();
	}
});
///////////////////////////////////////////////////////////////////////////////

'use strict';
$(document).ready(function() {
	getMessages();

	function getMessages() {
		$('.long-content').empty();
		var msg_error = 'Ocorreu um erro...';
		var msg_timeout = 'O servidor não está a responder';
		var message = '';
		
		var nickname = document.getElementById("nickname").value;
		

		
		$.ajax({
			url: 'get_messages.ajax.php',
			dataType: "json",
			error: function(xhr, status, error) {
				if (status==="timeout") {
					message = msg_timeout;
					alert(message);
				} else {
					message = msg_error;
					alert(message + ': ' + error);
				}
			},
			success: function(response) {
				$.each(response, function(i, item) {
					
				
				if (item.FromNickname==nickname) {  
					
					$('.long-content').prepend('<div class="all_msg"> <h5 class="me_tag">Você:</h5> <p class="me_msg">'+ item.Message+'</p></div>');
						
				}else{
					
					$('.long-content').prepend('<div class="all_msg"> <h5 class="you_tag">'+item.FromNickname + ':</h5> <p class="you_msg">' + item.Message+'</p></div>');					
					
					$("#log").animate({scrollTop: $('#log').prop("scrollHeight")}, 1); //Mantem scroll no fim da div 
				
				}
				
				});
				setTimeout(getMessages, 2000);
			},
			timeout: 7000
		});
	}   
	
	


	
	
	

	// submeter formulário pela função sendForm()
	$('#form_message').on('submit', function(e) {
		e.preventDefault();
		sendForm();
	});
	
	function sendForm() {
		var msg_error = 'Ocorreu um erro..';
		var msg_timeout = 'O servidor não está respondendo.';
		var message = '';
		var form = $('#form_message');
		$.ajax({
			data: form.serialize(),
			url: form.attr('action'),
			type: form.attr('method')
		})
		$('#message').val('');
	}

});