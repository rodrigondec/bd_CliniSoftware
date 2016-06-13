<div class='text-center'>
	<h2>Cadastrar Médico</h2>
	<hr />
</div>
<script>
	jQuery(function($){
		$("#telefone").mask("(00) 00000-0000");
		$("#cpf").mask("000.000.000-00");
		$('#preco').mask("###0.00", {reverse: true});
		$('#salario').mask("###0.00", {reverse: true});
		$("#data").mask("99");
	});
</script>
<div class='container col-lg-5 center'>
	<form method='post'>
		<div class='form-group col-lg-12'>
		    <label for='nome'>Nome</label>
		    <input type='text' name='nome' class='form-control' placeholder='Digite o nome aqui.'   />
		</div>
		<div class='form-group col-lg-7'>
		    <label for='email'>Email</label>
		    <input type='email' name='email' class='form-control' placeholder='Digite aqui o email'  required />
		</div>
		<div class='form-group  col-lg-5'>
		    <label for='telefone'>Telefone</label>
		    <input id="telefone" type='text' name='telefone' class='form-control' placeholder='Digite aqui o email'   />
		</div>
		<div class='form-group col-lg-7'>
		    <label for='cpf'>CPF</label>
		    <input id="cpf" type='text' name='cpf' class='form-control' placeholder='Digite o cpf aqui.'   />
		</div>
		<div class='form-group col-lg-5'>
		    <label for='data'>Data de Nascimento</label>
		    <input type='date' name='data_nascimento' class='form-control' placeholder='Digite a data de nascimento aqui'   />
		</div>
		<div class='form-group col-lg-7'>
		    <label for='cadastro_unico'>Cadastro Único</label>
		    <input type='text' name='cadastro_unico' class='form-control' placeholder='Digite aqui o cadastro único'   />
		</div>
		<div class='form-group col-lg-5'>
		    <label for='preco'>Preço Consulta</label>
		    <input id="preco" type='text' name='preco_padrao' class='form-control' placeholder='Digite aqui o preço'   />
		</div>
		<div class='form-group col-lg-7'>
		    <label for='salario'>Salário</label>
		    <input id='salario' type='text' name='salario' class='form-control' placeholder='Digite aqui o salário'   />
		</div>
		<div class='form-group col-lg-5'>
		    <label for='data_pagamento'>Data de Pagamento</label>
		    <input id='data' type='number' name='data_pagamento' class='form-control' placeholder='Digite aqui a data' min='03' max='20'   />
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