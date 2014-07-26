<?php
 
function getGeoLocation( $lookup_URL)
{
	// only do the lookup if called from espatial.com domain 
if( ($_SERVER['SERVER_NAME'] == "www.peterjwatters.com") ||  ($_SERVER['SERVER_NAME'] == "peterjwatters.com") ){
		// get location using IP
		$response=@file_get_contents($lookup_URL);

        echo "un-encoded response:" . $response;
        
        
        $lookup_URL =  urlencode($lookup_URL);
        $response=@file_get_contents($lookup_URL);
        echo "encoded response:".$response . "$lookup_URL".$lookup_URL;
        
        
        
		if (empty($response))
		{
			// throw new InvalidArgumentException("Error contacting Geo-IP-Server");
			// if empty set response string to be USA and flag country code as error
			$response = '{"country_code": "Error", "country_name": "United States"}';
		}	 
		return $response;
	 }else{
	 	// script is being run on another domain
	 	echo '{"city": "", "region_code": "", "region_name": "", "metrocode": "", "zipcode": "", "longitude": "0", "latitude": "0", "country_code": "SB", "ip": "x.x.x.x", "country_name": "Security Breach"}';
	 }
}


if ( (!isset($_POST['ip'])) &&  (!isset($_GET['ip']))  ){
	// if no data passed here set to localhost
	//  country name will return as "Reserved"
	$ip = "127.0.0.1";	
	$lookup_URL = "http://freegeoip.net/json/".$ip;
	

}else{
		if(isset($_POST['ip'])) $ip = $_POST['ip'];  
		if(isset($_GET['ip'])) $ip = $_GET['ip']; 

		$lookup_URL = "http://freegeoip.net/json/".$ip; 
}

// pass URL to lookup function
echo getGeoLocation($lookup_URL);


?>