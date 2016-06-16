<div class='text-center'>
	<h2>Registrar Procedimento em conta</h2>
	<hr />
</div>
<?php  
	var_dump($_POST);
	$conta = run_select('select * from conta where idpaciente='.$_POST['idpaciente'].' and pago=0;');
	if(!$conta){
		swal('Erro!', 'Essa pessoa não possui uma conta em aberto', 'error', '/'.BASE, 'btn-danger');
	}
	$procedimentos = run_select_many('select nome, idprocedimento from procedimento;');
	var_dump($procedimentos);
?>
<div class='container col-lg-5 center'>
	<form method='post' action='<?php echo RECEPCIONISTA."/registrar_procedimento" ?>'>
		<input type="text" name='idconta' value='<?php echo $conta["idconta"]; ?>' hidden>
		<div class='form-group col-lg-12'>
		    <label for='procedimento'>Procedimento</label>
		    <select class='form-control' name="idprocedimento" required>
		    	<option value="" selected disabled>Selecione um procedimento</option>
		    	<?php foreach($procedimentos as $index => $procedimento): ?>
				<option value="<?php echo $procedimento['idprocedimento']; ?>">
					<?php echo $procedimento['nome']; ?>
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