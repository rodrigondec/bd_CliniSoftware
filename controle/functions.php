<?php 
	function incluir_menu(){
		if(!isset($_SESSION['idpessoa'])){
			include_once(TEMPLATES.'/geral/menu.php');
		}
		else if(isset($_SESSION['idpessoa'])){
			if(isset($_SESSION['idpaciente'])){
				include_once(TEMPLATES.'/geral/menu_paciente.php');
			}
			if(isset($_SESSION['idmedico'])){
				include_once(TEMPLATES.'/geral/menu_medico.php');
			}
			if(isset($_SESSION['idrecepcionista'])){
				include_once(TEMPLATES.'/geral/menu_recepcionista.php');
			}
			if(isset($_SESSION['idadministrador'])){
				include_once(TEMPLATES.'/geral/menu_administrador.php');
			}
		}
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