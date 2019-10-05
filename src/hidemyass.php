<?php 

/**
 *  @author Emin Muhammadi
 *  @license  MIT License
 *  @link https://github.com/eminmuhammadi/HideMyAss

* Copyright (c) 2019 Emin Muhammadi

* Permission is hereby granted, free of charge, to any person obtaining a copy* 
* of this software and associated documentation files (the "Software"), to deal
* in the Software without restriction, including without limitation the rights
* to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
* copies of the Software, and to permit persons to whom the Software is
* furnished to do so, subject to the following conditions:

* The above copyright notice and this permission notice shall be included in all
* copies or substantial portions of the Software.

* THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
* IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
* FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
* AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
* LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
* OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
* SOFTWARE.

*/

namespace eminmuhammadi\HideMyAss;

class HideMyAss
{
    
    function __construct($private,$secret,$algo)
    {
        $this->secret  = md5($secret);
        $this->private = md5(sha1($private)); 
        $this->algo    = $algo;
    }

    public function chiper($algo) 
    { 
        $_8byte=array("BF-CBC","BF-CFB","BF-OFB","bf-cbc","bf-cfb","bf-ofb","cast5-cbc","cast5-cfb","cast5-ofb","BF","CAST","CAST-cbc","bf","blowfish","cast","cast-cbc");
       
        $_16byte=array("AES-128-CBC","AES-128-CFB","AES-128-CFB1","AES-128-CFB8","AES-128-OFB","AES-192-CFB","AES-192-CFB1","AES-192-OFB","AES-256-CBC","AES-256-CFB","AES-256-CFB1","AES-256-CFB8","AES-256-OFB","aes-128-cbc","aes-128-cfb","aes-128-cfb1","aes-128-cfb8","aes-128-ofb","aes-192-cbc","aes-192-cfb","aes-192-cfb1","aes-192-cfb8","aes-192-ofb","aes-256-cbc","aes-256-cfb","aes-256-cfb1","aes-256-cfb8","aes-256-ofb","AES128","AES192","AES256","aes128","aes192","aes256");

        if(in_array($algo, $_8byte)) { 

            return '8'; 
        }

        else if(in_array($algo, $_16byte)) { 

            return '16'; 
        }

        else { 
            return '0'; 
        }
    }

    public function hasher($pkey,$skey,$chiper) 
    {
        $_pkey = hash('sha256', $pkey );
        $_skey = substr(hash('sha256',$skey), 0, $chiper);

        return ['hashed_pkey'=>$_pkey,'hashed_skey'=>$_skey];
    }

    public function decrypt($text) 
    { 

        $hasher = self::hasher($this->private,$this->secret,self::chiper($this->algo));

        $data = openssl_decrypt(base64_decode($text),$this->algo, $hasher['hashed_pkey'], 0, $hasher['hashed_skey']);

        return $data;
    }

    public function encrypt($text) 
    {
        $hasher = self::hasher($this->private,$this->secret,self::chiper($this->algo));

        $data = base64_encode(openssl_encrypt($text,$this->algo, $hasher['hashed_pkey'], 0, $hasher['hashed_skey']));

        return $data;
    }
}
