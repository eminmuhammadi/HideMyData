<?php

    require_once '../vendor/autoload.php';

    $text = 'HideMyData';
    $algo = 'aes256';

    try {
        $hider = (new eminmuhammadi\HideMyData\HideMyData('public-key', 'secret-key', $algo));

        /**
         * @example $date - {5 second} , { 5 minute } , { 5 day } , { 5 month } , { 5 year }
         */
        $data = $hider->encrypt($text,'1 minute');
        print($data);
    }
    catch (Exception $e) {
        print($e);
    }