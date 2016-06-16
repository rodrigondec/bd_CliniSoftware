<div class='text-center'>
	<h2>Marcar Consulta</h2>
	<hr />
</div>
<?php  
	var_dump($_POST);echo '<br><br>';

	$pessoa = run_select('select * from pessoa where email=\''.$_POST['email'].'\';');
	var_dump($pessoa);
	if($pessoa){
		$paciente = run_select('select * from paciente where idpessoa='.$pessoa['idpessoa'].';');
		if($paciente){
			run('insert into mercancia () values ();');
			$idmercancia = run_select('select max(idmercancia) from mercancia;')['max(idmercancia)'];

			$dados['data'] = $_POST['data'];
			$dados['idmercancia'] = $idmercancia;
			$dados['idexpediente'] = $_POST['idexpediente'];

			var_dump($dados);echo '<br><br>';

			insert($dados, 'consulta');

			$idconsulta = run_select('select max(idconsulta) from consulta;')['max(idconsulta)'];

			$agenda['idpaciente'] = $paciente['idpaciente'];
			$agenda['idmedico'] = $_POST['idmedico'];
			$agenda['idconsulta'] = $idconsulta;

			insert($agenda, 'agenda');

			ob_clean();
			header('LOCATION: /'.BASE);
		}
		else{
			$paciente['idpessoa'] = $pessoa['idpessoa'];

			insert($paciente, 'paciente');

			$idpaciente  = run_select('select max(idpaciente) from paciente;')['max(idpaciente)'];

			run('insert into mercancia () values ();');
			$idmercancia = run_select('select max(idmercancia) from mercancia;')['max(idmercancia)'];

			$dados['data'] = $_POST['data'];
			$dados['idmercancia'] = $idmercancia;
			$dados['idexpediente'] = $_POST['idexpediente'];

			var_dump($dados);echo '<br><br>';

			insert($dados, 'consulta');

			$idconsulta = run_select('select max(idconsulta) from consulta;')['max(idconsulta)'];

			$agenda['idpaciente'] = $idpaciente;
			$agenda['idmedico'] = $_POST['idmedico'];
			$agenda['idconsulta'] = $idconsulta;

			insert($agenda, 'agenda');

			ob_clean();
			header('LOCATION: /'.BASE);
		}
	}
	else{
		$pessoa['email'] = $_POST['email'];
		insert($pessoa, 'pessoa');

		$paciente['idpessoa'] = run_select('select max(idpessoa) from pessoa;')['max(idpessoa)'];
		insert($paciente, 'paciente');

		$idpaciente  = run_select('select max(idpaciente) from paciente;')['max(idpaciente)'];

		run('insert into mercancia () values ();');
		$idmercancia = run_select('select max(idmercancia) from mercancia;')['max(idmercancia)'];

		$dados['data'] = $_POST['data'];
		$dados['idmercancia'] = $idmercancia;
		$dados['idexpediente'] = $_POST['idexpediente'];

		var_dump($dados);echo '<br><br>';

		insert($dados, 'consulta');

		$idconsulta = run_select('select max(idconsulta) from consulta;')['max(idconsulta)'];

		$agenda['idpaciente'] = $idpaciente;
		$agenda['idmedico'] = $_POST['idmedico'];
		$agenda['idconsulta'] = $idconsulta;

		insert($agenda, 'agenda');

		ob_clean();
		header('LOCATION: /'.BASE);
	}
?>