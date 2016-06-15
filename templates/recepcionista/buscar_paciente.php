<div class='text-center'>
	<h2>Desmarcar Consulta</h2>
	<h6> Buscar Consultas do Paciente</h6>
	<hr />
</div>

<div class='container col-lg-5 center'>
	<form method='post' action='<?php echo RECEPCIONISTA."/desmarcar_consulta" ?>'>
		<div class='form-group col-lg-12'>
		    <label for=''>Nome do Paciente: </label>
		    <input type='text' name='nome' class='form-control' placeholder='Digite o nome do paciente que deseja desmarcar consulta'  required />
		</div>
		
		<div class='text-center'>
			<button class='btn btn-danger' type='reset'>Apagar</button>
            <button class='btn btn-primary' type='submit'>Buscar consultas marcadas</button>
		</div>
	</form>
</div>
<?php  
	


?>