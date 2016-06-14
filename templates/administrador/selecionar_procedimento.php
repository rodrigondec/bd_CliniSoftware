<div class='text-center'>
	<h2>Registrar Inclusão de Produto</h2>
	<hr />
</div>
<?php  
    $procedimentos = run_select_many('select idprocedimento, nome from procedimento;');
    // var_dump($procedimentos);
?>
<div class='container col-lg-5 center'>
	<form method='post' action='<?php echo ADMINISTRADOR."/selecionar_produto" ?>'>
		<div class='form-group col-lg-12'>
		    <label for='procedimento'>procedimento</label>
		    <select class='form-control' name="idprocedimento" required>
		    	<option value="" selected disabled>Selecione um procedimento</option>
		    	<?php foreach($procedimentos as $index => $procedimento): ?>
				<option value="<?php echo $procedimento['idprocedimento']; ?>">
					<?php echo $procedimento['nome']; ?>
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