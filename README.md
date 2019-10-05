# HideMyAss

Managing a couple of algorithms to decrypt or encrypt text, powered by PHP 

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Installing

You need to install using Composer

```bash
composer require eminmuhammadi/hidemyass
```

### Installing

```php
include_once 'vendor/autoload.php';
```
## Coding
Library class called as `eminmuhammadi\HideMyAss\HideMyAss` and requires main 3 options to use. `Secret Key` and `Private Key`  must be selected by individuals who need to use symmetric encryption. There are a couple of `algorithms` divided into 2 part.

| 8 bytes | 16 bytes |
|--------------------------------------------------------------------------------------------------------------------------------------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| BF-CBC , BF-CFB , BF-OFB , bf-cbc , bf-cfb , bf-ofb , cast5-cbc , cast5-cfb , cast5-ofb , BF , CAST , CAST-cbc , bf , blowfish , cast , cast-cbc | AES-128-CBC , AES-128-CFB , AES-128-CFB1 , AES-128-CFB8 , AES-128-OFB , AES-192-CFB , AES-192-CFB1 , AES-192-OFB , AES-256-CBC , AES-256-CFB , AES-256-CFB1 , AES-256-CFB8 , AES-256-OFB , aes-128-cbc , aes-128-cfb , aes-128-cfb1 , aes-128-cfb8 , aes-128-ofb , aes-192-cbc , aes-192-cfb , aes-192-cfb1 , aes-192-cfb8 , aes-192-ofb , aes-256-cbc , aes-256-cfb , aes-256-cfb1 , aes-256-cfb8 , aes-256-ofb , AES128 , AES192 , AES256 , aes128 , aes192 , aes256 |


### Basic Use
#### Encryption :
```php
$text = 'HideMyAss';
$algo = 'bf';

$hider = (new eminmuhammadi\HideMyAss\HideMyAss('private-key','secret-key',$algo));

$data = $hider->encrypt($text);

print($data);
```
```text
dDE3RHlZWmdRblMyOGY3TTJvd1I0UT09
```
### Decryption :
```php
$text = 'dDE3RHlZWmdRblMyOGY3TTJvd1I0UT09';
$algo = 'bf';

$hider = (new eminmuhammadi\HideMyAss\HideMyAss('private-key','secret-key',$algo));

$data = $hider->decrypt($text);

print($data);
```
```text
HideMyAss
```
## Applications

 * [Restful API](applications/api.php) ([demo](https://api.linkedit.ml)) supporting Cloudflare
 * `algo`  - Algorithms which are illustrated upside on the table
 *  `secret_key`
 *  `private_key`
 *  `action` - decrypt | encrypt
 *  `text`
 
 ```json
 {
    "request": {
        "date": "2019-10-05 00:51:13",
        "timezone": "Asia\/Baku",
        "location": null,
        "ip": null,
        "ray": null,
        "visitor": null,
        "cookie": [],
        "method": "GET",
        "user_agent": "Mozilla\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\/537.36 (KHTML, like Gecko) Chrome\/76.0.3809.132 Safari\/537.36",
        "id": null,
        "time": 1570222273
    },
    "response": {
        "var": {
            "algo": "bf",
            "action": "encrypt",
            "text": "HideMyAss",
            "secret_key": "secret-key",
            "private_key": "private-key",
            "consequence": "dDE3RHlZWmdRblMyOGY3TTJvd1I0UT09"
        },
        "information": {
            "status": "1",
            "message": "Success"
        },
        "execution_time": 0.892880916595459
    }
}
 ```
## Authors

* **Emin Muhammadi** - *Initial work* - [eminmuhammadi](https://github.com/eminmuhammadi)

See also the list of [contributors](https://github.com/eminmuhammadi/HideMyAss/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details
