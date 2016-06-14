<div class='text-center'>
	<h2>Registrar Gerencia</h2>
	<hr />
</div>
<?php  
    $recepcionistas = run_select_many('select idrecepcionista, nome from pessoa natural join funcionario natural join recepcionista;');
    // var_dump($recepcionistas);
?>
<div class='container col-lg-5 center'>
	<form method='post' action='<?php echo ADMINISTRADOR."/selecionar_medico" ?>'>
		<div class='form-group col-lg-12'>
		    <label for='recepcionista'>Recepcionista</label>
		    <select class='form-control' name="idrecepcionista" required>
		    	<option value="" selected disabled>Selecione um Recepcionista</option>
		    	<?php foreach($recepcionistas as $index => $recepcionista): ?>
				<option value="<?php echo $recepcionista['idrecepcionista']; ?>">
					<?php echo $recepcionista['nome']; ?>
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