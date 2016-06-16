<div class='text-center'>
	<h2>Registrar Produto em conta</h2>
	<hr />
</div>
<?php  
	var_dump($_POST);
	$produto = run_select('select idmercancia from produto where idproduto='.$_POST['idproduto'].';');
	$produto['idconta'] = $_POST['idconta'];
	var_dump($produto);
	insert($produto, 'cobranca');
	ob_clean();
	header('LOCATION: /'.BASE);
?>