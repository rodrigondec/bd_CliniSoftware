<div class='text-center'>
	<h2>Registrar Inclusão de Produto</h2>
	<hr />
</div>
<?php  
	// var_dump($_POST);echo '<br><br>';
	$produtos = run_select_many('select nome, idproduto from produto;');
	// var_dump($produtos);echo '<br><br>';
	$procedimento = run_select('select idprocedimento, nome from procedimento where idprocedimento='.$_POST['idprocedimento'].';');
	// var_dump($procedimento);echo '<br><br>';
?>
<div class='container col-lg-5 center'>
	<form method='post' action='<?php echo ADMINISTRADOR."/registrar_produto" ?>'>
		<input type="text" name='idprocedimento' value="<?php echo $procedimento['idprocedimento']; ?>" required hidden />
		<div class='form-group col-lg-12'>
		    <label for='nome'>Nome</label>
		    <input type='text' class='form-control' value="<?php echo $procedimento['nome']; ?>" disabled />
		</div>
		<div class='form-group col-lg-12'>
		    <label for='produto'>Produtos</label>
		    <select class='form-control' name="idproduto" required>
		    	<option value="" selected disabled>Selecione um produto</option>
		    	<?php foreach($produtos as $index => $produto): ?>
				<option value="<?php echo $produto['idproduto']; ?>">
					<?php echo $produto['nome']; ?>
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