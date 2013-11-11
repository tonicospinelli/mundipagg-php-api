<?php
const NEWLINE = '<br>';

header('Content-Type: text/html; charset=UTF-8');
set_time_limit(0);
$url = "wsdl.xml";
//Colocar a chave da sua loja aqui
$key = "8A2DD57F-1ED9-4153-B4CE-69683EFADAD5";

$soap_opt['encoding']    = 'UTF-8';
$soap_opt['trace']           = true;
$soap_opt['exceptions'] = true;

$soap_client = new SoapClient( $url, $soap_opt );

//Preencho os dados com as informações sobre o pedido
$_request["createOrderRequest"]["MerchantKey"] = $key; 
$_request["createOrderRequest"]["OrderReference"] =""; // Identificação do pedido na loja
$_request["createOrderRequest"]["AmountInCents"] = "9"; // Valor do pedido em centavos	
$_request["createOrderRequest"]["AmountInCentsToConsiderPaid"] = "9"; // Valor do pedido para considerar pago
$_request["createOrderRequest"]["EmailUpdateToBuyerEnum"] = "No"; // Enviar e-mail de atualização do pedido para o comprador: Yes | No | YesIfAuthorized | YesIfNotAuthorized
$_request["createOrderRequest"]["EmailUpdateToBuyerEnum"] = "No"; // Enviar e-mail de atualização do pedido para o comprador: Yes | No | YesIfAuthorized | YesIfNotAuthorized
$_request["createOrderRequest"]["CurrencyIsoEnum"] = "BRL"; //Moeda do pedido

//Dados da transação de Cartão de Crédito
$_request["createOrderRequest"]["CreditCardTransactionCollection"]["CreditCardTransaction"][0]["AmountInCents"] = "9"; // Valor da transação
$_request["createOrderRequest"]["CreditCardTransactionCollection"]["CreditCardTransaction"][0]["CreditCardNumber"] = "518294****4019"; // Número do cartão 
$_request["createOrderRequest"]["CreditCardTransactionCollection"]["CreditCardTransaction"][0]["InstallmentCount"] = "0"; // Nº de parcelas
$_request["createOrderRequest"]["CreditCardTransactionCollection"]["CreditCardTransaction"][0]["HolderName"] = "Rui Barbosa"; // Nome do cartão
$_request["createOrderRequest"]["CreditCardTransactionCollection"]["CreditCardTransaction"][0]["SecurityCode"] = "197"; // Código de segurança
$_request["createOrderRequest"]["CreditCardTransactionCollection"]["CreditCardTransaction"][0]["ExpMonth"] = "10"; // Mês Exp
$_request["createOrderRequest"]["CreditCardTransactionCollection"]["CreditCardTransaction"][0]["ExpYear"] = "14"; // Ano Exp 
$_request["createOrderRequest"]["CreditCardTransactionCollection"]["CreditCardTransaction"][0]["CreditCardBrandEnum"] = "Mastercard"; // Bandeira do cartão : Visa ,MasterCard ,Hipercard ,Amex */
$_request["createOrderRequest"]["CreditCardTransactionCollection"]["CreditCardTransaction"][0]["PaymentMethodCode"] = "1"; // Código do meio de pagamento 
$_request["createOrderRequest"]["CreditCardTransactionCollection"]["CreditCardTransaction"][0]["CreditCardOperationEnum"] = "AuthAndCapture"; /** Tipo de operação: AuthOnly | AuthAndCapture | AuthAndCaptureWithDelay  */

	//Realiza a comunicação com o WebService
	try{
			//Envia os dados para o serviço da MundiPagg
			$_response = $soap_client->CreateOrder($_request); 
			
			echo "Request:" . NEWLINE;
			echo html_entity_decode( $soap_client->__getLastRequest());
			echo NEWLINE . NEWLINE . "Response:" . NEWLINE;
			echo html_entity_decode( $soap_client->__getLastResponse()) . NEWLINE . NEWLINE;
			
			echo "Sucesso: " . $_response->Success . "<br>";
			
			//Verifica se ocorreu algum erro na solicitação
			if($_response->CreateOrderResult->ErrorReport != null){
				//Caso tenha ocorrido algum erro exibo na tela o erro que ocorreu
				$_errorItemCollection = $_response->CreateOrderResult->ErrorReport->ErrorItemCollection;
				foreach($_errorItemCollection as $errorItem){
				 echo $errorItem->Description;
				}
				exit;
			}
			
			if($_response->CreateOrderResult->Success == true){
				$resultado = "Pedido realizado com sucesso";
			}else{
				$resultado = "Pedido não realizado" ;
			}
			//Exibe o  resultado do pedido que foi solicitado
			echo UTF8_Encode($resultado);
			
			//Obtenho a coleção de transações realizadas
			$creditCardTransactionResultCollection = $_response->CreateOrderResult->CreditCardTransactionResultCollection->CreditCardTransactionResult;
			// Exibe o resultado das transações
			foreach($creditCardTransactionResultCollection as $creditCardTransactionResult){
				$resultado = "</br>Transaction Key : ".$creditCardTransactionResult->TransactionKey ;
				$resultado = $resultado . "</br>Status da transação : ".$creditCardTransactionResult->CreditCardTransactionStatusEnum;
				$resultado = $resultado . "</br>Valor autorizado : ".$creditCardTransactionResult->AuthorizedAmountInCents;
				echo UTF8_Encode("</br>".$resultado);
			}
	}
	catch( Exception $e )
	{
		echo $e->getMessage();exit;
	}
?>