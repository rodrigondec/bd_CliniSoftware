<div class='text-center' style="padding-top:10%">
	<h2>Cadastro</h2>
	<hr />
</div>
<?php 
    if(count($_POST) > 0){
		
	}
?>
<script>
	jQuery(function($){
		$("#telefone").mask("(00) 00000-0000");
		$("#cpf").mask("000.000.000-00");
		$('#preco').mask("###0.00", {reverse: true});
		$('#salario').mask("###0.00", {reverse: true});
		$("#data").mask("00");
	});
</script>
<div class='container col-lg-6 center' method='post'>
	<form method='post'>
	    <div class='form-group col-lg-6'>
		    <label for='nome'>Nome</label>
		    <input type='text' name='nome' class='form-control' placeholder='Digite seu nome' required  />
		</div>
		<div class='form-group col-lg-6'>
		    <label for='cpf'>CPF</label>
		    <input id="cpf" type='text' name='cpf' class='form-control' placeholder='Digite o cpf aqui' required />
		</div>
		<div class='form-group col-lg-6'>
		    <label for='email'>Email</label>
		    <input type='email' name='email' class='form-control' placeholder='Digite seu email'  required />
		</div>
		<div class='form-group col-lg-6'>
		    <label for='senha'>Senha</label>
		    <input type='password' name='senha' class='form-control' placeholder='Digite sua senha'  required />
		</div>
		<div class='form-group  col-lg-6'>
		    <label for='telefone'>Telefone</label>
		    <input id="telefone" type='text' name='telefone' class='form-control' placeholder='Digite aqui o telefone' required  />
		</div>
		<div class='form-group col-lg-6'>
		    <label for='data_nascimento'>Data de Nascimento</label>
		    <input type='date' name='data_nascimento' class='form-control' placeholder='Digite a data de nascimento aqui' required  />
		</div>
		<div class='text-center col-lg-12'>
			<button class='btn btn-danger' type='reset'>Apagar</button>
            <button class='btn btn-primary' type='submit' id='button_form'>Cadstrar</button>
		</div>
	</form>
</div>