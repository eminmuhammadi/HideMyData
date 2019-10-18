<?php

    require_once '../vendor/autoload.php';

    $text = 'HideMyAss';
    $algo = 'aes256';

    try {
        $hider = (new eminmuhammadi\HideMyAss\HideMyAss('public-key', 'secret-key', $algo));

        $data = $hider->encrypt($text);
        print($data);
    }
    catch (Exception $e) {
        print($e);
    }