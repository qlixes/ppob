<?php

interface IServices
{
	// output list per service
	function getPrabayarPulsa($number);
	function getPrabayarData($number);
	function getPascabayarPulsa($number);

	// purchase order
	function postPrabayarPulsa();
	function postPrabayarData();

	function getPrabayarPln();
	function postPrabayarPln();

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
	function postPrabayarWifiid();

	function getPrabayarMobileLegends();
	function getPrabayarMegaxus();
	function getPrabayarLytho();
	function getPrabayarItunes();
	function getPrabayarGooglePlay();
	function getPrabayarGemsCool();
	function getPrabayarGarena(); 

	function postPrabayarMobileLegends();
	function postPrabayarMegaxus();
	function postPrabayarLytho();
	function postPrabayarItunes();
	function postPrabayarGooglePlay();
	function postPrabayarGemsCool();
	function postPrabayarGarena();

	function getPascabayarWom($number);
	function getPascabayarBussan($number);
	function getPascabayarMegaAuto($number);
	function getPascabayarMegaCentral($number);
	function getPascabayarColumbia($number);
	function getPascabayarWoka($number);
	function getPascabayarSmart($number);
	function getPascabayarAdira($number);
	function getPascabayarFif($number);
	function getPascabayarAnz($number);
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
}