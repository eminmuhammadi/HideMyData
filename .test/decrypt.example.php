<?php

    require_once '../vendor/autoload.php';

    $text = 'MG9DS3BtaUZjN3ZtR3Rkekx3Sm1LQT09';
    $algo = 'aes256';

    try {
        $hider = (new eminmuhammadi\HideMyAss\HideMyAss('public-key', 'secret-key', $algo));

        $data = $hider->decrypt($text);
        print($data);
    }
    catch (Exception $e) {
        print($e);
    }