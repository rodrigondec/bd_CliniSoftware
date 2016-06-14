<div class='text-center'>
	<h2>Listar Médicos gerencias</h2>
	<hr />
</div>
<?php  
	$gerencias = run_select_many('select p1.nome as nome_recepcionista, p2.nome as nome_medico from pessoa as p1 natural join funcionario as f1 natural join recepcionista, gerencia, pessoa as p2 natural join funcionario as f2 natural join medico where recepcionista.idrecepcionista=gerencia.idrecepcionista and medico.idmedico=gerencia.idmedico;');
	// var_dump($gerencias);
?>
<div class="table-responsive container center col-lg-6">
    <table class="table table-striped table-hover table-condensed">
        <thead> 
            <tr>
                <th>Nome Recepcionista</th>
                <th>Nome Medico</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($gerencias as $index => $gerencia): ?>
            <tr>
                <td><?php echo $gerencia['nome_recepcionista'] ?></td>
                <td><?php echo $gerencia['nome_medico'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>