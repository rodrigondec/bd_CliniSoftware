<div class='text-center'>
	<h2>Cadastrar Médico</h2>
	<hr />
</div>

<script>
jQuery(function($){
	$("#data").mask("99/99/9999");
	$("#telefone").mask("(84) 99999-9999");
	$("#cpf").mask("999.999.999-99");
	$('#preco').mask("###0.00", {reverse: true});
	
});
</script>

<div class='container col-lg-5 center'>
	<form method='post'>
		<div class='form-group col-lg-12'>
		    <label for=''>Nome</label>
		    <input type='text' name='nome' class='form-control' placeholder='Digite o nome aqui.'  required />
		</div>
		<div class='form-group col-lg-7'>
		    <label for=''>CPF</label>
		    <input id="cpf" type='text' name='cpf' class='form-control' placeholder='Digite o cpf aqui.'  required />
		</div>
		<div class='form-group col-lg-5'>
		    <label for=''>Data de Nascimento</label>
		    <input id = "data" type='text' name='data_nascimento' class='form-control' placeholder='Digite a data de nascimento aqui'  required />
		</div>
		<div class='form-group col-lg-7'>
		    <label for=''>Cadastro Único</label>
		    <input type='text' name='cadastro_unico' class='form-control' placeholder='Digite aqui o cadastro único'  required />
		</div>
		<div class='form-group col-lg-5'>
		    <label for=''>Preço Padrão</label>
		    <input id="preco"type='text' name='preco_padrao' class='form-control' placeholder='Digite aqui o preço padrão'  required />
		</div>
		<div class='form-group col-lg-7'>
		    <label for=''>Email</label>
		    <input type='email' name='email' class='form-control' placeholder='Digite aqui o email'  required />
		</div>
		<div class='form-group  col-lg-5'>
		    <label for=''>Telefone</label>
		    <input id = "telefone" type='text' name='telefone' class='form-control' placeholder='Digite aqui o email'  required />
		</div>
		<div class='text-center'>
			<button class='btn btn-danger' type='reset'>Apagar</button>
            <button class='btn btn-primary' type='submit'>Cadastrar</button>
		</div>
	</form>
</div>
<?php  
	if(count($_POST) > 0){
		/* CADASTRO DE PESSOA OU VERIFICAÇÃO */
		$pessoa = select('*', 'pessoa', 'email', $_POST['email']);
		var_dump($pessoa);

		if($pessoa){ /* PESSOA EXISTE */

		}
		else{
			$pessoa = array();
			$pessoa['nome'] = $_POST['nome']
		}
	}
?>