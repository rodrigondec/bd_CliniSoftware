<div class='text-center'>
	<h2>Cadastrar Ocorrência Médica</h2>
	<hr />
</div>
<?php  
	$_POST['data'] = date('Y-m-d');
	insert($_POST, 'ocorrencia_medica');

	ob_clean();
	header('LOCATION: '.MEDICO.'/selecionar_paciente?idpaciente='.$_POST['idpaciente']);
?>