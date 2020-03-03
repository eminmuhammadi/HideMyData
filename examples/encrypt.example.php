<?php

    require_once '../vendor/autoload.php';

    $text = 'HideMyData';
    $algo = 'aes256';

    try {
        $hider = (new eminmuhammadi\HideMyData\HideMyData('public-key', 'secret-key', $algo));

        $data = $hider->encrypt($text);
        print($data);
    }
    catch (Exception $e) {
        print($e);
    }