<div class='text-center'>
	<h2>Registrar Procedimento em conta</h2>
	<hr />
</div>
<?php  
	var_dump($_POST);
	$procedimento = run_select('select idmercancia from procedimento where idprocedimento='.$_POST['idprocedimento'].';');
	$procedimento['idconta'] = $_POST['idconta'];
	var_dump($procedimento);
	insert($procedimento, 'cobranca');
	
	$produtos_inclusos = run_select_many('select idmercancia from inclui natural join produto where idprocedimento='.$_POST['idprocedimento'].';');
	var_dump($produtos_inclusos);
	foreach($produtos_inclusos as $key => $produto){
		$produto['idconta'] = $_POST['idconta'];
		var_dump($produto);
		insert($produto, 'cobranca');
	}
	ob_clean();
	header('LOCATION: /'.BASE);
?>