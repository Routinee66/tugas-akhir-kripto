<?php

function vigenereEncrypt($plaintext, $key) {
    $result = '';
    $keyLength = strlen($key);

    for ($i = 0; $i < strlen($plaintext); $i++) {
        $char = $plaintext[$i];
        $keyChar = $key[$i % $keyLength];
        $result .= chr(((ord($char) + ord($keyChar)) % 256));
    }

    return $result;
}

function rc4($data, $key) {
    $s = [];
    for ($i = 0; $i < 256; $i++) {
        $s[$i] = $i;
    }

    $j = 0;
    $keyLength = strlen($key);

    for ($i = 0; $i < 256; $i++) {
        $j = ($j + $s[$i] + ord($key[$i % $keyLength])) % 256;
        $temp = $s[$i];
        $s[$i] = $s[$j];
        $s[$j] = $temp;
    }

    $i = 0;
    $j = 0;
    $result = '';

    for ($k = 0; $k < strlen($data); $k++) {
        $i = ($i + 1) % 256;
        $j = ($j + $s[$i]) % 256;
        $temp = $s[$i];
        $s[$i] = $s[$j];
        $s[$j] = $temp;

        $result .= chr(ord($data[$k]) ^ $s[($s[$i] + $s[$j]) % 256]);
    }

    return $result;
}

function enkripsi($plaintext, $key){
  $vigenereCiphertext = vigenereEncrypt($plaintext, $key);
  $super_cipher = rc4($vigenereCiphertext, $key);

  // return $super_cipher;
  return bin2hex($super_cipher);
  // echo "Plaintext: " . $plaintext . "<hr>";
}

?>
