<div class='text-center'>
	<h2>Marcar Consulta</h2>
	<h6> Escolher Horários</h4>
	<hr />
</div>

<div class='container col-lg-8 center'>
	<form method='post' action='<?php echo RECEPCIONISTA."/escolher_horario" ?>'>
		<div class='form-group col-lg-12'>
		    <label for=''>Horários Disponíveis:  </label>
		 
		 <br/>
		 <br/>
		 

		<table class="table table-striped table-hover table-condensed">
        <thead> 
            <tr>
                <th>Médico</th>
                <th>Especialidade</th>
                <th>Data</th>
                <th>Hora</th>
                <th>Observação(ordem de chegada ou horário marcado)</th>
            </tr>
            <tbody>
            <tr>
            	<td></td>
            	<td></td>
            	<td></td>
            	<td></td>
            	<td></td>
            	<td>
                    <a class='btn btn-info' data-toggle="modal" >Marcar</a>
                </td>
            </tr>


            </tbody>
        </thead>
       	</table>
       	
		</div>
		
	</form>
</div>
<?php  
	


?>