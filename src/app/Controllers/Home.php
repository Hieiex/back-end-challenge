<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$valorConvertido = "";
		$data['result'] = json_encode($valorConvertido);
		echo view('home', $data);
	}

	public function exchange($amount, $from, $to, $rate){

		$valorConvertido = "";
		if($this->converterValor((float)$amount, (float)$rate) != '' && ctype_upper($from) && ctype_upper($to)) {
			$valorConvertido['valorConvertido'] = $this->converterValor((float)$amount, (float)$rate);
			$valorConvertido['simboloMoeda'] = (string)$this->SimboloMoeda($to);
		}

		$data['result'] = json_encode($valorConvertido);

		echo view('home', $data);
	}
	//--------------------------------------------------------------------

	private function SimboloMoeda($moeda){

		switch ($moeda) {
			case "BRL":{
				return 'R$';
				break;
			}
			case "USD":{
				return '$';
				break;
			}
			case "EUR":{
				return '€';
				break;
			}

		}
	}

	private function converterValor($amount, $rate){

		// if($fromto == "BRLUSD" || $fromto == "BRLEUR"){
		// 	$resultado = $amount * $rate;
		// }elseif($fromto == "USDBRL" || $fromto == "EURBRL"){
		// 	$resultado = $rate / $amount;
		// }else{
		// 	return 'Foi usado uma moÃ©da nÃ£o permitida(BRL, USD, EUR), verifique se foi preenchido corretamente.';
		// }
		//
		$resultado = $amount * $rate;
 		if($resultado < 0){
			$resultado = '';
		}

		return $resultado;

	}
}
