<?php
		$post_url = "https://secure.netbilling.com:1402/gw/sas/direct3.2";
		
		$post_values = array(
		// the API Login ID and Transaction Key must be replaced with valid values
		"pay_type"        => "C",
		"tran_type"        => "A",
		"account_id"        => "104901072025",
		"card_number"        => "4444333322221186",
		"card_expire"        => "1216",
		"cvv2_code"        => "0987",
		"amount"        => "5.00"
		);

		// This section takes the input fields and converts them to the proper format
		// for an http post.  For example: "x_login=username&x_tran_key=a1B2c3D4"
		$post_string = "";
		
		foreach( $post_values as $key => $value )  {
		
		if (!empty( $post_string )) {
			$post_string .= "&";
		}

		$post_string .= $key . "=" . urlencode( $value );
	}
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $post_url);
		curl_setopt($ch, CURLOPT_POST, 1 );
		curl_setopt($ch, CURLOPT_HEADER, 1 );
		curl_setopt($ch, CURLOPT_TIMEOUT, 90 );
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string); // use HTTP POST to send form data
		curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0 );
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0 );
		$res = curl_exec( $ch );
		$http_code = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
		
		echo "<b>HTTP Response</b><br />  $http_code<br /><br />" ;
		echo "<b>Response from Payment Gateway</b><br /> $res<br /><br />";

	?>
