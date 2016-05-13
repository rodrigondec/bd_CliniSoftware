<div class='text-center'>
	<h2>Contato</h2>
	<hr />
</div>

<div class='container col-lg-5 center'>
	<form method='post'>
		<div class='form-group'>
		    <label for='nome'>input 1</label>
		    <input type='nome' name='nome' class='form-control' placeholder='Nome'  required />
		</div>
		<div class='text-center'>
			<button class='btn btn-danger' type='reset'>Apagar</button>
            <button class='btn btn-primary' type='submit'>Enviar</button>
		</div>
	</form>
</div>
<?php 
    if(count($_POST) > 0){
    	
    	ob_clean();
		header('LOCATION: '.SISTEMA.'contato');
    }
?>