<?php

namespace qlixes\Bridger\Vendor;

use qlixes\Bridger\Base\BasePulsa;
use qlixes\Bridger\Contract\IServices;
use qlixes\Bridger\Traits\Helper;

class Pulsamu extends BasePulsa implements IServices
{
	use Helper;

	var $limit_pulsa = [25000, 30000, 50000, 60000, 100000, 150000, 200000, 300000, 500000, 1000000];

	// output list per service
	function getPrabayarPulsa($number)
	{
		$provider = $this->getPrabayarPhoneProvider($number);

		$params = [];
		$params['items'] = $provider;

		$response = $this->requestPrabayar($params);

		return $this->filterPulsamuPrabayarPulsa($response, $this->limit_pulsa);
	}

	function getPrabayarData($number)
	{
		$provider = $this->getPrabayarPhoneProvider($number);
		$provider .= '_data';

		$params = [];
		$params['items'] = $provider;

		return $this->requestPrabayar($params);
	}

	function getPascabayarPulsa($number)
	{
		$provider = $this->getPrabayarPhoneProvider($number);
		$provider .= '_pasca';

		$params = [];
		$params['items'] = $provider;

		return $this->requestPrabayar($params);
	}

	function getPrabayarPln($params = [])
	{
		$params['items'] = 'pln';

		return $this->requestPrabayar($params);
	}

	function postPascabayar($params = [])
	{
		return $this->bayarPascabayar($params);
	}

	function postPrabayar($params = [])
	{
		return $this->bayarPrabayar($params);
	}

	function getPascabayarPln($number)
	{
		$params = [];
		$params['code'] = 'pln_pasca';
		$params['number'] = $number;

		return $this->requestPascabayar($params);
	}

	function getPascabayarPgn($number)
	{
		$params = [];
		$params['code'] = 'pgn';
		$params['number'] = $number;

		return $this->requestPascabayar($params);
	}

	function getPascabayarTelkom($number)
	{
		$params = [];
		$params['code'] = 'telkom';
		$params['number'] = $number;

		return $this->requestPascabayar($params);
	}

	function getPascabayarIndihome($number)
	{
		$params = [];
		$params['code'] = 'indihome';
		$params['number'] = $number;

		return $this->requestPascabayar($params);
	}

	function getPascabayarSpeedy($number)
	{
		$params = [];
		$params['code'] = 'speedy';
		$params['number'] = $number;

		return $this->requestPascabayar($params);
	}

	function getPascabayarFirstmedia($number);
	{
		$params = [];
		$params['code'] = 'firstmedia';
		$params['number'] = $number;

		return $this->requestPascabayar($params);
	}

	function getPascabayarOkevision($number)
	{
		$params = [];
		$params['code'] = 'okevision';
		$params['number'] = $number;

		return $this->requestPascabayar($params);
	}

	function getPascabayarCbn($number)
	{
		$params = [];
		$params['code'] = 'cbn';
		$params['number'] = $number;

		return $this->requestPascabayar($params);
	}

	function getPascabayarCentrinet($number)
	{
		$params = [];
		$params['code'] = 'centrinnet';
		$params['number'] = $number;

		return $this->requestPascabayar($params);
	}


	function getPrabayarWifiid()
	{
		$params = [];
		$params['items'] = 'wifiid';

		return $this->requestPrabayar($params);
	}

	function postPrabayarWifiid($params = [])
	{
		return $this->bayarPrabayar($params);
	}

	function getPrabayarMobileLegends()
	{
		$params = [];
		$params['items'] = 'mobilelegends';

		return $this->requestPrabayar($params);
	}

	function getPrabayarMegaxus()
	{
		$params = [];
		$params['items'] = 'megaxus';

		return $this->requestPrabayar($params);
	}

	function getPrabayarLyto()
	{
		$params = [];
		$params['items'] = 'lyto';

		return $this->requestPrabayar($params);
	}

	function getPrabayarItunes()
	{
		$params = [];
		$params['items'] = 'itunes';

		return $this->requestPrabayar($params);
	}

	function getPrabayarGooglePlay()
	{
		$params = [];
		$params['items'] = 'googleplay';

		return $this->requestPrabayar($params);
	}

	function getPrabayarGemsCool()
	{
		$params = [];
		$params['items'] = 'megaxus';

		return $this->requestPrabayar($params);
	}

	function getPrabayarGarena()
	{
		$params = [];
		$params['items'] = 'garena';

		return $this->requestPrabayar($params);
	}

	function getPascabayarWom($number)
	{
		$params = [];
		$params['code'] = 'wom';
		$params['number'] = $number;

		return $this->requestPascabayar($params);
	}

	function getPascabayarBussan($number)
	{
		$params = [];
		$params['code'] = 'baf';
		$params['number'] = $number;

		return $this->requestPascabayar($params);
	}

	function getPascabayarMegaAuto($number)
	{
		$params = [];
		$params['code'] = 'maf';
		$params['number'] = $number;

		return $this->requestPascabayar($params);
	}

	function getPascabayarMegaCentral($number)
	{
		$params = [];
		$params['code'] = 'mcf';
		$params['number'] = $number;

		return $this->requestPascabayar($params);
	}

	function getPascabayarColumbia($number)
	{
		$params = [];
		$params['code'] = 'clmb';
		$params['number'] = $number;

		return $this->requestPascabayar($params);
	}

	function getPascabayarWoka($number)
	{
		$params = [];
		$params['code'] = 'woka';
		$params['number'] = $number;

		return $this->requestPascabayar($params);
	}

	function getPascabayarSmart($number)
	{
		$params = [];
		$params['code'] = 'smart';
		$params['number'] = $number;

		return $this->requestPascabayar($params);
	}

	function getPascabayarAdira($number)
	{
		$params = [];
		$params['code'] = 'adira';
		$params['number'] = $number;

		return $this->requestPascabayar($params);
	}

	function getPascabayarFif($number)
	{
		$params = [];
		$params['code'] = 'fif';
		$params['number'] = $number;

		return $this->requestPascabayar($params);
	}

	function getPascabayarAnzFinance($number)
	{
		$params = [];
		$params['code'] = 'anzpl';
		$params['number'] = $number;

		return $this->requestPascabayar($params);
	}

	function getPascabayarKtaPermata($number)
	{
		$params = [];
		$params['code'] = 'ktapermata';
		$params['number'] = $number;

		return $this->requestPascabayar($params);
	}

	function getPascabayarCitibankCash($number)
	{
		$params = [];
		$params['code'] = 'citibankcash';
		$params['number'] = $number;

		return $this->requestPascabayar($params);
	}

	function getPascabayarCitibankPay($number)
	{
		$params = [];
		$params['code'] = 'citibankpay';
		$params['number'] = $number;

		return $this->requestPascabayar($params);
	}
	
	function getPascabayarAmericaExpress($number)
	{
		$params = [];
		$params['code'] = 'americanexp';
		$params['number'] = $number;

		return $this->requestPascabayar($params);
	}

	function getPascabayarBni($number)
	{
		$params = [];
		$params['code'] = 'bni';
		$params['number'] = $number;

		return $this->requestPascabayar($params);
	}

	function getPascabayarUob($number)
	{
		$params = [];
		$params['code'] = 'uob';
		$params['number'] = $number;

		return $this->requestPascabayar($params);
	}

	function getPascabayarAnz($number)
	{
		$params = [];
		$params['code'] = 'anz';
		$params['number'] = $number;

		return $this->requestPascabayar($params);
	}

	function getPascabayarPermata($number)
	{
		$params = [];
		$params['code'] = 'permata';
		$params['number'] = $number;

		return $this->requestPascabayar($params);
	}

	function getPascabayarDanamon($number)
	{
		$params = [];
		$params['code'] = 'danamon';
		$params['number'] = $number;

		return $this->requestPascabayar($params);
	}

	function getPascabayarPanin($number)
	{
		$params = [];
		$params['code'] = 'panin';
		$params['number'] = $number;

		return $this->requestPascabayar($params);
	}

	function getPascabayarBukopin($number)
	{
		$params = [];
		$params['code'] = 'bukopin';
		$params['number'] = $number;

		return $this->requestPascabayar($params);
	}

	function getPascabayarBumiputra($number)
	{
		$params = [];
		$params['code'] = 'bumiputra';
		$params['number'] = $number;

		return $this->requestPascabayar($params);
	}

	function getPascabayarCitibank($number)
	{
		$params = [];
		$params['code'] = 'citibank';
		$params['number'] = $number;

		return $this->requestPascabayar($params);
	}

	function getPascabayarDigibank($number)
	{
		$params = [];
		$params['code'] = 'digibank';
		$params['number'] = $number;

		return $this->requestPascabayar($params);
	}

	function getPrabayarEmoney($number)
	{
		$params = [];
		$params['items'] = 'emoney';

		return $this->requestPrabayar($params);
	}

	function getPrabayarEcash($number)
	{
		$params = [];
		$params['items'] = 'ecash';

		return $this->requestPrabayar($params);
	}

	function getPrabayarOvo($number)
	{
		$params = [];
		$params['items'] = 'ovo';

		return $this->requestPrabayar($params);
	}

	function getPrabayarGopay($number)
	{
		$params = [];
		$params['items'] = 'gopay';

		return $this->requestPrabayar($params);
	}

	function getPrabayarDana($number)
	{
		$params = [];
		$params['items'] = 'dana';

		return $this->requestPrabayar($params);
	}

	function getPrabayarMtix($number)
	{
		$params = [];
		$params['items'] = 'mtix';

		return $this->requestPrabayar($params);
	}

	function getPrabayarTixid($number)
	{
		$params = [];
		$params['items'] = 'tixid';

		return $this->requestPrabayar($params);
	}

	function getPrabayarTcash($number)
	{
		$params = [];
		$params['items'] = 'tcash';

		return $this->requestPrabayar($params);
	}

	function getPrabayarTapcash($number)
	{
		$params = [];
		$params['items'] = 'tapcash';

		return $this->requestPrabayar($params);
	}
}