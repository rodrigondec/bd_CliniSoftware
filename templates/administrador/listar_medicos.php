<div class='text-center'>
	<h2>Listar Médicos</h2>
	<hr />
</div>
<?php  
    $medicos = run_select_many('select nome, email, cpf, cadastro_unico from pessoa natural join funcionario natural join medico;');
    // var_dump($medicos);
?>
<div class="table-responsive container">
    <table class="table table-striped table-hover table-condensed">
        <thead> 
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>CPF</th>
                <th>Cadastro Único</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($medicos as $index => $medico): ?>
            <tr>
                <td><?php echo $medico['nome'] ?></td>
                <td><?php echo $medico['email'] ?></td>
                <td><?php echo $medico['cpf'] ?></td>
                <td><?php echo $medico['cadastro_unico'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
