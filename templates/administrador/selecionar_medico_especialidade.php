<div class='text-center'>
	<h2>Registrar Especialização de Médico</h2>
	<hr />
</div>
<?php  
    $medicos = run_select_many('select idmedico, nome from pessoa natural join funcionario natural join medico;');
    // var_dump($medicos);
?>
<div class='container col-lg-5 center'>
	<form method='post' action='<?php echo ADMINISTRADOR."/selecionar_especialidade" ?>'>
		<div class='form-group col-lg-12'>
		    <label for='medico'>Médico</label>
		    <select class='form-control' name="idmedico" required>
		    	<option value="" selected disabled>Selecione um médico</option>
		    	<?php foreach($medicos as $index => $medico): ?>
				<option value="<?php echo $medico['idmedico']; ?>">
					<?php echo $medico['nome']; ?>
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