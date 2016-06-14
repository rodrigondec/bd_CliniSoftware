<div class='text-center'>
	<h2>Registrar Inclusão de Produto</h2>
	<hr />
</div>
<?php  
	var_dump($_POST);
	insert($_POST, 'inclui');

	ob_clean();
	header('LOCATION: '.ADMINISTRADOR.'/listar_incluidos');
?>