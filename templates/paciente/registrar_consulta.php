<div class='text-center'>
	<h2>Marcar Consulta</h2>
	<hr />
</div>
<?php
	var_dump($_POST);echo '<br><br>';

	run('insert into mercancia () values ();');
	$idmercancia = run_select('select max(idmercancia) from mercancia;')['max(idmercancia)'];

	$dados['data'] = $_POST['data'];
	$dados['idmercancia'] = $idmercancia;
	$dados['idexpediente'] = $_POST['idexpediente'];

	var_dump($dados);echo '<br><br>';

	insert($dados, 'consulta');

	$idconsulta = run_select('select max(idconsulta) from consulta;')['max(idconsulta)'];

	$agenda['idpaciente'] = $_SESSION['idpaciente'];
	$agenda['idmedico'] = $_POST['idmedico'];
	$agenda['idconsulta'] = $idconsulta;

	insert($agenda, 'agenda');

	ob_clean();
	header('LOCATION: '.SISTEMA.'/visualizar_agenda');
?>