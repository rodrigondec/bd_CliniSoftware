<div class='text-center'>
	<h2>Registrar Expediente para Funcionário</h2>
	<hr />
</div>
<?php  
    $funcionarios = run_select_many('select idfuncionario, nome from pessoa natural join funcionario;');
    // var_dump($funcionarios);
?>
<div class='container col-lg-5 center'>
	<form method='post' action='<?php echo ADMINISTRADOR."/selecionar_expediente" ?>'>
		<div class='form-group col-lg-12'>
		    <label for='funcionario'>Funcionário</label>
		    <select class='form-control' name="idfuncionario" required>
		    	<option value="" selected disabled>Selecione um funcionário</option>
		    	<?php foreach($funcionarios as $index => $funcionario): ?>
				<option value="<?php echo $funcionario['idfuncionario']; ?>">
					<?php echo $funcionario['nome']; ?>
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