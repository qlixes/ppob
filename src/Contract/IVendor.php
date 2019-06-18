<?php

namespace qlixes\Bridger\Contract;

interface IVendor
{
	function authenticate();
	// cara request / format request
	function requestPascabayar($params = []);
	function requestPrabayar($params = []);
	// cara response
	// function responsePascabayar();
	// function responsePrabayar();
	// cara bayar
	function bayarPascabayar($params = []);
	function bayarPrabayar($params = []);
}