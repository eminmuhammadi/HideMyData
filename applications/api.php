<?php

/**
*   Restful Api using Cloudflare 
*   @author Emin Muhammadi
*/

require_once '../vendor/autoload.php';

/**
*   Error Reporting
*/
error_reporting(1);
ini_set('display_errors', 1);

/**
*   TimeZone Setting
*/
date_default_timezone_set('Asia/Baku'); 

/**
*   Header Configuration
*/
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


/**
*   Data Transmission
*/


$response = [
	'algo'        => $_GET['algo'],
	'action'      => $_GET['action'],
	'text'        => $_GET['text'],
	'secret_key'  => $_GET['secret_key'],
	'private_key' => $_GET['private_key'],
];


if( (!empty($_GET['algo'])) && (!empty($_GET['action'])) && (!empty($_GET['text'])) && (!empty($_GET['secret_key'])) && (!empty($_GET['private_key']))) 

{

if( (isset($_GET['algo'])) && (isset($_GET['action'])) && (isset($_GET['text'])) && (isset($_GET['secret_key'])) && (isset($_GET['private_key']))) 

{

	if($_GET['action'] == 'decrypt') 
	{
		$response['consequence'] = (new eminmuhammadi\HideMyAss\HideMyAss($_GET['private_key'],$_GET['secret_key'],$_GET['algo']))->decrypt($_GET['text']);
	}
	
	else if ($_GET['action'] == 'encrypt') 
	{
		$response['consequence'] = (new eminmuhammadi\HideMyAss\HideMyAss($_GET['private_key'],$_GET['secret_key'],$_GET['algo']))->encrypt($_GET['text']);
	}

	$details = [
		'status'  => '1',
		'message' => 'Success'
	]; 

}
	else {
		$details = [
			'status'  => '0',
			'message' => 'Please provide accuretaly variables'
		]; 
	}

}
	else {
		$details = [
			'status'  => '0',
			'message' => 'Please use all required variables'
		]; 
	}


/**
*   Data Collecting
*/
$data = [
	'request'   => [
		'date'       => date("Y-m-d H:i:s"),
		'timezone'   => date_default_timezone_get(),
		'location'	 => $_SERVER["HTTP_CF_IPCOUNTRY"],
		'ip'      	 => $_SERVER["HTTP_CF_CONNECTING_IP"],
		'ray'     	 => $_SERVER["HTTP_CF_RAY"],
		'visitor' 	 => $_SERVER["HTTP_CF_VISITOR"],
		'cookie' 	 => $_COOKIE,
		'method'     => $_SERVER['REQUEST_METHOD'],
		'user_agent' => $_SERVER['HTTP_USER_AGENT'],
		'id'         => $_SERVER['UNIQUE_ID'],
		'time'       => $_SERVER['REQUEST_TIME']
	],
	'response' => [
		'var' => $response,
		'information'=> $details,
		'execution_time'=> microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"]
	]
];


/**
*   Printing Data
*/
print(json_encode($data,JSON_PRETTY_PRINT));