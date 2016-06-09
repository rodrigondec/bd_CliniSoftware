<?php  

	unset($_SESSION['idpessoa']);
	unset($_SESSION['idpaciente']);
	unset($_SESSION['idfuncionario']);
	unset($_SESSION['idmedico']);
	unset($_SESSION['idrecepcionista']);
	unset($_SESSION['idadministrador']);

	if($_GET['tipo'] == 'paciente'){
		$_SESSION['idpessoa'] = 4;
		$_SESSION['idpaciente'] = 1;
	}
	else if($_GET['tipo'] == 'administrador'){
		$_SESSION['idpessoa'] = 1;
		$_SESSION['idfuncionario'] = 1;
		$_SESSION['idadministrador'] = 1;
	}
	else if($_GET['tipo'] == 'recepcionista'){
		$_SESSION['idpessoa'] = 3;
		$_SESSION['idfuncionario'] = 3;
		$_SESSION['idrecepcionista'] = 1;
	}
	else if($_GET['tipo'] == 'medico'){
		$_SESSION['idpessoa'] = 2;
		$_SESSION['idfuncionario'] = 2;
		$_SESSION['idmedico'] = 1;
	}
	
	ob_clean();
	header('LOCATION: /'.BASE);
?>