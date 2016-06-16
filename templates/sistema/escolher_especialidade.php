<div class='text-center'>
	<h2>Marcar Consulta</h2>
	<hr />
</div>
<?php  
	$especialidades = run_select_many('select * from especialidade;');
	var_dump($especialidades);
?>
<div class='container col-lg-5 center'>
	<form method='post' action='<?php echo SISTEMA."/escolher_medico" ?>'>
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
		<div class='text-center col-lg-12'>
			<button class='btn btn-danger' type='reset'>Apagar</button>
            <button class='btn btn-primary' type='submit'>Prosseguir</button>
		</div>
	</form>
</div>