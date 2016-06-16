<div class='text-center'>
	<h2>Marcar Consulta</h2>
	<hr />
</div>
<?php  
	$especialidade = run_select('select idespecialidade, nome from especialidade where idespecialidade='.$_POST['idespecialidade'].';');
	// var_dump($_POST);
	$medicos = run_select_many('select idmedico, nome from pessoa natural join funcionario natural join medico natural join especializado where idespecialidade='.$_POST['idespecialidade'].';');
	// var_dump($medicos);
?>
<div class='container col-lg-5 center'>
	<form method='post' action='<?php echo SISTEMA."/escolher_horario" ?>'>
		<div class='form-group col-lg-12'>
		    <label for='especialidade'>Especialidade</label>
		    <input type='text' class='form-control' value="<?php echo $especialidade['nome']; ?>" disabled />
		</div>
		<div class='form-group col-lg-12'>
		    <label for='medico'>Médico</label>
		    <select class='form-control' name="idmedico" required>
		    	<option value="" selected disabled>Selecione um medico</option>
		    	<?php foreach($medicos as $index => $medico): ?>
				<option value="<?php echo $medico['idmedico']; ?>">
					<?php echo $medico['nome']; ?>
				</option>
				<?php endforeach; ?>
		    </select>
		</div>
		<div class='text-center col-lg-12'>
			<button class='btn btn-danger' type='reset'>Apagar</button>
            <button class='btn btn-primary' type='submit'>Prosseguir</button>
		</div>
	</form>
</div>