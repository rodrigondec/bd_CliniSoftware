<div class='text-center'>
	<h2>Registrar Expediente para Funcionário</h2>
	<hr />
</div>
<?php  
	// var_dump($_POST);echo '<br><br>';
	$expedientes = run_select_many('select * from expediente;');
    // var_dump($expedientes);echo '<br><br>';
    $funcionario = run_select('select idfuncionario, nome, email from pessoa natural join funcionario where idfuncionario='.$_POST['idfuncionario'].';');
    // var_dump($funcionario);
?>
<div class='container col-lg-5 center'>
	<form method='post' action='<?php echo ADMINISTRADOR."/registrar_expediente" ?>'>
		<input type="text" name='idfuncionario' value="<?php echo $funcionario['idfuncionario']; ?>" required hidden />
		<div class='form-group col-lg-6'>
		    <label for='nome'>Nome</label>
		    <input type='text' class='form-control' value="<?php echo $funcionario['nome']; ?>" disabled />
		</div>
		<div class='form-group col-lg-6'>
		    <label for='email'>Email</label>
		    <input type='email' class='form-control' value="<?php echo $funcionario['email']; ?>" disabled />
		</div>
		<div class='form-group col-lg-12'>
		    <label for='expediente'>Expediente</label>
		    <select class='form-control' name="idexpediente" required>
		    	<option value="" selected disabled>Selecione um expediente</option>
		    	<?php foreach($expedientes as $index => $expediente): ?>
				<option value="<?php echo $expediente['idexpediente']; ?>">
					<?php echo $expediente['dia_semana']; ?>
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