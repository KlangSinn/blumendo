<?php

// // // // // // // // // // // // // // // // // // // //
// // // // // // // // // // // // // // // // // // // //
// // // // // // // // // // // // // // // // // // // //

class PaypalCredentials {

	// // // // // // // // // // // // // // // // // // // //
	// // // // // // // // // // // // // // // // // // // //
	// // // // // // // // // // // // // // // // // // // //

	private $USER;
	private $PW;
	private $SIGNATURE;
	private $METHOD;
	private $PAYMENTREQUEST_0_AMT;						// payment amount
	private $PAYMENTREQUEST_0_PAYMENTACTION = "SALE";	// type of transaction
	private $PAYMENTREQUEST_0_CURRENCYCODE;				// payment currency code
	private $RETURNURL;									// redirect URL for use if the customer authorizes payment
	private $CANCELURL;									// redirect URL for use if the customer does not authorize payment
	private $VERSION 						= 78;		// API VERSION
	private $TOKEN;  									// needed for get information from paypal about payment (GetExpressCheckoutDetails)
	private $PAYERID;

	// // // // // // // // // // // // // // // // // // // //
	// // // // // // // // // // // // // // // // // // // //
	// // // // // // // // // // // // // // // // // // // //

	function __construct($method) {
		$this->METHOD 		= $method;
	}

	// // // // // // // // // // // // // // // // // // // //
	// // // // // // // // // // // // // // // // // // // //
	// // // // // // // // // // // // // // // // // // // //

	//		 SETTER
	public function setReturnUrl($returnurl) {
		$this->RETURNURL 	= $returnurl;
	}
	public function setCancelUrl($cancelurl) {
		$this->CANCELURL 	= $cancelurl;
	}
	public function setToken($token) {
		$this->TOKEN 	= $token;
	}
	public function setPayerId($payerid) {
		$this->PAYERID = $payerid;
	}
	public function setUser($user) {
		$this->USER = $user;
	}
	public function setPw($pw) {
		$this->PW = $pw;
	}
	public function setSignature($signature) {
		$this->SIGNATURE = signature;
	}
	public function setCurrency($cur) {
		$this->PAYMENTREQUEST_0_CURRENCYCODE = $cur;
	}
	public function setAmount($am) {
		$this->PAYMENTREQUEST_0_AMT = $am;
	}	

	// // // // // // // // // // // // // // // // // // // //
	// // // // // // // // // // // // // // // // // // // //
	// // // // // // // // // // // // // // // // // // // //

	// 		GETTER
	public function getRequestString() {
		if($this->METHOD == "SetExpressCheckout") {
			return  "USER=".$this->USER.
					"&PWD=".$this->PW.
					"&SIGNATURE=".$this->SIGNATURE.
					"&METHOD=".$this->METHOD.
					"&VERSION=".$this->VERSION.
					"&PAYMENTREQUEST_0_PAYMENTACTION=".$this->PAYMENTREQUEST_0_PAYMENTACTION.
					"&PAYMENTREQUEST_0_AMT=".$this->PAYMENTREQUEST_0_AMT.
					"&PAYMENTREQUEST_0_CURRENCYCODE=".$this->PAYMENTREQUEST_0_CURRENCYCODE.
					"&cancelUrl=".$this->CANCELURL.
					"&returnUrl=".$this->RETURNURL;
		} else if($this->METHOD == "GetExpressCheckoutDetails") {
			return  "USER=".$this->USER.
					"&PWD=".$this->PW.
					"&SIGNATURE=".$this->SIGNATURE.
					"&TOKEN=".$this->TOKEN.
					"&VERSION=".$this->VERSION.
					"&METHOD=".$this->METHOD;
		} else if($this->METHOD == "DoExpressCheckoutPayment") {
			return  "USER=".$this->USER.
					"&PWD=".$this->PW.
					"&SIGNATURE=".$this->SIGNATURE.
					"&PAYMENTREQUEST_0_AMT=".$this->PAYMENTREQUEST_0_AMT.
					"&PAYMENTREQUEST_0_PAYMENTACTION=".$this->PAYMENTREQUEST_0_PAYMENTACTION.
					"&TOKEN=".$this->TOKEN.
					"&PAYERID=".$this->PAYERID.
					"&VERSION=".$this->VERSION.
					"&METHOD=".$this->METHOD;
		} else {
			return FALSE;
		}
	}

	// // // // // // // // // // // // // // // // // // // //
	// // // // // // // // // // // // // // // // // // // //
	// // // // // // // // // // // // // // // // // // // //
}
?>