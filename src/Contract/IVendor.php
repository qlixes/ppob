<?php

interface IVendor
{
	function authenticate();
	// cara request / format request
	function requestPascabayar();
	function requestPrabayar();
	// cara response
	function responsePascabayar();
	function responsePrabayar();
	// cara bayar
	function bayarPascabayar();
	function bayarPrabayar();
}