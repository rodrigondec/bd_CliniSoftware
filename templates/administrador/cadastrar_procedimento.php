<div class='text-center'>
	<h2>Cadastrar Procedimento</h2>
	<hr />
</div>
<script>
	jQuery(function($){
		$('#preco').mask("###0.00", {reverse: true});
	});
</script>
<div class='container col-lg-5 center'>
	<form method='post'>
		<div class='form-group col-lg-6'>
		    <label for='nome'>Nome</label>
		    <input type='text' name='nome' class='form-control' placeholder='Digite aqui a nome' required />
		</div>
		<div class='form-group col-lg-6'>
		    <label for='preco'>Preço</label>
		    <input id='preco' type='number' step='any' name='preco' class='form-control' placeholder='Digite aqui preço' required />
		</div>
		<div class='text-center col-lg-12'>
			<button class='btn btn-danger' type='reset'>Apagar</button>
            <button class='btn btn-primary' type='submit'>Cadastrar</button>
		</div>
	</form>
</div>
<?php  
	if(count($_POST) > 0){
		$dados['nome'] = $_POST['nome'];
		$dados['preco'] = $_POST['preco'];
		$dados['idmercancia'] = run_select('select idmercancia from mercancia where nome=\'procedimento\';')['idmercancia'];

		insert($dados, 'procedimento');
		
		ob_clean();
		header('LOCATION: '.ADMINISTRADOR.'/listar_procedimentos');
	}
?>