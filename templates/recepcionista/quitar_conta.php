<div class='text-center'>
	<h2>Quitar Conta</h2>
	<hr />
</div>
<?php  
	var_dump($_GET);
	$dados['pago'] = 1;
	update($dados, 'conta', 'idconta', $_GET['idconta']);
	ob_clean();
	header('LOCATION: /'.BASE);
?>