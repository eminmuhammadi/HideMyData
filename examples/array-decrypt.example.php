<?php

require_once '../vendor/autoload.php';

$text = 'Ky9iMk9VNzUxWW52VHZjaDRtTUZ4T0VlU21NRjU3TkZpSjNUNUFzQXpHdXB6enlMZDdsTCtRUk5ZUm1tbHBLL3djK0NYSWQyTFRlMVBYeHBsWEZoT2c9PQ==';
$algo = 'aes256';

try {
    $hider = (new eminmuhammadi\HideMyAss\HideMyAss('public-key', 'secret-key', $algo));

    $data = $hider->ArrayDecrypt($text);
    var_dump($data);
}
catch (Exception $e) {
    print($e);
}