# HideMyData (v1.3.1) [![Build Status](https://travis-ci.org/eminmuhammadi/HideMyData.svg?branch=master)](https://travis-ci.org/eminmuhammadi/HideMyData)


[![GitHub license](https://img.shields.io/github/license/eminmuhammadi/HideMyData.svg)](https://github.com/eminmuhammadi/HideMyData/blob/master/LICENSE) [![GitHub release](https://img.shields.io/github/tag/eminmuhammadi/HideMyData.svg)](https://GitHub.com/eminmuhammadi/HideMyData/tag/) [![Github all releases](https://img.shields.io/github/downloads/eminmuhammadi/HideMyData/total.svg)](https://GitHub.com/eminmuhammadi/HideMyData/releases/)


Managing a couple of algorithms to decrypt or encrypt text, powered by PHP.
## Changelogs
* v1.3.1
  * Added Array mode.
  * Some bugs fixed.
  

* v1.3.0
  * Added Test Cases [test/](test/).
  * Some bugs fixed.
  
* v1.2.0

  * Removed PWA. Created new repository at [eminmuhammadi/create-hidemyass](https://github.com/eminmuhammadi/create-hidemyass).
  * Added key limitings. Now you can use a time limit for validation of keys.
  * Added new examples at [examples/](examples/)
  * README changed.

* v1.1.1
  * Docblocks generated.  
  * Created new directory for tests
  
## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

## Installing

You can install using Composer

```bash
composer require eminmuhammadi/hidemyass:dev-master
```
or
```bash
git clone https://github.com/eminmuhammadi/HideMyData.git
```

## Coding

```php
include_once 'vendor/autoload.php';
```
Library class called as `eminmuhammadi\HideMyData\HideMyData` and requires main 3 options to use. `Secret Key` and `Public Key`  must be selected by individuals who need to use asymmetric encryption. There are a couple of `algorithms` divided into 2 part.

## Basic Use

### Encryption :

```php
<?php

    require_once 'vendor/autoload.php';

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
```
Result:
```text
MG9DS3BtaUZjN3ZtR3Rkekx3Sm1LQT09
```

### Decryption :

```php
<?php

    require_once 'vendor/autoload.php';

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
```

Result:
```text
HideMyAss
```

### Time limiting for encryption|decryption
```php
<?php

    require_once 'vendor/autoload.php';

    $text = 'HideMyAss';
    $algo = 'aes256';

    try {
        $hider = (new eminmuhammadi\HideMyAss\HideMyAss('public-key', 'secret-key', $algo));

        /**
         * @example $date - {5 second} , { 5 minute } , { 5 day } , { 5 month } , { 5 year }
         */
        $data = $hider->encrypt($text,'1 minute');
        print($data);
    }
    catch (Exception $e) {
        print($e);
    }
```

Result : 
```text
QTRmOGpVMml6MDNVVG5IWERDblgzazNOUmtnRjNKaEJ2Mzg4Y0Y5ZS9xaEczRnJvdmhUZ1hEYkVQM2pibUIvRkkrMDBCdU9SNW9OK1JrUmVicjZYQkgwWmFDUEI5WEtQT3MyVm1PZkUrR3BQQ2xFTHRHREYranYvdFk1bE1lamg
```

```php
<?php

    require_once 'vendor/autoload.php';

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
```

```text
Exception: eminmuhammadi\HideMyAss\decrypt:: - time limited for this keys please update time or generate new one. in H:\Xampp\htdocs\src\hidemyass.php:121 Stack trace: #0 H:\Xampp\htdocs\.test\date-decrypt.example.php(14): eminmuhammadi\HideMyAss\HideMyAss->decrypt('QTRmOGpVMml6MDN...', '1 minute') #1 {main}
```
**NOTE !!!** You need to update text because of old time limitation. When time is fresh then it will be like

```text
HideMyAss
```

## Ciphers List

### [examples/ciphers.example.php](examples/ciphers.example.php)
```json
[
    {
        "0": "aes-128-cbc",
        "1": "aes-128-cbc-hmac-sha1",
        "2": "aes-128-cbc-hmac-sha256",
        "3": "aes-128-ccm",
        "4": "aes-128-cfb",
        "5": "aes-128-cfb1",
        "6": "aes-128-cfb8",
        "7": "aes-128-ctr",
        "9": "aes-128-gcm",
        "10": "aes-128-ocb",
        "11": "aes-128-ofb",
        "12": "aes-128-xts",
        "13": "aes-192-cbc",
        "14": "aes-192-ccm",
        "15": "aes-192-cfb",
        "16": "aes-192-cfb1",
        "17": "aes-192-cfb8",
        "18": "aes-192-ctr",
        "20": "aes-192-gcm",
        "21": "aes-192-ocb",
        "22": "aes-192-ofb",
        "23": "aes-256-cbc",
        "24": "aes-256-cbc-hmac-sha1",
        "25": "aes-256-cbc-hmac-sha256",
        "26": "aes-256-ccm",
        "27": "aes-256-cfb",
        "28": "aes-256-cfb1",
        "29": "aes-256-cfb8",
        "30": "aes-256-ctr",
        "32": "aes-256-gcm",
        "33": "aes-256-ocb",
        "34": "aes-256-ofb",
        "35": "aes-256-xts",
        "36": "aria-128-cbc",
        "37": "aria-128-ccm",
        "38": "aria-128-cfb",
        "39": "aria-128-cfb1",
        "40": "aria-128-cfb8",
        "41": "aria-128-ctr",
        "43": "aria-128-gcm",
        "44": "aria-128-ofb",
        "45": "aria-192-cbc",
        "46": "aria-192-ccm",
        "47": "aria-192-cfb",
        "48": "aria-192-cfb1",
        "49": "aria-192-cfb8",
        "50": "aria-192-ctr",
        "52": "aria-192-gcm",
        "53": "aria-192-ofb",
        "54": "aria-256-cbc",
        "55": "aria-256-ccm",
        "56": "aria-256-cfb",
        "57": "aria-256-cfb1",
        "58": "aria-256-cfb8",
        "59": "aria-256-ctr",
        "61": "aria-256-gcm",
        "62": "aria-256-ofb",
        "63": "bf-cbc",
        "64": "bf-cfb",
        "66": "bf-ofb",
        "67": "camellia-128-cbc",
        "68": "camellia-128-cfb",
        "69": "camellia-128-cfb1",
        "70": "camellia-128-cfb8",
        "71": "camellia-128-ctr",
        "73": "camellia-128-ofb",
        "74": "camellia-192-cbc",
        "75": "camellia-192-cfb",
        "76": "camellia-192-cfb1",
        "77": "camellia-192-cfb8",
        "78": "camellia-192-ctr",
        "80": "camellia-192-ofb",
        "81": "camellia-256-cbc",
        "82": "camellia-256-cfb",
        "83": "camellia-256-cfb1",
        "84": "camellia-256-cfb8",
        "85": "camellia-256-ctr",
        "87": "camellia-256-ofb",
        "88": "cast5-cbc",
        "89": "cast5-cfb",
        "91": "cast5-ofb",
        "92": "chacha20",
        "93": "chacha20-poly1305",
        "111": "id-aes128-CCM",
        "112": "id-aes128-GCM",
        "113": "id-aes128-wrap",
        "114": "id-aes128-wrap-pad",
        "115": "id-aes192-CCM",
        "116": "id-aes192-GCM",
        "117": "id-aes192-wrap",
        "118": "id-aes192-wrap-pad",
        "119": "id-aes256-CCM",
        "120": "id-aes256-GCM",
        "121": "id-aes256-wrap",
        "122": "id-aes256-wrap-pad",
        "124": "idea-cbc",
        "125": "idea-cfb",
        "127": "idea-ofb",
        "137": "seed-cbc",
        "138": "seed-cfb",
        "140": "seed-ofb",
        "141": "sm4-cbc",
        "142": "sm4-cfb",
        "143": "sm4-ctr",
        "145": "sm4-ofb"
    },
    {
        "36": "aes128",
        "37": "aes128-wrap",
        "38": "aes192",
        "39": "aes192-wrap",
        "40": "aes256",
        "41": "aes256-wrap",
        "69": "aria128",
        "70": "aria192",
        "71": "aria256",
        "72": "bf",
        "77": "blowfish",
        "99": "camellia128",
        "100": "camellia192",
        "101": "camellia256",
        "102": "cast",
        "103": "cast-cbc",
        "146": "idea",
        "164": "seed",
        "169": "sm4"
    }
]
```
## Test

```bash
composer run-scripts test
```

## Applications

 - [Progressive Web Application](https://github.com/eminmuhammadi/create-hidemyass) ([demo](https://linkedit.ml))
 
 - [Restful API](https://github.com/eminmuhammadi/create-hidemyass/api.php) ([demo](https://api.linkedit.ml))
 
  `* Parametres *`

 *  `algo`  - Algorithms which are illustrated upside on the table
 *  `s_key`
 *  `p_key`
 *  `action` - (decrypt | encrypt)
 *  `text`
 
## Authors

* **Emin Muhammadi** - *Initial work* - [eminmuhammadi](https://github.com/eminmuhammadi)

See also the list of [contributors](https://github.com/eminmuhammadi/HideMyAss/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details
