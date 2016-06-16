<div class='text-center'>
	<h2>Visualizar Agenda</h2>
	<hr />
</div>
<?php  
	if(isset($_SESSION['idpessoa'])):
		// var_dump($_SESSION);
		if(isset($_SESSION['idpaciente'])){
			// echo '<h3 class="text-center">Sou um paciente</h3>';
			$agenda = run_select_many('select idconsulta, hora_inicial_expediente, hora_final_expediente, data, preco, nome as nome_medico from agenda natural join expediente natural join consulta natural join pessoa natural join funcionario natural join medico where agenda.idpaciente='.$_SESSION['idpaciente'].' and data > \''.date('Y-m-d').'\' order by data;');
			// var_dump($agenda);
			$ignorar_paciente = true;
		}
		else if(isset($_SESSION['idmedico'])){
			// echo '<h3 class="text-center">Sou um medico</h3>';
			$agenda = run_select_many('select idconsulta, hora_inicial_expediente, hora_final_expediente, data, preco, nome as nome_paciente from agenda natural join expediente natural join consulta natural join pessoa natural join paciente where agenda.idmedico='.$_SESSION['idmedico'].' and data > \''.date('Y-m-d').'\' order by data;');
			// var_dump($agenda);
			$ignorar_medico = true;
		}
		else if(isset($_SESSION['idrecepcionista'])){
			// echo '<h3 class="text-center">Sou um recepcionista</h3>';
            // var_dump($_POST);
            if($_POST['tipo_usuario'] == 'paciente'){
                $pessoa = 'p1';
            }
            else if($_POST['tipo_usuario'] == 'medico'){
                $pessoa = 'p2';
            }
    
			$agenda = run_select_many('select idconsulta, hora_inicial_expediente, hora_final_expediente, data, preco, p1.nome as nome_paciente, p2.nome as nome_medico from pessoa as p1 natural join paciente, agenda natural join expediente natural join consulta, pessoa as p2 natural join funcionario as f2 natural join medico where '.$pessoa.'.email=\''.$_POST['email'].'\' and consulta.data > \''.date('Y-m-d').'\' and paciente.idpaciente=agenda.idpaciente and medico.idmedico=agenda.idmedico order by data;');
		}
?>
<div class="table-responsive container center col-lg-8">
    <table class="table table-striped table-hover table-condensed">
        <thead> 
            <tr>
        	<?php if(!$ignorar_paciente): ?>
                <th>Paciente</th>
            <?php endif; ?>
            <?php if(!$ignorar_medico): ?>
                <th>Medico</th>
            <?php endif; ?>
                <th class='col-lg-1'>Hora inicio</th>
                <th class='col-lg-1'>Hora fim</th>
                <th class='col-lg-2'>Data</th>
                <th class='col-lg-1'>Preço</th>
            <?php  if(isset($_SESSION['idrecepcionista']) or isset($_SESSION['idpaciente'])): ?>
                <th class='col-lg-1'></th>
            <?php endif; ?>
            </tr>
        </thead>
        <tbody>
        <?php foreach($agenda as $index => $consulta): ?>
            <tr>
            <?php if(!$ignorar_paciente): ?>
                <td><?php echo $consulta['nome_paciente'] ?></td>
            <?php endif; ?>
            <?php if(!$ignorar_medico): ?>
                <td><?php echo $consulta['nome_medico'] ?></td>
            <?php endif; ?>
                <td><?php echo $consulta['hora_inicial_expediente'] ?></td>
                <td><?php echo $consulta['hora_final_expediente'] ?></td>
                <td><?php echo $consulta['data'] ?></td>
                <td><?php echo $consulta['preco'] ?></td>
            <?php  if(isset($_SESSION['idrecepcionista']) or isset($_SESSION['idpaciente'])): ?>
                <th class='col-lg-1'>
                    <a class='btn btn-danger' href="<?php echo SISTEMA.'/desmarcar_consulta?idconsulta='.$consulta['idconsulta']; ?>">Desmarcar</a>
                </th>
            <?php endif; ?>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php endif; ?>