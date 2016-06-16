<div class='text-center'>
	<h2>Registrar Produto em conta</h2>
	<hr />
</div>
<?php  
	var_dump($_POST);
	$conta = run_select('select * from conta where idpaciente='.$_POST['idpaciente'].' and pago=0;');
	if(!$conta){
		swal('Erro!', 'Essa pessoa não possui uma conta em aberto', 'error', '/'.BASE, 'btn-danger');
	}
	$produtos = run_select_many('select nome, idproduto from produto;');
	var_dump($produtos);
?>
<div class='container col-lg-5 center'>
	<form method='post' action='<?php echo RECEPCIONISTA."/registrar_produto" ?>'>
		<input type="text" name='idconta' value='<?php echo $conta["idconta"]; ?>' hidden>
		<div class='form-group col-lg-12'>
		    <label for='produto'>Produto</label>
		    <select class='form-control' name="idproduto" required>
		    	<option value="" selected disabled>Selecione um produto</option>
		    	<?php foreach($produtos as $index => $produto): ?>
				<option value="<?php echo $produto['idproduto']; ?>">
					<?php echo $produto['nome']; ?>
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