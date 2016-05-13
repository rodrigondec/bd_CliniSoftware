<?php 
	var_dump($_POST);
	if(count($_POST) > 0){

		if($usuario && $usuario['senha'] == md5($_POST['senha'])){
			session_start();

			ob_clean();
			header('LOCATION: /'.BASE);
		}
		else{
			include_once('templates/sistema/home.php');
		}
	}
?>
<script type='text/javascript'>
	window.onload = function(){
		$('#entrar').click()
		$('#warning_entrar').attr('class', 'alert alert-danger alert-dismissible text-center')
	}
</script>