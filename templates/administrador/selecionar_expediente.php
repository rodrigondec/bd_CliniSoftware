<div class='text-center'>
	<h2>Registrar Carga Horária para Funcionário</h2>
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
	<form method='post' action='<?php echo ADMINISTRADOR."/registrar_carga" ?>'>
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
					<?php 
						echo $expediente['dia_semana'].' das '.$expediente['hora_inicial_expediente'].' às '.$expediente['hora_final_expediente'].'. ';
						if($expediente['hora_inicial_intervalo'] == '' or $expediente['hora_inicial_intervalo'] == null){
							echo 'Sem intervalo';
						}
						else{
							echo 'Com intevalo das '.$expediente['hora_inicial_intervalo'].' às '.$expediente['hora_final_intervalo']; 
						}
						echo '.';
					?>
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