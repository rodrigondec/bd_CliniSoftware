<div class='text-center'>
	<h2>Gerar Conta</h2>
	<hr />
</div>
<?php  
	var_dump($_POST);
	$conta = run_select('select * from conta where idpaciente='.$_POST['idpaciente'].' and pago=0;');
	if($conta){
		swal('Erro!', 'Essa pessoa já possui uma conta em aberto', 'error', '/'.BASE, 'btn-danger');
	}
	else{
		insert($_POST, 'conta');
		$idconta = run_select('select max(idconta) from conta;')['max(idconta)'];

		$consultas = run_select_many('select idmercancia from consulta where data=\''.date('Y-m-d').'\';');
		var_dump($consultas);

		foreach($consultas as $key => $consulta){
			$consulta['idconta'] = $idconta;
			insert($consulta, 'cobranca');
		}

		ob_clean();
		header('LOCATION: /'.BASE);
	}
?>