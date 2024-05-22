<?php

//**************** Dados Basicos para Envio de Mensagem no WhatsApp com Arquivo PDF **************************
		//1 - Crie uma conta no Plyner, para definir seus dados de acesso: meuid e senha
		//2 - Apos criar sua conta no Plyner, defina um numero enviador para realizar seus testes de envio de mensagem pelo WhatsApp
		//ATENÇAO: Caso tenha duvidas em criar sua conta no Plyner, acesse a academia Plyner. https://plyner.com.br/academia
		//*** Para realizar este teste, serão necessários os dados: meuid(seu id mostrado nos dados de acesso), senha(sua senha para acessar o Plyner), enviador (Id mostrado nos seus enviadores zap)

		$curl = curl_init();

		// Define a URL da API
		$url = 'https://api.plyner.com.br/zap';

		//Define o local do arquivo desejado
		$data = file_get_contents('ExemploPDF.pdf');

		//Converte o arquivo em string base64
		$media = base64_encode($data);

		// Define o corpo da requisição como um JSON
		$data = array('meuid' => 36, 'senha' => '22222', 'destinatario' => '16991214371', 'msg' => 'teste com PDF', 'enviador' => 191, 'tipoanexo' => 3, 'anexomsg' => 'ExemploPDF.pdf', 'anexo64' => $media);
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

		// Exibe a resposta
		echo $response;

?>