<div class='text-center'>
	<h2>Cadastrar Ocorrência Médica</h2>
	<hr />
</div>
<?php  
	
	$paciente = run_select('select nome, email, idpaciente from pessoa natural join paciente where idpaciente='.$_POST['idpaciente'].';');
	// var_dump($paciente);
?>
<div class='container col-lg-5 center'>
	<form method='post' action='<?php echo MEDICO."/registrar_ocorrencia" ?>'>
		<input type="text" name='idpaciente' value="<?php echo $paciente['idpaciente']; ?>" required hidden />
		<div class='form-group col-lg-6'>
		    <label for='nome'>Nome</label>
		    <input type='text' class='form-control' value="<?php echo $paciente['nome']; ?>" disabled />
		</div>
		<div class='form-group col-lg-6'>
		    <label for='email'>Email</label>
		    <input type='email' class='form-control' value="<?php echo $paciente['email']; ?>" disabled />
		</div>
		<div class='form-group col-lg-12'>
		    <label for='diagnostico'>Diagnóstico</label>
		    <input type='text' name='diagnostico' class='form-control' required />
		</div>
		<div class='text-center col-lg-12'>
			<button class='btn btn-danger' type='reset'>Apagar</button>
            <button class='btn btn-primary' type='submit'>Prosseguir</button>
		</div>
	</form>
</div>