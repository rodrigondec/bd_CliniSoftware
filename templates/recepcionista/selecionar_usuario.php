<div class='text-center'>
	<h2>Visualizar Agenda</h2>
	<hr />
</div>
<div class='container col-lg-5 center'>
	<form method='post' action='<?php echo SISTEMA."/visualizar_agenda" ?>'>
		<div class='form-group col-lg-8'>
		    <label for='nome'>Email</label>
		    <input type='text' name='email' class='form-control' placeholder='Digite aqui o email' required />
		</div>
		<div class="form-group col-lg-4">
			<label for="sel1">Tipo de usuário</label>
			<select class="form-control" name='tipo_usuario' required>
				<option value='' selected disabled>Selecione</option>
				<option value='paciente'>Paciente</option>
				<option value='medico'>Médico</option>
			</select>
		</div>
		<div class='text-center'>
			<button class='btn btn-danger' type='reset'>Apagar</button>
            <button class='btn btn-primary' type='submit'>Prosseguir</button>
		</div>
	</form>
</div>