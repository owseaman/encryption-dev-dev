<?php

define('IV_SIZE', openssl_cipher_iv_length('aes-128-cbc'));

function encrypt($key, $payload) {
    $iv = openssl_random_pseudo_bytes(IV_SIZE);
    $crypt = openssl_encrypt($payload, 'aes-128-cbc', $key, OPENSSL_RAW_DATA, $iv);
    $garble = base64_encode($iv . $crypt);
    return $garble;
}

function decrypt($key, $garble) {
    $combo = base64_decode($garble);
    $iv = substr($combo, 0, IV_SIZE);
    $crypt = substr($combo, IV_SIZE);
    $payload = openssl_decrypt($crypt, 'aes-128-cbc', $key, OPENSSL_RAW_DATA, $iv);
    return $payload;
}