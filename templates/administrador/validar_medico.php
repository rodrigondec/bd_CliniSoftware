<?php  
	if(isset($_GET['idmedico'])){
		$dados['ativo'] = 1;
		update($dados, 'medico', 'idmedico', $_GET['idmedico']);
		ob_clean();
        header('LOCATION: '.ADMINISTRADOR.'/listar_medicos');
	}
?>