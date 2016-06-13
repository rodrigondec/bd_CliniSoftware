<?php 
	if(count($_POST) > 0){

		$idpessoa = run_select('select idpessoa from pessoa natural join usuario where email = \''.$_POST['email'].'\' and senha =\''.md5($_POST['senha']).'\';');

		if($idpessoa){
			session_destroy();
			session_start();
			$_SESSION['idpessoa'] = $idpessoa['idpessoa'];
			
			$idpaciente = run_select('select idpaciente from pessoa natural join paciente where idpessoa='.$_SESSION['idpessoa'].';');
			if($idpaciente){
				$_SESSION['idpaciente'] = $idpaciente['idpaciente'];
			}
			echo 'paciente: ';var_dump($idpaciente);echo '<br>';


			$idfuncionario = run_select('select idfuncionario from pessoa natural join funcionario where idpessoa='.$_SESSION['idpessoa'].';');
			echo 'funcionario: ';var_dump($idfuncionario);echo '<br>';
			if($idfuncionario){
				$_SESSION['idfuncionario'] = $idfuncionario['idfuncionario'];

				$idmedico = run_select('select idmedico from funcionario natural join medico where idfuncionario='.$_SESSION['idfuncionario'].';');
				echo 'medico: ';var_dump($idmedico);echo '<br>';
				if($idmedico){
					$_SESSION['idmedico'] = $idmedico['idmedico'];
				}

				$idrecepcionista = run_select('select idrecepcionista from funcionario natural join recepcionista where idfuncionario='.$_SESSION['idfuncionario'].';');
				echo 'recepcionista: ';var_dump($idrecepcionista);echo '<br>';
				if($idrecepcionista){
					$_SESSION['idrecepcionista'] = $idrecepcionista['idrecepcionista'];
				}

				$idadministrador = run_select('select idadministrador from funcionario natural join administrador where idfuncionario='.$_SESSION['idfuncionario'].';');
				echo 'administrador: ';var_dump($idadministrador);echo '<br>';
				if($idadministrador){
					$_SESSION['idadministrador'] = $idadministrador['idadministrador'];
				}

				var_dump($_SESSION);

				ob_clean();
				header('LOCATION: /'.BASE);
			}		
		}
		else{
			include_once('templates/sistema/home.php');
		}
	}
?>