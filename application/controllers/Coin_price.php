<?php
class Coin_price extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
     //   require 'vendor/autoload.php';
    }


	function index(){
	$url = "https://api.coinmarketcap.com/v1/ticker/?limit=10";
	$result = file_get_contents($url);
//print_r($result);die; 
	$a = json_decode($result,true);

	$btc = $a[0]['price_usd'];
	
	$eth = $a[1]['price_usd'];
	
	$ltc = $a[7]['price_usd'];
	echo $btc;
	echo '<br>';
	echo $eth;
	echo '<br>';
	echo $ltc;
	echo '<br>';

	$query_btc = $this->_custom_query("UPDATE `coin_value` SET value='$btc',currency = 'btc' WHERE id='1'");
	$query_eth = $this->_custom_query("UPDATE `coin_value` SET value='$eth',currency='eth' WHERE id='2'");
	$query_ltc = $this->_custom_query("UPDATE `coin_value` SET value='$ltc', currency = 'ltc' WHERE id='3'");
	echo 'Coin values updated';
	}

    function _custom_query($query)
{
    $this->load->model('User_model');
    return $this->User_model->_custom_query($query);
}

}
?>
