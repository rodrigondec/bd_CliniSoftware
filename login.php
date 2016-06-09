<?php 
	if(count($_POST) > 0){

		$idpessoa = select('idpessoa', 'pessoa', 'email', $_POST['email'])['idpessoa'];
		$senha = select('senha', 'usuario', 'idpessoa', $idpessoa)['senha'];

		if($senha && $senha == md5($_POST['senha'])){
			session_destroy();
			session_start();
			$_SESSION['idpessoa'] = $idpessoa;
			
			$idmedico = null;
			$idrecepcionista = null;
			$idadministrador = null;

			$idpaciente = select('idpaciente', 'paciente', 'idpessoa', $_SESSION['idpessoa'])['idpaciente'];
			if($idpaciente){
				$_SESSION['idpaciente'] = $idpaciente;
			}

			$idfuncionario = select('idfuncionario', 'funcionario', 'idpessoa', $_SESSION['idpessoa'])['idfuncionario'];
			if($idfuncionario){
				$_SESSION['idfuncionario'] = $idfuncionario;

				$idmedico = select('idmedico', 'medico', 'idfuncionario', $_SESSION['idfuncionario'])['idmedico'];
				if($idmedico){
					$_SESSION['idmedico'] = $idmedico;
				}

				$idrecepcionista = select('idrecepcionista', 'recepcionista', 'idfuncionario', $_SESSION['idfuncionario'])['idrecepcionista'];
				if($idrecepcionista){
					$_SESSION['idrecepcionista'] = $idrecepcionista;
				}

				$idadministrador = select('idadministrador', 'administrador', 'idfuncionario', $_SESSION['idfuncionario'])['idadministrador'];
				if($idadministrador){
					$_SESSION['idadministrador'] = $idadministrador;
				}
			}

			var_dump($_SESSION);

			ob_clean();
			header('LOCATION: /'.BASE);
		}
		else{
			include_once('templates/sistema/home.php');
		}
	}
?>
<script type='text/javascript'>
	window.onload = function(){
		$('#entrar').click()
		$('#warning_entrar').attr('class', 'alert alert-danger alert-dismissible text-center')
	}
</script>