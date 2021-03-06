<div class='text-center'>
	<h2>Listar Recepcionistas</h2>
	<hr />
</div>
<?php  
    $recepcionistas = run_select_many('select idrecepcionista, nome, email, cpf from pessoa natural join funcionario natural join recepcionista;');
    // var_dump($recepcionistas);
?>
<div class="table-responsive container col-lg-9 center">
    <table class="table table-striped table-hover table-condensed">
        <thead> 
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>CPF</th>
                <th class='col-lg-1'></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($recepcionistas as $index => $recepcionista): ?>
            <tr>
                <td><?php echo $recepcionista['nome'] ?></td>
                <td><?php echo $recepcionista['email'] ?></td>
                <td><?php echo $recepcionista['cpf'] ?></td>
                <td>
                    <a class='btn btn-info' data-toggle="modal"  data-target="#myModal<?php echo $recepcionista['idrecepcionista']; ?>">Alterar</a>
                </td>
                <!-- Modal -->
                <div id="myModal<?php echo $recepcionista['idrecepcionista']; ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-sm">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Alterar Recepcionista</h4>
                            </div>
                            <div class="modal-body">
                                <form method='post'>
                                    <input type='number' name='idrecepcionista' value="<?php echo $recepcionista['idrecepcionista']; ?>" hidden placeholder='' />
                                    <div  class='form-group'>
                                        <input class='form-control' type='text' name='nome' value="<?php echo $recepcionista['nome']; ?>" placeholder='Nome' required />
                                    </div>
                                    <div  class='form-group'>
                                        <input class='form-control' type='text' name='email' value="<?php echo $recepcionista['email']; ?>" placeholder='Email' required />
                                    </div>
                                    <div  class='form-group'>
                                        <input class='form-control' type='text' name='cpf' value="<?php echo $recepcionista['cpf']; ?>" data-mask='00.000.000-00' placeholder='cpf' />
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

        $idrecepcionista = $_POST['idrecepcionista'];
        $idpessoa = run_select('select idpessoa from pessoa natural join funcionario natural join recepcionista where idrecepcionista='.$idrecepcionista.';')['idpessoa'];

        $pessoa['nome'] = $_POST['nome'];
        $pessoa['email'] = $_POST['email'];
        $pessoa['cpf'] = $_POST['cpf'];

        update($pessoa, 'pessoa', 'idpessoa', $idpessoa);

        update($dados, 'recepcionista', 'idrecepcionista', $idrecepcionista);

        ob_clean();
        header('LOCATION: '.ADMINISTRADOR.'/listar_recepcionistas');
    }
?>