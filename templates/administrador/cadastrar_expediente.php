<div class='text-center'>
	<h2>Cadastrar Especialidade</h2>
	<hr />
</div>
<script>
	jQuery(function($){
		$("#hora_inicial_expediente").mask("00:00");
		$("#hora_final_expediente").mask("00:00");
		$("#hora_inicial_intervalo").mask("00:00");
		$("#hora_final_intervalo").mask("00:00");
	});
</script>
<div class='container col-lg-5 center'>
	<form method='post'>
		<div class='form-group col-lg-12'>
		    <label for='hora_inicial_expediente'>Dia da Semana</label>
		    <select class="form-control" name="dia_semana" required>
		    	<option value="" selected disabled>Selecione um dia</option>
		    	<option value="Segunda-Feira">
		    		Segunda-Feira
		    	</option>
		    	<option value="Terça-Feira">
		    		Terça-Feira
		    	</option>
		    	<option value="Quarta-Feira">
		    		Quarta-Feira
		    	</option>
		    	<option value="Quinta-Feira">
		    		Quinta-Feira
		    	</option>
		    	<option value="Sexta-Feira">
		    		Sexta-Feira
		    	</option>
		    	<option value="Sábado">
		    		Sábado
		    	</option>
		    	<option value="Domingo">
		    		Domingo
		    	</option>
		    </select>
		</div>
		<div class='form-group col-lg-3'>
		    <label for='hora_inicial_expediente'>Hora Inicial do Expediente</label>
		    <input id='hora_inicial_expediente' type='text' name='hora_inicial_expediente' class='form-control' placeholder='Hora inicial'  required />
		</div>
		<div class='form-group col-lg-3'>
		    <label for='hora_final_expediente'>Hora Final do Expediente</label>
		    <input id='hora_final_expediente' type='text' name='hora_final_expediente' class='form-control' placeholder='Hora final'  required />
		</div>
		<div class='form-group col-lg-3'>
		    <label for='hora_inicial_expediente'>Hora Inicial do Intervalo</label>
		    <input id='hora_inicial_intervalo' type='text' name='hora_inicial_intervalo' class='form-control' placeholder='Hora inicial'  required />
		</div>
		<div class='form-group col-lg-3'>
		    <label for='hora_final_expediente'>Hora Final do Intervalo</label>
		    <input id='hora_final_intervalo' type='text' name='hora_final_intervalo' class='form-control' placeholder='Hora final'  required />
		</div>
		<div class='text-center'>
			<button class='btn btn-danger' type='reset'>Apagar</button>
            <button class='btn btn-primary' type='submit'>Cadastrar</button>
		</div>
	</form>
</div>
<?php  
	if(count($_POST) > 0){
		insert($_POST, 'expediente');

		ob_clean();
        header('LOCATION: '.ADMINISTRADOR.'/listar_expedientess');
	}
?>