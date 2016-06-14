<div class='text-center'>
	<h2>Registrar Gerencia</h2>
	<hr />
</div>
<?php  
	var_dump($_POST);
	insert($_POST, 'gerencia');

	ob_clean();
	header('LOCATION: '.ADMINISTRADOR.'/listar_gerencias');
?>