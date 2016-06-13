<?php  
	if(isset($_GET['idmedico'])){
		$dados['ativo'] = 0;
		update($dados, 'medico', 'idmedico', $_GET['idmedico']);
		ob_clean();
        header('LOCATION: '.ADMINISTRADOR.'/listar_medicos');
	}
?>