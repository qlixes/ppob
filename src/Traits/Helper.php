<?php

namespace qlixes\Bridger\Traits;

trait Helper
{
    private static $providerPrabayarHelper = [
        'telkomsel' => ['0821','0822','0813','0812', '0823','0852','0853','0851'],
        // 'as' => ['0823','0852','0853','0851'],
        'indosat' => ['0814','0856','0857', '0815','0816','0858'],
        // 'mentari' => ['0815','0816','0858'],
        'xl' => ['0817','0818','0819','0859','0877','0878','0879'],
        'tri' => ['0896','0897','0898','0899'],
        'smartfren' => ['0888','0889','0881','0882'],
        'axis' => ['0831','0838']
    ];

    private static $providerPascabayarHelper = [
        'simpati' => ['0811','0812','0813'],
        'indosat' => ['0815','0816','0855'],
        'xl' => ['0817','0818','0819','0859'],
        'tri' => ['0896','0897','0898','0899'],
        'smartfren' => ['0888','0889','0881','0882'],
        'axis' => ['0831','0838']
    ];

    public $phoneProvider;

    /**
     * remove Country Code with Zero
     *
     * @param
     * @return    void
     */
    function removeCodeRegionPhoneNumber($code, $number)
    {
        return preg_replace("/^\+{$code}/", '0', $number);
    }

    /**
     * get provider name from phone number or die with error
     *
     * @param integer $number
     * @param array $list
     * @return void
     */
    function getProviderNumber($number, $list = [])
    {
        $numbers = $this->removeCodeRegionPhoneNumber($number);
        
        foreach($list as $provider => $value)
          if(in_array($numbers, $value))
            return $provider;
    }

    /**
     * .get Pascabayar provider name
     *
     * @param integer $number
     * @return void
     */
    function getPascabayarPhoneProvider($number)
    {
        $this->phoneProvider = $this->getProvider($number, self::$providerPascabayarHelper);

        return $this;
    }

    /**
     * .get Prabayar provider name
     *
     * @param integer $number
     * @return void
     */
    function getPrabayarPhoneProvider($number)
    {
        $this->phoneProvider = $this->getProvider($number, self::$providerPrabayarHelper);

        return $this;
    }

    function filterPulsamuPrabayarPulsa($prabayar = [], $limit = [])
    {
    	$parse = [];
    	foreach($prabayar as $key => $value)
    	{
    		list($item_id, $price, $label, $group) = $value;

    		foreach($limit as $prices)
    		{
          if($group == $prices)
            $parse[$prices][$price][] = ['harga' => $price,'item_id' => $item_id,'nama_item' => $label];
    			continue;
    		}
    	}

    	$parser = [];
    	foreach($limit as $prices)
      {
        sort($parse[$prices]);
        $parser[$prices] = $parse[$prices][0];
      }

    	return $parser;
    }
}