<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use DB;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;
	//public function printTest(){ return 'Test Function Call'; }

	public function TestPriceFind($nameOfTest)
	{
		$sql='SELECT test_rate FROM `test_models` WHERE `description`=?';
		$testPrice=DB::select($sql,array($nameOfTest));
		foreach($testPrice as $tp)
		{
			$realPrice=$tp->test_rate;
		}
		return $realPrice;
	}

	public function TestPriceDiscountAmount($testPrice,$discount)
	{
		$discountAmount=(($discount*$testPrice)/100);
		return $discountAmount;
	}

	public function TestBalanceAfterDiscount($testPrice,$discount)
	{
		$discountAmount=ceil($testPrice-(($discount*$testPrice)/100));
		return $discountAmount;
	}

	function safeEncrypt($message, $key)
	{
	    $nonce = \Sodium\randombytes_buf(
	        \Sodium\CRYPTO_SECRETBOX_NONCEBYTES
	    );

	    $cipher = base64_encode(
	        $nonce.
	        \Sodium\crypto_secretbox(
	            $message,
	            $nonce,
	            $key
	        )
	    );
	    \Sodium\memzero($message);
	    \Sodium\memzero($key);
	    return $cipher;
	}

	function safeDecrypt($encrypted, $key)
	{   
	    $decoded = base64_decode($encrypted);
	    $nonce = mb_substr($decoded, 0, \Sodium\CRYPTO_SECRETBOX_NONCEBYTES, '8bit');
	    $ciphertext = mb_substr($decoded, \Sodium\CRYPTO_SECRETBOX_NONCEBYTES, null, '8bit');

	    $plain = \Sodium\crypto_secretbox_open(
	        $ciphertext,
	        $nonce,
	        $key
	    );
	    \Sodium\memzero($ciphertext);
	    \Sodium\memzero($key);
	    return $plain;
	}

	
}
