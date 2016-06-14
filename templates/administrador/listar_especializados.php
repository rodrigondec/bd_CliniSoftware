<div class='text-center'>
	<h2>Listar Médicos Especializados</h2>
	<hr />
</div>
<?php  
	$especializados = run_select_many('select nome, nome_especialidade, email from pessoa natural join funcionario natural join medico natural join especializado natural join especialidade;');
	// var_dump($especializados);
?>
<div class="table-responsive container center col-lg-9">
    <table class="table table-striped table-hover table-condensed">
        <thead> 
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Especialidade</th>
                <th class='col-lg-1'></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($especializados as $index => $especializado): ?>
            <tr>
                <td><?php echo $especializado['nome'] ?></td>
                <td><?php echo $especializado['email'] ?></td>
                <td><?php echo $especializado['nome_especialidade'] ?></td>
                <td><a href="#">?</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>