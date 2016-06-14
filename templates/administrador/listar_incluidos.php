<div class='text-center'>
	<h2>Listar Produtos Incluidos</h2>
	<hr />
</div>
<?php  
	$incluidos = run_select_many('select procedimento.nome as nome_procedimento, produto.nome as nome_produto from procedimento, inclui, produto where procedimento.idprocedimento=inclui.idprocedimento and produto.idproduto=inclui.idproduto;');
	// var_dump($incluidos);
?>
<div class="table-responsive container center col-lg-6">
    <table class="table table-striped table-hover table-condensed">
        <thead> 
            <tr>
                <th>Nome Procedimento</th>
                <th>Nome Produto</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($incluidos as $index => $incluido): ?>
            <tr>
                <td><?php echo $incluido['nome_procedimento'] ?></td>
                <td><?php echo $incluido['nome_produto'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>