<div class='text-center'>
	<h2>Registrar Expediente para Funcionário</h2>
	<hr />
</div>
<?php  
	var_dump($_POST);
	insert($_POST, 'trabalha');

	ob_clean();
	header('LOCATION: '.ADMINISTRADOR.'/listar_cargas');
?>