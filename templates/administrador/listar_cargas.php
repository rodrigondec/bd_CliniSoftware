<div class='text-center'>
	<h2>Listar Cargas Horárias</h2>
	<hr />
</div>
<?php  
	$cargas = run_select_many('select nome, email, dia_semana, hora_inicial_expediente, hora_final_expediente from pessoa natural join funcionario natural join trabalha natural join expediente');
	// var_dump($cargas);
?>
<div class="table-responsive container center col-lg-9">
    <table class="table table-striped table-hover table-condensed">
        <thead> 
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Dia da semana</th>
                <th>Hora inicial</th>
                <th>Hora final</th>
                <th class='col-lg-1'></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($cargas as $index => $carga): ?>
            <tr>
                <td><?php echo $carga['nome'] ?></td>
                <td><?php echo $carga['email'] ?></td>
                <td><?php echo $carga['dia_semana'] ?></td>
                <td><?php echo $carga['hora_inicial_expediente'] ?></td>
                <td><?php echo $carga['hora_final_expediente'] ?></td>
                <td><a href="#">?</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>