<div class='text-center'>
	<h2>Marcar Consulta</h2>
	<hr />
</div>
<?php  
	// var_dump($_POST);
?>
<div class='container col-lg-5 center'>
	<form method='post' action='<?php echo SISTEMA."/verificar_paciente" ?>'>
		<?php  
			foreach($_POST as $key => $value):
		?>
			<input type="text" name='<?php echo $key; ?>' value='<?php echo $value; ?>' hidden>
		<?php  
			endforeach
		?>
		<div class='form-group col-lg-12'>
		    <label for='email'>Email do paciente</label>
		    <input type='text' class='form-control' name='email' placeholder="Digite o email aqui" required />
		</div>
		<div class='text-center col-lg-12'>
			<button class='btn btn-danger' type='reset'>Apagar</button>
            <button class='btn btn-primary' type='submit'>Prosseguir</button>
		</div>
	</form>
</div>