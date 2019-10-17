<?php

    require_once '../vendor/autoload.php';

    $text = 'QTRmOGpVMml6MDNVVG5IWERDblgzazNOUmtnRjNKaEJ2Mzg4Y0Y5ZS9xaEczRnJvdmhUZ1hEYkVQM2pibUIvRkkrMDBCdU9SNW9OK1JrUmVicjZYQkgwWmFDUEI5WEtQT3MyVm1PZkUrR3BQQ2xFTHRHREYranYvdFk1bE1lamg';
    $algo = 'aes256';

    try {
        $hider = (new eminmuhammadi\HideMyAss\HideMyAss('public-key', 'secret-key', $algo));

        /**
         * @example $date - {5 second} , { 5 minute } , { 5 day } , { 5 month } , { 5 year }
         */
        $data = $hider->decrypt($text,'1 minute');
        print($data);
    }

    /**
     *   Need to say error because of old data
     */
    catch (Exception $e) {
        print($e);
    }