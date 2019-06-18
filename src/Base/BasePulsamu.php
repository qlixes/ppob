<?php

namespace qlixes\Bridger\Base;

use stdClass;
use qlixes\Bridger\Base\BaseHelper;
use qlixes\Bridger\Contract\IVendor;
use qlixes\Bridger\Traits\{Helper, Pulsamu};

class BasePulsamu extends BaseHelper implements IVendor
{
	use Helper, Pulsamu;

	var $base;

	function __construct()
	{
		if(!($this->base instanceof stdClass))
			$this->base = new stdClass();

		$base_url = config('ppob.pulsamu.url');
		$base_pin = config('ppob.pulsamu.pin');

		$this->base->on = $this->start($base_url);
		$this->base->pin = $base_pin;
	}

	function authenticate()
	{
		$params = [];
		$params['username'] = config('ppob.pulsamu.username');
		$params['password'] = config('ppob.pulsamu.password');

		$this->base->token = $this->base->on->withParams($params)->request('GET', 'auth');
	}

	function withToken()
	{
        $params = [];
        $params['Authorization'] = $this->service->token['token'];

        return $this->withHeader($params);
	}

	function requestPascabayar($params = [])
	{
		$items = $params['code'];
		$param = [];
		$param['idpel'] = $params['number'];
		$param['produk'] = $this->{$items};

		$response = $this->withToken()->withForms($params)->request('POST', 'ppob/cektagihan');

		return $this->parseResponseToArray($response);
	}

	function requestPrabayar($params = []) 
	{
		$items = $params['items'];
		$url = sprintf('prabayar/item/%d', $this->{$items});

		$response = $this->withToken()->request('GET', $url);

		return $this->parseResponseToArray($response);
	}

	function bayarPascabayar($params = [])
	{
		$param = [];
		$param['requestid'] = $params['invoice_token'];
		$param['pin'] = $this->base->pin;
		$response = $this->withToken()->withForms($param)->request('POST', 'ppob/pay');

		return $this->parseResponseToArray($response);
	}

	function bayarPrabayar($params = [])
	{
        $param = [];
        $param['idpel'] = $params['number'];
        $param['item_id'] = $params['item_id'];
        $param['nama_item'] = $params['nama_item'];
        $param['harga'] = $params['harga']
        $param['timer'] = date('Y-m-d H:m:s');
        $param['pin'] = $this->base->pin;
        $response = $this->withToken()->withForms($param)->request('POST', 'prabayar/beli/');

        return $this->parseResponseToArray($response);
	}
}