<?php

//**************** Dados Basicos para Adicionar um Novo Enviador WhatsApp **************************
		//1 - Crie uma conta no Plyner, para definir seus dados de acesso: meuid e senha
		//2 - Apos criar sua conta no Plyner, defina um numero enviador para realizar seus testes de envio de mensagem pelo WhatsApp
		//ATENÇAO: Caso tenha duvidas em criar sua conta no Plyner, acesse a academia Plyner. https://plyner.com.br/academia
		//*** Para realizar este teste, serão necessários os dados: meuid(seu id mostrado nos dados de acesso), senha(sua senha para acessar o Plyner)

		$curl = curl_init();

		// Define a URL da API
		$url = 'https://api.plyner.com.br/zap';

		// Define o corpo da requisição como um JSON
		$data = array('meuid' => 36, 'senha' => '2222', 'acaoenviador' => 'adicionar', 'numenviador' => '16991214371', 'apelido' => 'Enviador teste');
		$data_string = json_encode($data);

		// Define as opções da requisição
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
		    'Content-Type: application/json',
		    'Content-Length: ' . strlen($data_string)
		));

		// Envia a requisição e obtém a resposta
		$response = curl_exec($curl);

		// Fecha a sessão cURL
		curl_close($curl);

		//Corrige barras invertidas caso existam
		$response = stripslashes($response);

		//Grava resposta em um txt
		$arquivo ='retorno.txt'; 
		$sucesso = file_put_contents( $arquivo , $response);

		// Exibe a resposta
		echo $response;

?>