<div class='text-center'>
	<h2>Visualizar Histórico</h2>
	<hr />
</div>
<?php  
	if(isset($_SESSION['idpessoa'])):
		// var_dump($_SESSION);
		if(isset($_SESSION['idpaciente'])){
			// echo '<h3 class="text-center">Sou um paciente</h3>';
			$historico = run_select_many('select nome, data, diagnostico from pessoa natural join paciente natural join ocorrencia_medica where idpaciente='.$_SESSION['idpaciente'].' order by data;');
			// var_dump($historico);
			$ignorar_paciente = true;
		}
		else if(isset($_SESSION['idmedico'])){
			echo '<h3 class="text-center">Sou um medico</h3>';
			$historico = run_select_many('select hora, data, preco, nome as nome_paciente from historico natural join ocorrencia natural join pessoa natural join paciente where historico.idmedico='.$_SESSION['idmedico'].' and data > \''.date('Y-m-d').'\' order by data;');
			var_dump($historico);
			$ignorar_medico = true;
		}
?>
<div class="table-responsive container center col-lg-5">
    <table class="table table-striped table-hover table-condensed">
        <thead> 
            <tr>
            <?php if(!$ignorar_paciente): ?>
                <th>Paciente</th>
            <?php endif; ?>
                <th class='col-lg-3'>Data</th>
                <th>Diagnóstico</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($historico as $index => $ocorrencia): ?>
            <tr>
            <?php if(!$ignorar_paciente): ?>
                <td><?php echo $consulta['nome'] ?></td>
            <?php endif; ?>
                <td><?php echo $ocorrencia['data'] ?></td>
                <td><?php echo $ocorrencia['diagnostico'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php endif; ?>