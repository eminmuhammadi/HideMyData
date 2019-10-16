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

/**
 * Class HideMyAss
 * @property string secret
 * @property string public
 * @property string algo*@property false|int iv_num_byte
 * @property false|int iv_num_byte
 * @package eminmuhammadi\HideMyAss
 */
class HideMyAss
{

    /**
     * HideMyAss constructor.
     * @param $public - Public Key
     * @param $secret - Secret Key
     * @param string $algo - Type of Algorithm
     * @throws \Exception
     */
  function __construct($public, $secret, $algo)
  {
      /**
       *  md5() used for enlarge size of key
       *  sha1() used for differ public key from secret key
       */
    $this->secret  = md5($secret);
    $this->public  = md5(sha1($public));
    $this->algo    = $algo;

    if (!in_array($this->algo, openssl_get_cipher_methods(true)))
    {
        throw new \Exception("eminmuhammadi\HideMyAss\_constructor:: - unknown algorithm {$this->algo}");
    }

    $this->iv_num_byte = openssl_cipher_iv_length($this->algo);
  }

    /**
     * HideMyAss Hasher
     * @param $pkey - Public Key
     * @param $skey - Secret Key
     * @param $iv_num_byte - Length of cipher
     * @return array - hashed public key and secret key
     */
  public function hasher($pkey, $skey, $iv_num_byte)
  {
    $_pkey = hash('sha256', $pkey);
    $_skey = substr(hash('sha256', $skey), 0, $iv_num_byte);

    return ['hashed_pkey' => $_pkey, 'hashed_skey' => $_skey];
  }

    /**
     * @param $text - Input
     * @return false|string - Output
     * @throws \Exception
     */
  public function decrypt($text)
  {

    $HASHER = (new self($this->public, $this->secret, $this->algo))->hasher($this->public, $this->secret, $this->iv_num_byte);

    $data = openssl_decrypt(base64_decode($text), $this->algo, $HASHER['hashed_pkey'], 0, $HASHER['hashed_skey']);

    return $data;
  }

    /**
     * @param $text - Input
     * @return string - Output
     * @throws \Exception
     */
  public function encrypt($text)
  {
    $HASHER = (new self($this->public, $this->secret, $this->algo))->hasher($this->public, $this->secret, $this->iv_num_byte);

    $data = base64_encode(openssl_encrypt($text, $this->algo, $HASHER['hashed_pkey'], 0, $HASHER['hashed_skey']));

    return $data;
  }
}
