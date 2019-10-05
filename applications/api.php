<?php

/**
*   Restful Api using Cloudflare 
*   @author Emin Muhammadi
*/

require_once '../vendor/autoload.php';

/**
 *   Error Reporting
 */
error_reporting(0);
ini_set('display_errors', 0);

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
	'algo'        => $_REQUEST['algo'],
	'action'      => $_REQUEST['action'],
	'text'        => $_REQUEST['text'],
	'secret_key'  => $_REQUEST['secret_key'],
	'private_key' => $_REQUEST['private_key'],
];


if( (!empty($_REQUEST['algo'])) && (!empty($_REQUEST['action'])) && (!empty($_REQUEST['text'])) && (!empty($_REQUEST['secret_key'])) && (!empty($_REQUEST['private_key']))) 

{

if( (isset($_REQUEST['algo'])) && (isset($_REQUEST['action'])) && (isset($_REQUEST['text'])) && (isset($_REQUEST['secret_key'])) && (isset($_REQUEST['private_key']))) 

{

	if($_REQUEST['action'] == 'decrypt') 
	{
		$response['consequence'] = (new eminmuhammadi\HideMyAss\HideMyAss($_REQUEST['private_key'],$_REQUEST['secret_key'],$_REQUEST['algo']))->decrypt($_REQUEST['text']);
	}
	
	else if ($_REQUEST['action'] == 'encrypt') 
	{
		$response['consequence'] = (new eminmuhammadi\HideMyAss\HideMyAss($_REQUEST['private_key'],$_REQUEST['secret_key'],$_REQUEST['algo']))->encrypt($_REQUEST['text']);
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