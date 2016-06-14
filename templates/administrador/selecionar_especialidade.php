<div class='text-center'>
	<h2>Registrar Especialização de Médico</h2>
	<hr />
</div>
<?php  
	// var_dump($_POST);echo '<br><br>';
	$especialidades = run_select_many('select * from especialidade');
	// var_dump($especialidades);echo '<br><br>';
	$medico = run_select('select idmedico, nome, email from pessoa natural join funcionario natural join medico;');
	// var_dump($medico);echo '<br><br>';
?>
<div class='container col-lg-5 center'>
	<form method='post' action='<?php echo ADMINISTRADOR."/registrar_especialidade" ?>'>
		<input type="text" name='idmedico' value="<?php echo $medico['idmedico']; ?>" required hidden />
		<div class='form-group col-lg-6'>
		    <label for='nome'>Nome</label>
		    <input type='text' class='form-control' value="<?php echo $medico['nome']; ?>" disabled />
		</div>
		<div class='form-group col-lg-6'>
		    <label for='email'>Email</label>
		    <input type='email' class='form-control' value="<?php echo $medico['email']; ?>" disabled />
		</div>
		<div class='form-group col-lg-12'>
		    <label for='especialidade'>Especialidade</label>
		    <select class='form-control' name="idespecialidade" required>
		    	<option value="" selected disabled>Selecione uma especialidade</option>
		    	<?php foreach($especialidades as $index => $especialidade): ?>
				<option value="<?php echo $especialidade['idespecialidade']; ?>">
					<?php echo $especialidade['nome']; ?>
				</option>
		    	<?php endforeach; ?>
		    </select>
		</div>
		<div class='text-center'>
			<button class='btn btn-danger' type='reset'>Apagar</button>
            <button class='btn btn-primary' type='submit'>Prosseguir</button>
		</div>
	</form>
</div>