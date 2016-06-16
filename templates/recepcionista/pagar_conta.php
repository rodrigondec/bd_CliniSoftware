<div class='text-center'>
	<h2>Pagar Conta</h2>
	<hr />
</div>
<?php  
	// var_dump($_POST);
	$conta = run_select('select * from conta where idpaciente='.$_POST['idpaciente'].' and pago=0;');
	if(!$conta){
		swal('Erro!', 'Essa pessoa não possui uma conta em aberto', 'error', '/'.BASE, 'btn-danger');
	}
	// var_dump($conta);
	$cobranças = run_select_many('select * from cobranca where idconta='.$conta['idconta'].';');
	if(!$cobranças){
		swal('Erro!', 'A conta dessa pessoa não possui cobranças', 'error', '/'.BASE, 'btn-danger');
	}
	$consultas = run_select_many('select data, hora_inicial_expediente, hora_final_expediente, preco, preco_padrao from cobranca natural join consulta natural join agenda natural join medico natural join expediente where idconta='.$conta['idconta'].';');
	// var_dump($consultas);

	$produtos = run_select_many('select * from cobranca natural join produto where idconta='.$conta['idconta'].';');
	// var_dump($produtos);

	$procedimentos = run_select_many('select * from cobranca natural join procedimento where idconta='.$conta['idconta'].';');
	// var_dump($procedimentos);
	$soma = 0;
?>
<div class="table-responsive container center col-lg-4">
    <table class="table table-striped table-hover table-condensed">
    	<caption>Consultas</caption>
        <thead> 
            <tr>
                <th>Hora inicio</th>
                <th>Hora fim</th>
                <th>Data</th>
                <th class='col-lg-1'>Preço</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        	foreach($consultas as $index => $consulta): 
        		if($consulta['preco'] == ''){
        			$consulta['preco'] = $consulta['preco_padrao'];
        		}
        		$soma += $consulta['preco'];
        ?>
            <tr>
                <td><?php echo $consulta['hora_inicial_expediente'] ?></td>
                <td><?php echo $consulta['hora_final_expediente'] ?></td>
                <td><?php echo $consulta['data'] ?></td>
                <td><?php echo $consulta['preco'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="table-responsive container center col-lg-4">
    <table class="table table-striped table-hover table-condensed">
    	<caption>Produtos</caption>
        <thead> 
            <tr>
                <th>Nome</th>
                <th class='col-lg-1'>Preço</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        	foreach($produtos as $index => $produto): 
        		$soma += $produto['preco'];
		?>
            <tr>
                <td><?php echo $produto['nome'] ?></td>
                <td><?php echo $produto['preco'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="table-responsive container center col-lg-4">
    <table class="table table-striped table-hover table-condensed">
    	<caption>Procedimentos</caption>
        <thead> 
            <tr>
                <th>Nome</th>
                <th class='col-lg-1'>Preço</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        	foreach($procedimentos as $index => $procedimento): 
        		$soma += $procedimento['preco'];
		?>
            <tr>
                <td><?php echo $procedimento['nome']; ?></td>
                <td><?php echo $procedimento['preco']; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class='text-center'>
	<h3><?php echo 'TOTAL: R$'.$soma; ?></h2>
	<a class='btn btn-success' href="<?php echo RECEPCIONISTA.'/quitar_conta?idconta='.$conta['idconta']; ?>">Pagar</a>
</div>
