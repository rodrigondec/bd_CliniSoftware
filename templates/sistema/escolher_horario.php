<div class='text-center'>
	<h2>Marcar Consulta</h2>
	<hr />
</div>
<?php  
    $medico = run_select('select idmedico, nome from pessoa natural join funcionario natural join medico where idmedico='.$_POST['idmedico'].';');
    // var_dump($_POST);echo '<br><br>';
    $expedientes = run_select_many('select idexpediente, dia_semana, hora_inicial_expediente, hora_final_expediente, idexpediente from pessoa natural join medico natural join funcionario natural join trabalha natural join expediente where idmedico='.$_POST['idmedico'].';');
    // var_dump($horarios);echo '<br><br>';
?>
<div class='container col-lg-3 center'>
<?php if(isset($_SESSION['idpaciente'])): ?>
    <form method='post' action='<?php echo SISTEMA.'/registrar_consulta' ?>'>
<?php endif; ?>
<?php if(isset($_SESSION['idrecepcionista'])): ?>
    <form method='post' action='<?php echo SISTEMA.'/escolher_paciente' ?>'>
<?php endif; ?>
        <input type="text" name='idmedico' value='<?php echo $medico["idmedico"]; ?>' hidden />
        <div class='form-group col-lg-12'>
            <label for='data'>Data</label>
            <input type='date' name='data' class='form-control' placeholder='Escolha a data' min='<?php echo date("Y-m-d"); ?>' required />
        </div>
        <div class='form-group col-lg-12'>
            <label for='expediente'>Hora</label>
            <select class='form-control' name="idexpediente" required>
                <option value="" selected disabled>Selecione uma hora</option>
                <?php foreach($expedientes as $index => $expediente): ?>
                <option value="<?php echo $expediente['idexpediente']; ?>">
                    <?php 
                        echo $expediente['dia_semana'].' das '.$expediente['hora_inicial_expediente'].' às '.$expediente['hora_final_expediente'].'.';
                    ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class='text-center col-lg-12'>
            <button class='btn btn-danger' type='reset'>Apagar</button>
            <button class='btn btn-primary' type='submit'>Prosseguir</button>
        </div>
    </form>
</div>
<div class="table-responsive container center col-lg-5">
    <table class="table table-striped table-hover table-condensed">
        <caption>Horários Disponíveis para <?php echo $medico['nome']; ?></caption>
        <thead> 
            <tr>
                <th>Dia da Semana</th>
                <th>Hora inicial</th>
                <th>Hora final</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($expedientes as $index => $expediente): ?>
            <tr>
                <td><?php echo $expediente['dia_semana'] ?></td>
            	<td><?php echo $expediente['hora_inicial_expediente'] ?></td>
            	<td><?php echo $expediente['hora_final_expediente'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
	    </table>
</div>
