<?php
$data = "9d0fcf74214d87951bef3cf8b33a37f2f1a66cdbf2213089d16fe8eaadf00a5b";
$key = "customkey";
$method = "AES-256-CBC";


$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($method));
$encrypted = openssl_encrypt($data, $method, $key, 0, $iv);
$encrypted = base64_encode($iv.$encrypted);

echo "Encrypted: ".$encrypted."\n";

$en = $encrypted;

//$en = 'VKisvl0XR99vxr NeRuK9WUyNkxmTFVWb0pRY09HazlKb3VtcGdLTlJYakZnV0VLN290V2pyRFZsYU9BYTdNQ2gxMGpBYXVxQThyUkp4UkZwUU1JTm44NUhZUWFhZ3lMWXJSZ3hnK3dOckVTQWpZZTZuMmxKS2J6Sm5nPQ==';
$encrypted = base64_decode($en);
$iv = substr($encrypted, 0, openssl_cipher_iv_length($method));
$encrypted = substr($encrypted, openssl_cipher_iv_length($method));
$decrypted = openssl_decrypt($encrypted, $method, $key, 0, $iv);
echo "Decrypted: ".$decrypted."\n";