<?php 
	function incluir_menu(){
		include_once(TEMPLATES.'/geral/menu.php');
	}

	function swal($title = '', $text = '', $type = '', $location = '', $btn = 'btn-primary'){
		echo "<button class='hidden' id='clickButton' onClick='sa(\"".$title."\", \"".$text."\", \"".$type."\", \"".$location."\", \"".$btn."\");'>button</button>
	    		<script type='text/javascript'>
	    			$(window).load(function(){
	    				$('#clickButton').click()
	    			})
    			</script>";
	}	
?>