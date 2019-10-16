<?php

/**
 *   Restful Api using Cloudflare
 *   @author Emin Muhammadi
 */

require_once 'vendor/autoload.php';

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
    's_key'       => $_REQUEST['s_key'],
    'p_key'       => $_REQUEST['p_key'],
];


if ((!empty($_REQUEST['algo'])) && (!empty($_REQUEST['action'])) && (!empty($_REQUEST['text'])) && (!empty($_REQUEST['s_key'])) && (!empty($_REQUEST['p_key']))) {

    if ((isset($_REQUEST['algo'])) && (isset($_REQUEST['action'])) && (isset($_REQUEST['text'])) && (isset($_REQUEST['s_key'])) && (isset($_REQUEST['p_key']))) {

        /**
         *  Decryption
         */
        if ($_REQUEST['action'] == 'decrypt') {

            try {
                $response['result'] = (new eminmuhammadi\HideMyAss\HideMyAss($_REQUEST['p_key'], $_REQUEST['s_key'], $_REQUEST['algo']))->decrypt($_REQUEST['text']);
                if($response['result'] == false || $response['result'] == null){
                    $response['result']=null;
                    $details = [
                        'status'  => '0',
                        'message' => 'Fatal Error'
                    ];
                }
                else {
                    $details = [
                        'status'  => '1',
                        'message' => 'Success'
                    ];
                }
            }
            catch (Exception $e) {
                $response['result'] = null;
                $details = [
                    'status'  => '0',
                    'message' => $e
                ];
            }

        }


        /**
         *  Encryption
         */
        else if ($_REQUEST['action'] == 'encrypt') {
            try {
                $response['result'] = (new eminmuhammadi\HideMyAss\HideMyAss($_REQUEST['p_key'], $_REQUEST['s_key'], $_REQUEST['algo']))->encrypt($_REQUEST['text']);
                if($response['result'] == false || $response['result'] == null){
                    $response['result']=null;
                    $details = [
                        'status'  => '0',
                        'message' => 'Fatal Error'
                    ];
                }
                else {
                    $details = [
                        'status'  => '1',
                        'message' => 'Success'
                    ];
                }
            }

            catch (Exception $e) {
                $response['result'] = null;
                $details = [
                    'status'  => '0',
                    'message' => $e
                ];
            }
        }

        /**
         *  Error when method is mismatch
         */
        else {
            $response['result']=null;
            $details = [
                'status'  => '0',
                'message' => 'Please provide correct method'
            ];
        }
    }}

/**
 *  Error when params is mismatch
 */
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

        /**
         *  @link https://cloudflare.com
         *  Headers powered by Cloudflare (c)
         */

        'location'	 => $_SERVER["HTTP_CF_IPCOUNTRY"],
        'ip'      	 => $_SERVER["HTTP_CF_CONNECTING_IP"],
        'ray'     	 => $_SERVER["HTTP_CF_RAY"],
        'visitor' 	 => $_SERVER["HTTP_CF_VISITOR"],

        /**
         *  Cookies disabled due to security reason
         *  @TODO cookie based security reason
         */
        //'cookie' 	 => $_COOKIE,

        'method'     => $_SERVER['REQUEST_METHOD'],
        'user_agent' => $_SERVER['HTTP_USER_AGENT'],
        'id'         => $_SERVER['UNIQUE_ID'],
        'time'       => $_SERVER['REQUEST_TIME']
    ],

    'response' => [
        'var' => $response,
        'information' => $details,
        'execution_time' => microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"]
    ]
];


/**
 *   Printing Data
 */
print(json_encode($data, JSON_PRETTY_PRINT));
