<div class='text-center'>
	<h2>Cadastro</h2>
	<hr />
</div>
<?php 
    if(count($_POST) > 0){
	
	}
?>
<div class='container col-md-6 col-lg-6 col-sm-6 col-xs-7 center' method='post'>
	<form method='post'>
		<div class="panel panel-primary">
			<div class="panel-heading">
			    <h3 class="panel-title">painel 1</h3>
			</div>
			<div class="panel-body">
			    <div class='form-group'>
				    <label for='nome'>input 1</label>
				    <div class='input-group'>
						<span class="input-group-addon">
							<i class="fa fa-user"></i>
						</span>
				    	<input type='text' name='nome_usuario' class='form-control' placeholder='Digite seu nome' value='<?php if(count($_POST) > 0){echo $_POST['nome_usuario'];} ?>'  required />
				    </div>
				</div>
			</div>
		</div>
		<div class='text-center'>
			<button class='btn btn-danger' type='reset'>Apagar</button>
            <button class='btn btn-primary' type='submit' id='button_form'>Cadstrar</button>
		</div>
	</form>
</div>