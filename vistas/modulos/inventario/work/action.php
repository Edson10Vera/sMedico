<?php

//action.php

if(isset($_POST["action"]))
{
	if($_POST["action"] == 'insert')
	{
		$form_data = array(
			'nombre'	=>	$_POST['nombre'],
			'presentacion'		=>	$_POST['presentacion'],
			'tipo'		=>	$_POST['tipo'],
			'clave' => $_POST['clave'],
			'fechaentrada' => $_POST['fechaentrada'],
			'fechacaducidad' => $_POST['fechacaducidad']

		);
		$api_url = "http://localhost/medico/vistas/modulos/inventario/api/test_api.php?action=insert";  //change this url as per your folder path for api folder
		$client = curl_init($api_url);

		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($client);
		curl_close($client);
		$result = json_decode($response, true);
		foreach($result as $keys => $values)
		{
			if($result[$keys]['success'] == '1')
			{
				echo 'insert';
			}
			else
			{
				echo 'error';
			}
		}
	}

	if($_POST["action"] == 'fetch_single')
	{
		$id = $_POST["id"];

		$api_url = "http://localhost/medico//vistas/modulos/inventario/api/test_api.php?action=fetch_single&id=".$id."";  //change this url as per your folder path for api folder
		$client = curl_init($api_url);

		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($client);
		echo $response;
	}

	if($_POST["action"] == 'update')
	{
		$form_data = array(
			'nombre'	=>	$_POST['nombre'],
			'presentacion'		=>	$_POST['presentacion'],
			'tipo'		=>	$_POST['tipo'],
			'id'			=>	$_POST['hidden_id'],
			'clave' => $_POST['clave'],
			'fechaentrada' => $_POST['fechaentrada'],
			'fechacaducidad' => $_POST['fechacaducidad']
		);
		$api_url = "http://localhost/medico//vistas/modulos/inventario/api/test_api.php?action=update";  //change this url as per your folder path for api folder
		$client = curl_init($api_url);

		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($client);
		curl_close($client);
		$result = json_decode($response, true);
		foreach($result as $keys => $values)
		{
			if($result[$keys]['success'] == '1')
			{
				echo 'update';
			}
			else
			{
				echo 'error';
			}
		}
	}

	if($_POST["action"] == 'delete')
	{
		$id = $_POST['id'];
		$api_url = "http://localhost/medico//vistas/modulos/inventario/api/test_api.php?action=delete&id=".$id.""; //change this url as per your folder path for api folder
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);
		echo $response;
	}

	/*<--------------------------------------------- Action Caja --------------------------------------------->*/

	if($_POST["action"] == 'insertCaja')
	{
		
		$form_data = array(
			'id_caja'	=>	$_POST['id_caja'],
			'caducidad'		=>	$_POST['caducidad'],
			'contenido'		=>	$_POST['contenido'],
			'medicamento_id'		=>	$_POST['medicamento_id'],
			'clave' => $_POST['clave'],
			'fechaentrada' => $_POST['fechaentrada'],
			'fechacaducidad' => $_POST['fechacaducidad']
		);
		$api_url = "http://localhost/medico//vistas/modulos/inventario/api/test_api.php?action=insertCaja";  //change this url as per your folder path for api folder
		$client = curl_init($api_url);

		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($client);
		curl_close($client);
		$result = json_decode($response, true);
		foreach($result as $keys => $values)
		{
			if($result[$keys]['success'] == '1')
			{
				echo 'insert';
			}
			else
			{
				echo 'error';
			}
		}
	}

	if($_POST["action"] == 'deleteCaja')
	{
		$id = $_POST['id_caja'];
		$api_url = "http://localhost/medico/vistas/modulos/inventario/api/test_api.php?action=deleteCaja&id=".$id.""; //change this url as per your folder path for api folder
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);
		echo $response;
	}
}
?>