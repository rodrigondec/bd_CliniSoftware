<div class='text-center'>
	<h2>Listar Expedientes</h2>
	<hr />
</div>
<?php  
    $expedientes = run_select_many('select * from expediente;');
    // var_dump($expedientes);
?>
<div class="table-responsive container center col-lg-9">
    <table class="table table-striped table-hover table-condensed">
        <thead> 
            <tr>
                <th>Nome</th>
                <th>Hora Incial Expediente</th>
                <th>Hora final Expediente</th>
                <th>Hora Incial Intervalo</th>
                <th>Hora final Intervalo</th>
                <th class='col-lg-1'></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($expedientes as $index => $expediente): ?>
            <tr>
                <td><?php echo $expediente['dia_semana'] ?></td>
                <td><?php echo $expediente['hora_inicial_expediente'] ?></td>
                <td><?php echo $expediente['hora_final_expediente'] ?></td>
                <td><?php echo $expediente['hora_inicial_intervalo'] ?></td>
                <td><?php echo $expediente['hora_final_intervalo'] ?></td>
                <td>
                    <a class='btn btn-info' data-toggle="modal"  data-target="#myModal<?php echo $expediente['idexpediente']; ?>">Alterar</a>
                </td>
                <!-- Modal -->
                <div id="myModal<?php echo $expediente['idexpediente']; ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-sm">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Alterar Expediente</h4>
                            </div>
                            <div class="modal-body">
                                <form method='post'>
                                    <input type='number' name='idexpediente' value="<?php echo $expediente['idexpediente']; ?>" hidden placeholder='' />
                                    <div  class='form-group'>
                                        <input class='form-control' type='text' name='dia_semana' value="<?php echo $expediente['dia_semana']; ?>" placeholder='Dia da semana' required />
                                    </div>
                                    <div  class='form-group'>
                                        <input class='form-control' type='text' name='hora_inicial_expediente' value="<?php echo $expediente['hora_inicial_expediente']; ?>" placeholder='Hora inicial expediente' required />
                                    </div>
                                    <div  class='form-group'>
                                        <input class='form-control' type='text' name='hora_final_expediente' value="<?php echo $expediente['hora_final_expediente']; ?>" placeholder='Hora final expediente' required />
                                    </div>
                                    <div  class='form-group'>
                                        <input class='form-control' type='text' name='hora_inicial_intervalo' value="<?php echo $expediente['hora_inicial_intervalo']; ?>" placeholder='Hora inicial intervalo' required />
                                    </div>
                                    <div  class='form-group'>
                                        <input class='form-control' type='text' name='hora_final_intervalo' value="<?php echo $expediente['hora_final_intervalo']; ?>" placeholder='Hora final intervalo' required />
                                    </div>
                                    <input type='submit' value='Alterar' class='btn btn-primary' />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php 
    if(count($_POST) > 0){

        $dados['dia_semana'] = $_POST['dia_semana'];
        $dados['hora_inicial_expediente'] = $_POST['hora_inicial_expediente'];
        $dados['hora_final_expediente'] = $_POST['hora_final_expediente'];
        $dados['hora_inicial_intervalo'] = $_POST['hora_inicial_intervalo'];
        $dados['hora_final_intervalo'] = $_POST['hora_final_intervalo'];

        update($dados, 'expediente', 'idexpediente', $_POST['idexpediente']);
        
        ob_clean();
        header('LOCATION: '.ADMINISTRADOR.'/listar_expedientes');
    }
?>