<?php

    // função que executa SQL para insert
    // INSERT INTO $tabela ($chaves,...) VALUES ($valores)
    function insert($dados, $tabela) {
        $sql = 'INSERT INTO '.$tabela;
        $chaves = array();
        $valores = array();
        foreach ($dados as $chave => $valor){
            $chaves[] = $chave;
            $valores[] = '\''.$valor.'\'';
        }
        $str_chaves = implode(',', $chaves);
        $str_valores = implode(',', $valores);

        $sql .= ' ('.$str_chaves.') VALUES ('.$str_valores.');';
        // var_dump($sql);

        try {
        	if(!mysql_query($sql, LINK)){
        		throw new Exception(mysql_error(LINK));
        	}
        	return true;
        } catch (Exception $e){
			$titulo = 'Erro no banco de dados!';
    		$mensagem = str_replace('\'', '´', $e->getMessage());
	    	swal($titulo, $mensagem, 'error', '', 'btn-danger');
	    	return false;
        }
    }

    // função que executa SQL para DELETE
    // DELETE FROM $tabela WHERE id=$id
    function delete($id, $tabela){
        $sql = 'DELETE FROM '.$tabela.' WHERE id='.$id.';';
        // var_dump($sql);

        try {
        	if(!mysql_query($sql, LINK)){
        		throw new Exception(mysql_error(LINK));
        	}
        	return true;
        } catch (Exception $e) {
			$titulo = 'Erro no banco de dados!';
    		$mensagem = str_replace('\'', '´', $e->getMessage());
	    	swal($titulo, $mensagem, 'error', '', 'btn-danger');
	    	return false;
        }
    }

    // função que executa SQL para UPDATE
    // UPDATE $tabela SET $chave=$valor,... WHERE id=$id
    function update($dados, $tabela, $restricao, $id, $aspas = true){
        $sql = 'UPDATE '.$tabela.' SET ';
        $alteracoes = array();
        foreach ($dados as $chave => $valor) {
            $alteracoes[] = $chave.'=\''.$valor.'\'';
        }
        $sql .= implode(', ', $alteracoes);
        $sql .= ' WHERE '.$restricao.' = ';
        if($aspas){
            $sql .= '\''.$id.'\'';
        }
        else{
            $sql .= $id;
        }
        $sql .= ';';

        // var_dump($sql);

        try {
        	if(!mysql_query($sql, LINK)){
        		throw new Exception(mysql_error(LINK));
        	}
        	return true;
        } catch (Exception $e) {
			$titulo = 'Erro no banco de dados!';
    		$mensagem = str_replace('\'', '´', $e->getMessage());
    		$mensagem = str_replace('Duplicate entry', 'Dado duplicado', $mensagem);
    		$mensagem = str_replace('for key', 'para campo', $mensagem);
	    	swal($titulo, $mensagem, 'error', '', 'btn-danger');
	    	return false;
        }
    }

    // função que executa SQL para SELECT com WHERE
    // SELECT $campo FROM $tabela WHERE ID = $id
    function select($campo, $tabela, $restricao = '', $id = '', $aspas = true){
        $sql = 'SELECT '.$campo.' from '.$tabela;
        if($restricao != ''){
            $sql .= ' WHERE '.$restricao.' = ';
            if($aspas){
                $sql .= '\''.$id.'\'';
            }
            else{
                $sql .= $id;
            }
        }
        $sql .= ' LIMIT 1;';
        // var_dump($sql);echo "<br />";
        $resultado = mysql_query($sql, LINK);
        try {
        	if(!$resultado){
        		throw new Exception(mysql_error(LINK));
        	}
        	return mysql_fetch_assoc($resultado);
        } catch (Exception $e) {
        	$titulo = 'Erro no banco de dados!';
    		$mensagem = str_replace('\'', '´', $e->getMessage());
	    	swal($titulo, $mensagem, 'error', '', 'btn-danger');
	    	return false;
        }
    }

    // função que executa SQL para SELECT
    // SELECT $campo FROM $tabela
    function select_many($campo, $tabela, $restricao = '', $id = '', $aspas = true){
        $sql = 'SELECT '.$campo.' from '.$tabela;
        if($restricao != ''){
            $sql .= ' WHERE '.$restricao.' = ';
            if($aspas){
                $sql .= '\''.$id.'\'';
            }
            else{
                $sql .= $id;
            }
        }
        $sql .= ';';
        // var_dump($sql);echo "<br />";
        $resultado = mysql_query($sql, LINK);
        try {
        	if(!$resultado){
        		throw new Exception(mysql_error(LINK));
        	}
        	$objetos = array();
	        while($row = mysql_fetch_assoc($resultado)){
	            $objetos[] = $row;
	        }
	        return $objetos;
        } catch (Exception $e) {
        	$titulo = 'Erro no banco de dados!';
    		$mensagem = str_replace('\'', '´', $e->getMessage());
	    	swal($titulo, $mensagem, 'error', '', 'btn-danger');
	    	return array();
        }
        
    }
?>