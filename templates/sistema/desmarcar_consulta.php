<div class='text-center'>
    <h2>Desmarcar Consulta</h2>
    <hr />
</div>
<?php  
	$consulta = run_select('select idmercancia from consulta where idconsulta='.$_GET['idconsulta'].';');
	var_dump($consulta);

	run('delete from mercancia where idmercancia='.$consulta['idmercancia'].';');

	ob_clean();
	header('LOCATION: /'.BASE);
?>