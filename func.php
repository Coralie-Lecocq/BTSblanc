<?php
session_start();

$dns = 'mysql:host=localhost;dbname=ppe2;';
$utilisateur = 'root';
$motDePasse = '';

try
{
$bdd = new PDO( $dns, $utilisateur, $motDePasse );
$bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}
catch(Exception $e)
{
die();
}

function isRecaptchaValid($code, $ip = null)
	{
		if (empty($code)) {
			return false; // Si aucun code n'est entré, on ne cherche pas plus loin
		}
		$params = array('secret'    => '6LdupBITAAAAAK_5xaDDQALkEnJ0YVV6LJywkJLM','response'  => $code);
		if( $ip ){
			$params['remoteip'] = $ip;
		}
		$url = "https://www.google.com/recaptcha/api/siteverify?" . http_build_query($params);
		if (function_exists('curl_version')) {
			$curl = curl_init($url);
			curl_setopt($curl, CURLOPT_HEADER, false);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_TIMEOUT, 1);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // Evite les problèmes, si le ser
			$response = curl_exec($curl);
		}
		else
		{
			// Si curl n'est pas dispo, un bon vieux file_get_contents
			$response = file_get_contents($url);
		}

		if (empty($response) || is_null($response)) {
			return false;
		}

		$json = json_decode($response);
		return $json->success;
	}


function	logout()
{
    unset($_SESSION['user']);
    session_destroy();
}



 ?>
