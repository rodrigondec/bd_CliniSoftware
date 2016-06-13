<div class='text-center'>
	<h2>Marcar Consulta</h2>
	<h6> Escolher Especialidade</h6>
	<hr />
</div>

<div class='container col-lg-5 center'>
	<form method='post' action='<?php echo PACIENTE."/escolher_medico" ?>'>
		<div class='form-group col-lg-12'>
		    <label for=''>Especialidade: </label>
		    <input type='text' name='nome' class='form-control' placeholder='Digite a especialidade que deseja marcar a consulta'  required />
		</div>
		
		<div class='text-center'>
			<button class='btn btn-danger' type='reset'>Apagar</button>
            <button class='btn btn-primary' type='submit'>Buscar médicos</button>
		</div>
	</form>
</div>
<?php  
	


?>