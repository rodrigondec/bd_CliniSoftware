<div class='text-center'>
	<h2>Registrar Gerencia</h2>
	<hr />
</div>
<?php  
	// var_dump($_POST);echo '<br><br>';
	$medicos = run_select_many('select nome, idmedico from pessoa natural join funcionario natural join medico;');
	// var_dump($medicos);echo '<br><br>';
	$recepcionista = run_select('select idrecepcionista, nome, email from pessoa natural join funcionario natural join recepcionista where idrecepcionista='.$_POST['idrecepcionista'].';');
	// var_dump($recepcionista);echo '<br><br>';
?>
<div class='container col-lg-5 center'>
	<form method='post' action='<?php echo ADMINISTRADOR."/registrar_gerencia" ?>'>
		<input type="text" name='idrecepcionista' value="<?php echo $recepcionista['idrecepcionista']; ?>" required hidden />
		<div class='form-group col-lg-6'>
		    <label for='nome'>Nome</label>
		    <input type='text' class='form-control' value="<?php echo $recepcionista['nome']; ?>" disabled />
		</div>
		<div class='form-group col-lg-6'>
		    <label for='email'>Email</label>
		    <input type='email' class='form-control' value="<?php echo $recepcionista['email']; ?>" disabled />
		</div>
		<div class='form-group col-lg-12'>
		    <label for='medico'>Médicos</label>
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