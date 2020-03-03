<?php

    require_once '../vendor/autoload.php';

    $text = 'KzdOWXBBWDNWSElWWm1VUkprenBFZz09';
    $algo = 'aes256';

    try {
        $hider = (new eminmuhammadi\HideMyData\HideMyData('public-key', 'secret-key', $algo));

        $data = $hider->decrypt($text);
        print($data);
    }
    catch (Exception $e) {
        print($e);
    }