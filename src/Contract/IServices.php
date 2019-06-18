<?php

namespace qlixes\Bridger\Contract;

interface IServices
{
	// output list per service
	function getPrabayarPulsa($number);
	function getPrabayarData($number);
	function getPascabayarPulsa($number);

	// purchase order
	function postPascabayar($params = []);
	function postPrabayar($params = []);

	function getPrabayarPln($params = []);

	function getPascabayarPln($number);

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
}