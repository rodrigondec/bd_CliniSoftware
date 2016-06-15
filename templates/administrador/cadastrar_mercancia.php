<div class='text-center'>
	<h2>Cadastrar Mercância</h2>
	<hr />
</div>
<div class='container col-lg-5 center'>
	<form method='post'>
		<div class='form-group col-lg-12'>
		    <label for='nome'>Nome</label>
		    <input type='text' name='nome' class='form-control' placeholder='Digite aqui a mercancia' required />
		</div>
		<div class='text-center col-lg-12'>
			<button class='btn btn-danger' type='reset'>Apagar</button>
            <button class='btn btn-primary' type='submit'>Cadastrar</button>
		</div>
	</form>
</div>
<?php  
	if(count($_POST) > 0){
		insert($_POST, 'mercancia');
		ob_clean();
		header('LOCATION: '.ADMINISTRADOR.'/listar_mercancias');
	}
?>