<?php if($_GET):
			$google_key = "AIzaSyDOCv2rqzu3G9dM2dPFPvxrExp_H-RQj_g";
			$forecast_key = "5a86790b799489f59c2a56e57c06259d";
			$street = $_GET["street"];
			$city = $_GET["city"];
			$state = $_GET["state"];
			$degree = $_GET["degree"];
			$base_url = "https://maps.googleapis.com/maps/api/geocode/xml?address=";
			$base_url .= $street . "," . $city . "," . $state;
			$base_url .= "&key=" . $google_key;
			//echo $base_url;
			
			$data = simplexml_load_file($base_url);
			$lat = $data->result->geometry->location->lat;
			$lng = $data->result->geometry->location->lng;
			//echo $lat . "," . $lng;
			
			$forecast_url = "https://api.forecast.io/forecast/";
			$forecast_url .= $forecast_key . "/" . $lat . "," . $lng;
			$forecast_url .= "?units=" . $degree . "&exclude=flags";
			
			//echo $forecast_url . "\n";
			
			$result = file_get_contents($forecast_url);
			echo $result;
	endif;
?>