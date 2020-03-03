<?php

    require_once '../vendor/autoload.php';

    $text = 'QTRmOGpVMml6MDNVVG5IWERDblgzcFpzSE5oRHNYalVuT1NBV2w1UXB2clEyY2hRalVZbTVkL2ZJUjQ4MjNCT0RVUUZDb0NodGFCOTU2czVtUzNBMVU3eFhRRlM4cnhINmliWmRBY0I0eVo2dXdiaHY1bWxBWC85Y1piWUV4Qys=';
    $algo = 'aes256';

    try {
        $hider = (new eminmuhammadi\HideMyData\HideMyData('public-key', 'secret-key', $algo));

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