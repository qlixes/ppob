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
		'speedy'		=> 'Telkom Speedy',

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
		$vendor = config('bridger.pln_pra');

		$data = [];
		$data['output'] = $this->{$vendor}->getPrabayarPln($params);
		$data['vendor'] = $this->labels['pln'];

		return $data;
	}

	function getPascabayarPln($number)
	{
		$vendor = config('bridger.pln_pasca');

		$data = [];
		$data['output'] = $this->{$vendor}->getPascabayarPln($number);
		$data['vendor'] = $this->labels['pln'];

		return $data;
	}

	function getPascabayarPgn($number)
	{
		$vendor = config('bridger.pgn');

		$data = [];
		$data['output'] = $this->{$vendor}->getPascabayarPgn($number);
		$data['vendor'] = $this->labels['pgn'];

		return $data;
	}

	function getPascabayarTelkom($number)
	{
		$vendor = config('bridger.telkom');

		$data = [];
		$data['output'] = $this->{$vendor}->getPascabayarTelkom($number);
		$data['vendor'] = $this->labels['telkom'];

		return $data;
	}

	function getPascabayarIndihome($number)
	{
		$vendor = config('bridger.indihome');

		$data = [];
		$data['output'] = $this->{$vendor}->getPascabayarIndihome($number);
		$data['vendor'] = $this->labels['indihome'];

		return $data;
	}

	function getPascabayarSpeedy($number)
	{
		$vendor = config('bridger.speedy');

		$data = [];
		$data['output'] = $this->{$vendor}->getPascabayarSpeedy($number);
		$data['vendor'] = $this->labels['speedy'];

		return $data;
	}

	function getPascabayarFirstmedia($number)
	{
		$vendor = config('bridger.firstmedia');

		$data = [];
		$data['output'] = $this->{$vendor}->getPascabayarFirstmedia($number);
		$data['vendor'] = $this->labels['firstmedia'];

		return $data;
	}

	function getPascabayarOkevision($number)
	{
		$vendor = config('bridger.okevision');

		$data = [];
		$data['output'] = $this->{$vendor}->getPascabayarOkevision($number);
		$data['vendor'] = $this->labels['okevision'];

		return $data;
	}

	function getPascabayarCbn($number)
	{
		$vendor = config('bridger.cbn');

		$data = [];
		$data['output'] = $this->{$vendor}->getPascabayarCbn($number);
		$data['vendor'] = $this->labels['cbn'];

		return $data;
	}

	function getPascabayarCentrinet($number)
	{
		$vendor = config('bridger.centrinnet');

		$data = [];
		$data['output'] = $this->{$vendor}->getPascabayarCentrinnet($number);
		$data['vendor'] = $this->labels['centrinnet'];

		return $data;
	}

	function getPrabayarWifiid();
	{
		$vendor = config('bridger.wifiid');

		$data = [];
		$data['output'] = $this->{$vendor}->getPascabayarWifiid($number);
		$data['vendor'] = $this->labels['wifiid'];

		return $data;
	}

	function getPrabayarMobileLegends()
	{
		$vendor = config('bridger.mobilelegends');

		$data = [];
		$data['output'] = $this->{$vendor}->getPascabayarMobilelegends($number);
		$data['vendor'] = $this->labels['mobilelegends'];

		return $data;
	}

	function getPrabayarMegaxus()
	{
		$vendor = config('bridger.megaxus');

		$data = [];
		$data['output'] = $this->{$vendor}->getPascabayarMegaxus($number);
		$data['vendor'] = $this->labels['megaxus'];

		return $data;
	}

	function getPrabayarLyto()
	{
		$vendor = config('bridger.lyto');

		$data = [];
		$data['output'] = $this->{$vendor}->getPascabayarLyto($number);
		$data['vendor'] = $this->labels['lyto'];

		return $data;
	}

	function getPrabayarItunes()
	{
		$vendor = config('bridger.itunes');

		$data = [];
		$data['output'] = $this->{$vendor}->getPascabayarItunes($number);
		$data['vendor'] = $this->labels['itunes'];

		return $data;
	}

	function getPrabayarGooglePlay()
	{
		$vendor = config('bridger.googleplay');

		$data = [];
		$data['output'] = $this->{$vendor}->getPascabayarGoogleplay($number);
		$data['vendor'] = $this->labels['googleplay'];

		return $data;
	}

	function getPrabayarGemsCool()
	{
		$vendor = config('bridger.gemscool');

		$data = [];
		$data['output'] = $this->{$vendor}->getPascabayarGemscool($number);
		$data['vendor'] = $this->labels['gemscool'];

		return $data;
	}

	function getPrabayarGarena()
	{
		$vendor = config('bridger.garena');

		$data = [];
		$data['output'] = $this->{$vendor}->getPascabayarGarena($number);
		$data['vendor'] = $this->labels['garena'];

		return $data;
	}

	function getPascabayarWom($number)
	{
		$vendor = config('bridger.wom');

		$data = [];
		$data['output'] = $this->{$vendor}->getPascabayarWom($number);
		$data['vendor'] = $this->labels['wom'];

		return $data;
	}

	function getPascabayarBussan($number)
	{
		$vendor = config('bridger.baf');

		$data = [];
		$data['output'] = $this->{$vendor}->getPascabayarBussan($number);
		$data['vendor'] = $this->labels['baf'];

		return $data;
	}

	function getPascabayarMegaAuto($number)
	{
		$vendor = config('bridger.maf');

		$data = [];
		$data['output'] = $this->{$vendor}->getPascabayarMegaAuto($number);
		$data['vendor'] = $this->labels['maf'];

		return $data;
	}

	function getPascabayarMegaCentral($number)
	{
		$vendor = config('bridger.mcf');

		$data = [];
		$data['output'] = $this->{$vendor}->getPascabayarMegaCentral($number);
		$data['vendor'] = $this->labels['mcf'];

		return $data;
	}

	function getPascabayarColumbia($number)
	{
		$vendor = config('bridger.clmb');

		$data = [];
		$data['output'] = $this->{$vendor}->getPascabayarColumbia($number);
		$data['vendor'] = $this->labels['clmb'];

		return $data;
	}

	function getPascabayarWoka($number)
	{
		$vendor = config('bridger.woka');

		$data = [];
		$data['output'] = $this->{$vendor}->getPascabayarWoka($number);
		$data['vendor'] = $this->labels['woka'];

		return $data;
	}

	function getPascabayarSmart($number)
	{
		$vendor = config('bridger.smart');

		$data = [];
		$data['output'] = $this->{$vendor}->getPascabayarSmart($number);
		$data['vendor'] = $this->labels['smart'];

		return $data;
	}

	function getPascabayarAdira($number)
	{
		$vendor = config('bridger.adira');

		$data = [];
		$data['output'] = $this->{$vendor}->getPascabayarAdira($number);
		$data['vendor'] = $this->labels['adira'];

		return $data;
	}

	function getPascabayarFif($number)
	{
		$vendor = config('bridger.fif');

		$data = [];
		$data['output'] = $this->{$vendor}->getPascabayarFif($number);
		$data['vendor'] = $this->labels['fif'];

		return $data;
	}

	function getPascabayarAnzFinance($number)
	{
		$vendor = config('bridger.anzpl');

		$data = [];
		$data['output'] = $this->{$vendor}->getPascabayarAnzFinance($number);
		$data['vendor'] = $this->labels['anzpl'];

		return $data;
	}

	function getPascabayarKtaPermata($number)
	{
		$vendor = config('bridger.ktapermata');

		$data = [];
		$data['output'] = $this->{$vendor}->getPascabayarKtaPermata($number);
		$data['vendor'] = $this->labels['ktapermata'];

		return $data;
	}

	function getPascabayarCitibankCash($number)
	{
		$vendor = config('bridger.citibankcash');

		$data = [];
		$data['output'] = $this->{$vendor}->getPascabayarCitibankCash($number);
		$data['vendor'] = $this->labels['citibankcash'];

		return $data;
	}

	function getPascabayarCitibankPay($number)
	{
		$vendor = config('bridger.citibankpay');

		$data = [];
		$data['output'] = $this->{$vendor}->getPascabayarCitibankPay($number);
		$data['vendor'] = $this->labels['citibankpay'];

		return $data;
	}

	function getPascabayarAmericanExpress($number)
	{
		$vendor = config('bridger.americanexp');

		$data = [];
		$data['output'] = $this->{$vendor}->getPascabayarAmericanExpress($number);
		$data['vendor'] = $this->labels['americanexp'];

		return $data;
	}

	function getPascabayarBni($number)
	{
		$vendor = config('bridger.bni');

		$data = [];
		$data['output'] = $this->{$vendor}->getPascabayarBni($number);
		$data['vendor'] = $this->labels['bni'];

		return $data;
	}

	function getPascabayarUob($number)
	{
		$vendor = config('bridger.uob');

		$data = [];
		$data['output'] = $this->{$vendor}->getPascabayarUob($number);
		$data['vendor'] = $this->labels['uob'];

		return $data;
	}

	function getPascabayarAnz($number)
	{
		$vendor = config('bridger.anz');

		$data = [];
		$data['output'] = $this->{$vendor}->getPascabayarAnz($number);
		$data['vendor'] = $this->labels['anz'];

		return $data;
	}

	function getPascabayarPermata($number)
	{
		$vendor = config('bridger.permata');

		$data = [];
		$data['output'] = $this->{$vendor}->getPascabayarPermata($number);
		$data['vendor'] = $this->labels['permata'];

		return $data;
	}

	function getPascabayarDanamon($number)
	{
		$vendor = config('bridger.danamon');

		$data = [];
		$data['output'] = $this->{$vendor}->getPascabayarDanamon($number);
		$data['vendor'] = $this->labels['danamon'];

		return $data;
	}

	function getPascabayarPanin($number)
	{
		$vendor = config('bridger.panin');

		$data = [];
		$data['output'] = $this->{$vendor}->getPascabayarPanin($number);
		$data['vendor'] = $this->labels['panin'];

		return $data;
	}

	function getPascabayarBukopin($number)
	{
		$vendor = config('bridger.bukopin');

		$data = [];
		$data['output'] = $this->{$vendor}->getPascabayarBukopin($number);
		$data['vendor'] = $this->labels['bukopin'];

		return $data;
	}

	function getPascabayarBumiputra($number)
	{
		$vendor = config('bridger.bumiputra');

		$data = [];
		$data['output'] = $this->{$vendor}->getPascabayarBumiputra($number);
		$data['vendor'] = $this->labels['bumiputra'];

		return $data;
	}

	function getPascabayarCitibank($number)
	{
		$vendor = config('bridger.citibank');

		$data = [];
		$data['output'] = $this->{$vendor}->getPascabayarCitibank($number);
		$data['vendor'] = $this->labels['citibank'];

		return $data;
	}

	function getPascabayarDigibank($number)
	{
		$vendor = config('bridger.digibank');

		$data = [];
		$data['output'] = $this->{$vendor}->getPascabayarDigibank($number);
		$data['vendor'] = $this->labels['digibank'];

		return $data;
	}

	function getPrabayarEmoney()
	{
		$vendor = config('bridger.emoney');

		$data = [];
		$data['output'] = $this->{$vendor}->getPrabayarEmoney(=);
		$data['vendor'] = $this->labels['emoney'];

		return $data;
	}

	function getPrabayarEcash()
	{
		$vendor = config('bridger.ecash');

		$data = [];
		$data['output'] = $this->{$vendor}->getPrabayarEmoney();
		$data['vendor'] = $this->labels['ecash'];

		return $data;
	}

	function getPrabayarOvo()
	{
		$vendor = config('bridger.ovo');

		$data = [];
		$data['output'] = $this->{$vendor}->getPrabayarOvo();
		$data['vendor'] = $this->labels['ovo'];

		return $data;
	}

	function getPrabayarGopay()
	{
		$vendor = config('bridger.gopay');

		$data = [];
		$data['output'] = $this->{$vendor}->getPrabayarGopay();
		$data['vendor'] = $this->labels['gopay'];

		return $data;
	}

	function getPrabayarDana()
	{
		$vendor = config('bridger.dana');

		$data = [];
		$data['output'] = $this->{$vendor}->getPrabayarDana();
		$data['vendor'] = $this->labels['dana'];

		return $data;
	}

	function getPrabayarMtix()
	{
		$vendor = config('bridger.mtix');

		$data = [];
		$data['output'] = $this->{$vendor}->getPrabayarMtix();
		$data['vendor'] = $this->labels['mtix'];

		return $data;
	}

	function getPrabayarTixid()
	{
		$vendor = config('bridger.tixid');

		$data = [];
		$data['output'] = $this->{$vendor}->getPrabayarTixid();
		$data['vendor'] = $this->labels['tixid'];

		return $data;
	}

	function getPrabayarTcash()
	{
		$vendor = config('bridger.tcash');

		$data = [];
		$data['output'] = $this->{$vendor}->getPrabayarTcash();
		$data['vendor'] = $this->labels['tcash'];

		return $data;
	}

	function getPrabayarTapcash()
	{
		$vendor = config('bridger.tapcash');

		$data = [];
		$data['output'] = $this->{$vendor}->getPrabayarTapCash();
		$data['vendor'] = $this->labels['tapcash'];

		return $data;
	}

	function postPrabayarPulsa($params = []);
	{
		return $this->bayarPrabayar($params);
	}

	function postPrabayarData($params = [])
	{
		return $this->bayarPrabayar($params);
	}

	function postPascabayarPulsa($params = [])
	{
		return $this->bayarPascabayar($params);
	}

	function postPrabayarPln($params = [])
	{
		return $this->bayarPascabayar($params);
	}

	function postPascabayarPln($params = [])
	{
		return $this->bayarPascabayar($params);
	}

	function postPascabayarPgn($params = [])
	{
		return $this->bayarPascabayar($params);
	}

	function postPascabayarTelkom($params = [])
	{
		return $this->bayarPascabayar($params);
	}

	function postPascabayarIndihome($params = [])
	{
		return $this->bayarPascabayar($params);
	}

	function postPascabayarSpeedy($params = [])
	{
		return $this->bayarPascabayar($params);
	}

	function postPascabayarFirstmedia($params = [])
	{
		return $this->bayarPascabayar($params);
	}

	function postPascabayarOkevision($params = [])
	{
		return $this->bayarPascabayar($params);
	}

	function postPascabayarCbn($params = [])
	{
		return $this->bayarPascabayar($params);
	}

	function postPascabayarCentrinet($params = [])
	{
		return $this->bayarPascabayar($params);
	}

	function postPrabayarWifiid($params = [])
	{
		return $this->bayarPrabayar($params);
	}

	function postPrabayarMobileLegends($params = [])
	{
		return $this->bayarPrabayar($params);
	}

	function postPrabayarMegaxus($params = [])
	{
		return $this->bayarPrabayar($params);
	}

	function postPrabayarLyto($params = [])
	{
		return $this->bayarPrabayar($params);
	}

	function postPrabayarItunes($params = [])
	{
		return $this->bayarPrabayar($params);
	}

	function postPrabayarGooglePlay($params = [])
	{
		return $this->bayarPrabayar($params);
	}

	function postPrabayarGemsCool($params = [])
	{
		return $this->bayarPrabayar($params);
	}

	function postPrabayarGarena($params = [])
	{
		return $this->bayarPrabayar($params);
	}

	function postPascabayarWom($params = [])
	{
		return $this->bayarPascabayar($params);
	}

	function postPascabayarBussan($params = [])
	{
		return $this->bayarPascabayar($params);
	}

	function postPascabayarMegaAuto($params = [])
	{
		return $this->bayarPascabayar($params);
	}

	function postPascabayarMegaCentral($params = [])
	{
		return $this->bayarPascabayar($params);
	}

	function postPascabayarColumbia($params = [])
	{
		return $this->bayarPascabayar($params);
	}

	function postPascabayarWoka($params = [])
	{
		return $this->bayarPascabayar($params);
	}

	function postPascabayarSmart($params = [])
	{
		return $this->bayarPascabayar($params);
	}

	function postPascabayarAdira($params = [])
	{
		return $this->bayarPascabayar($params);
	}

	function postPascabayarFif($params = [])
	{
		return $this->bayarPascabayar($params);
	}

	function postPascabayarAnzFinance($params = [])
	{
		return $this->bayarPascabayar($params);
	}

	function postPascabayarKtaPermata($params = [])
	{
		return $this->bayarPascabayar($params);
	}

	function postPascabayarCitibankCash($params = [])
	{
		return $this->bayarPascabayar($params);
	}

	function postPascabayarCitibankPay($params = [])
	{
		return $this->bayarPascabayar($params);
	}

	function postPascabayarAmericaExpress($params = [])
	{
		return $this->bayarPascabayar($params);
	}

	function postPascabayarBni($params = [])
	{
		return $this->bayarPascabayar($params);
	}

	function postPascabayarUob($params = [])
	{
		return $this->bayarPascabayar($params);
	}

	function postPascabayarAnz($params = [])
	{
		return $this->bayarPascabayar($params);
	}

	function postPascabayarPermata($params = [])
	{
		return $this->bayarPascabayar($params);
	}

	function postPascabayarDanamon($params = [])
	{
		return $this->bayarPascabayar($params);
	}

	function postPascabayarPanin($params = [])
	{
		return $this->bayarPascabayar($params);
	}

	function postPascabayarBukopin($params = [])
	{
		return $this->bayarPascabayar($params);
	}

	function postPascabayarBumiputra($params = [])
	{
		return $this->bayarPascabayar($params);
	}

	function postPascabayarCitibank($params = [])
	{
		return $this->bayarPascabayar($params);
	}

	function postPascabayarDigibank($params = [])
	{
		return $this->bayarPascabayar($params);
	}

	function postPrabayarEmoney($params = [])
	{
		return $this->bayarPrabayar($params);
	}

	function postPrabayarEcash($params = [])
	{
		return $this->bayarPrabayar($params);
	}

	function postPrabayarOvo($params = [])
	{
		return $this->bayarPrabayar($params);
	}

	function postPrabayarGopay($params = [])
	{
		return $this->bayarPrabayar($params);
	}

	function postPrabayarDana($params = [])
	{
		return $this->bayarPrabayar($params);
	}

	function postPrabayarMtix($params = [])
	{
		return $this->bayarPrabayar($params);
	}

	function postPrabayarTixid($params = [])
	{
		return $this->bayarPrabayar($params);
	}

	function postPrabayarTcash($params = [])
	{
		return $this->bayarPrabayar($params);
	}

	function postPrabayarTapcash($params = [])
	{
		return $this->bayarPrabayar($params);
	}
}