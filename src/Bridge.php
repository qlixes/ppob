<?php

namespace qlixes\Bridger;

use qlixes\Bridger\{Pulsamu, Mobilepulsa};

class Bridge
{
	use Helper;

	var $pulsamu;
	var $mobilepulsa;

	// konfigurasi utk label service / layanan
	var $labels = [
		'xl'		=> 'XL',
		'telkomsel'	=> 'Tekomsel',
		'indosat'	=> 'Indosat',
		'smartfren'	=> 'Smartfren',
		'tri'		=> 'Three',
		'axis'		=> 'Axis',

		'pgn'		=> 'PGM',
		'pln'		=> 'PLN',
		'telkom'	=> 'Telkom',

		'flight'	=> '',
		'train'		=> '',
		'movie'		=> '',
		'hotel'		=> '',

		'bpjs_kesehatan'	=> 'BPJS Kesehatan',
		'bpjs_tenagakerja'	=> 'BPJS Tenaga Kerja',
		'jiwasraya'			=> 'Asuransi Jiwa Sraya',
		'prudentials'		=> 'Asuransi Prudentials',
		'sinarmaslife'		=> 'Asuransi Sinar Mas Life',
		'sinarmas'			=> 'Asuransi Sinar Mas',
		'aia'				=>	'Asuransi AIA',

		'emoney'	=> 'EMONEY',
		'ecash'		=> 'ECASH',
		'ovo'		=> 'OVO',
		'gopay'		=> 'GOPAY',
		'dana'		=> 'DANA',
		'mtix'		=> 'TIX-iD',
		'tixid'		=> 'M-TIX',
		'tcash'		=> 'Tcash Telkomsel',
		'tapcash'	=> 'Tapcash BNI',

		'centrinnet'	=> 'Centrin Net',
		'indihome'		=> 'Indihome',
		'speedy'		=> 'Speedy',
		'firstmedia'	=> 'First Media',
		'okevision'		=> 'Okevision',
		'telkom'		=> 'Telkom',
		'cbn'			=> 'CBN',
		'indovision'	=> 'Indovision',
		'toptv'			=> 'TOP TV',
		'oktv'			=> 'OK TV',
		'yestv'			=> 'YES TV',
		'telkomvision'	=> 'Telkom Vision',
		'bigtv'			=> 'Big TV',
		'nexmedia'		=> 'Nexmedia TV',

		'zynga'			=> '',
		'winner'		=> '',
		'wavepro'		=> '',
		'vtc'			=> '',
		'unipin'		=> '',
		'teracord'		=> '',
		'serenity'		=> '',
		'rappelzon'		=> '',
		'playspan'		=> '',
		'playpoint'		=> '',
		'playon'		=> '',
		'orangegame'	=> '',
		'mycard'		=> '',
		'mol'			=> '',
		'mobilelegends'	=> 'Mobile Legends',
		'megaxus'		=> 'Megaxus',
		'matchmove'		=> '',
		'mainkan'		=> '',
		'lyto'			=> 'Lyto',
		'koram'			=> '',
		'itunes'		=> 'iTunes',
		'ingame'		=> '',
		'iahgames'		=> '',
		'googleplay'	=> 'Google Play',
		'golonline'		=> '',
		'gogame'		=> '',
		'gemscool'		=> 'Gemscool',
		'garena'		=> 'Garena',
		'fastblack'		=> '',
		'digicash'		=> '',;
		'dasagame'		=> '',
		'cherry'		=> '',
		'cabal'			=> '',
		'asiasoft'		=> '',

		'wom'			=> 'WOM Multifinance',
		'baf'			=> 'Bussan Auto Finance',
		'maf'			=> 'Mega Auto Finance',
		'mcf'			=> 'Mega Central Finance',
		'clmb'			=> 'Columbia Finance',
		'woka'			=> 'WOKA Finance',
		'smart'			=> 'Smart Finance',
		'adira'			=> 'Adira Finance',
		'fif'			=> 'FIF Finance',
		'anzpl'			=> 'ANZ Personal Loan',
		'ktapermata'	=> 'KTA Permata',
		'citibankcash'	=> 'Citibank Ready Cash',
		'citibankpay'	=> 'Citibank Personal Loan',

		'americanexp'	=> 'American Express',
		'bni'			=> 'Bank BNI',
		'uob'			=> 'Bank UOB',
		'anz'			=> 'Bank ANZ',
		'permata'		=> 'Bank Permata',
		'danamon'		=> 'Bank Danamon',
		'panin'			=> 'Bank Panin',
		'bukopin'		=> 'Bank Bukopin',
		'bumiputra'		=> 'Bank Bumi Putera',
		'citibank'		=> 'Citibank',
		'digibank'		=> 'Digibank',

		'wifiid'		=> 'Wifi Id',
	];

	function __construct()
	{
		if(!($this->pulsamu instanceof Pulsamu))
			$this->pulsamu = new Pulsamu();
		if(!($this->mobilepulsa instanceof Pulsamu))
			$this->mobilepulsa = new Pulsamu();
	}

	function getPrabayarPulsa($number)
	{
		$provider = $this->getProviderNumber($number);

		$vendor = config('bridger.pulsa_pra.' . $provider);

		$data = [];
		$data['output'] = $this->{$vendor}->getPrabayarPulsa($number);
		$data['vendor'] = $this->labels[$provider];

		return $data;
	}

	function getPrabayarData($number)
	{
		$provider = $this->getProviderNumber($number);

		$vendor = config('bridger.data_pra.' . $provider);

		$data = [];
		$data['output'] = $this->{$vendor}->getPrabayarData($number);
		$data['vendor'] = $this->labels[$provider];

		return $data;
	}

	function getPascabayarPulsa($number)
	{
		$provider = $this->getProviderNumber($number);

		$vendor = config('bridger.pulsa_pasca.' . $provider);

		$data = [];
		$data['output'] = $this->{$vendor}->requestPascabayarPulsa($number);
		$data['vendor'] = $this->labels[$provider];

		return $data;
	}

	function getPrabayarPln($params = [])
	{
		$vendor = config('bridger.pulsa_pra.' . $provider);

		$data = [];
		$data['output'] = $this->{$vendor}->getPrabayarPln($params);
		$data['vendor'] = $this->labels['pln'];

		return $data;
	}

	function getPascabayarPln($number)
	{
		$vendor = config('bridger.pln.' . $provider);

		$data = [];
		$data['output'] = $this->{$vendor}->getPascabayarPln($number);
		$data['vendor'] = $this->labels['pln'];

		return $data;
	}

	function getPascabayarPgn($number);
	function getPascabayarTelkom($number);
	function getPascabayarIndihome($number);
	function getPascabayarSpeedy($number);
	function getPascabayarFirstmedia($number);
	function getPascabayarOkevision($number);
	function getPascabayarCbn($number);
	function getPascabayarCentrinet($number);
	function getPrabayarWifiid();
	function getPrabayarMobileLegends();
	function getPrabayarMegaxus();
	function getPrabayarLyto();
	function getPrabayarItunes();
	function getPrabayarGooglePlay();
	function getPrabayarGemsCool();
	function getPrabayarGarena(); 
	function getPascabayarWom($number);
	function getPascabayarBussan($number);
	function getPascabayarMegaAuto($number);
	function getPascabayarMegaCentral($number);
	function getPascabayarColumbia($number);
	function getPascabayarWoka($number);
	function getPascabayarSmart($number);
	function getPascabayarAdira($number);
	function getPascabayarFif($number);
	function getPascabayarAnzFinance($number);
	function getPascabayarKtaPermata($number);
	function getPascabayarCitibankCash($number);
	function getPascabayarCitibankPay($number);
	function getPascabayarAmericaExpress($number);
	function getPascabayarBni($number);
	function getPascabayarUob($number);
	function getPascabayarAnz($number);
	function getPascabayarPermata($number);
	function getPascabayarDanamon($number);
	function getPascabayarPanin($number);
	function getPascabayarBukopin($number);
	function getPascabayarBumiputra($number);
	function getPascabayarCitibank($number);
	function getPascabayarDigibank($number);
	function getPrabayarEmoney($number);
	function getPrabayarEcash($number);
	function getPrabayarOvo($number);
	function getPrabayarGopay($number);
	function getPrabayarDana($number);
	function getPrabayarMtix($number);
	function getPrabayarTixid($number);
	function getPrabayarTcash($number);
	function getPrabayarTapcash($number);

	function postPrabayarPulsa($number);
	function postPrabayarData($number);
	function postPascabayarPulsa($number);
	function postPrabayarPln($params = []);
	function postPascabayarPln($number);
	function postPascabayarPgn($number);
	function postPascabayarTelkom($number);
	function postPascabayarIndihome($number);
	function postPascabayarSpeedy($number);
	function postPascabayarFirstmedia($number);
	function postPascabayarOkevision($number);
	function postPascabayarCbn($number);
	function postPascabayarCentrinet($number);
	function postPrabayarWifiid();
	function postPrabayarMobileLegends();
	function postPrabayarMegaxus();
	function postPrabayarLyto();
	function postPrabayarItunes();
	function postPrabayarGooglePlay();
	function postPrabayarGemsCool();
	function postPrabayarGarena(); 
	function postPascabayarWom($number);
	function postPascabayarBussan($number);
	function postPascabayarMegaAuto($number);
	function postPascabayarMegaCentral($number);
	function postPascabayarColumbia($number);
	function postPascabayarWoka($number);
	function postPascabayarSmart($number);
	function postPascabayarAdira($number);
	function postPascabayarFif($number);
	function postPascabayarAnzFinance($number);
	function postPascabayarKtaPermata($number);
	function postPascabayarCitibankCash($number);
	function postPascabayarCitibankPay($number);
	function postPascabayarAmericaExpress($number);
	function postPascabayarBni($number);
	function postPascabayarUob($number);
	function postPascabayarAnz($number);
	function postPascabayarPermata($number);
	function postPascabayarDanamon($number);
	function postPascabayarPanin($number);
	function postPascabayarBukopin($number);
	function postPascabayarBumiputra($number);
	function postPascabayarCitibank($number);
	function postPascabayarDigibank($number);
	function postPrabayarEmoney($number);
	function postPrabayarEcash($number);
	function postPrabayarOvo($number);
	function postPrabayarGopay($number);
	function postPrabayarDana($number);
	function postPrabayarMtix($number);
	function postPrabayarTixid($number);
	function postPrabayarTcash($number);
	function postPrabayarTapcash($number);
}