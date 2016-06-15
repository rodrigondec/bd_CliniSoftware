<div class='text-center'>
	<h2>Marcar Consulta</h2>
	<h6> Escolher Médico</h4>
	<hr />
</div>

<div class='container col-lg-5 center'>
	<form method='post' action='<?php echo RECEPCIONISTA."/escolher_horario" ?>'>
		<div class='form-group col-lg-12'>
		    <label for=''>Médicos com a especialidade escolhida:  </label>
		 
		 <br/>
		 <br/>
		 <select>
  			<option value="">Médico 1</option>
  			<option value="">Médico 2</option>
  			<option value="">Médico 3</option>
  			<option value="">Médico 4</option>
		</select>
		</div>
		
		<div class='text-center'>
			
            <button class='btn btn-primary' type='submit'>Buscar horários</button>
		</div>
	</form>
</div>
<?php  
	


?>