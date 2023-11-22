<?php

function vigenereDecrypt($ciphertext, $key) {
    $result = '';
    $keyLength = strlen($key);

    for ($i = 0; $i < strlen($ciphertext); $i++) {
        $char = $ciphertext[$i];
        $keyChar = $key[$i % $keyLength];
        $result .= chr((ord($char) - ord($keyChar) + 256) % 256);
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

// $key = 'debest'; // Ganti dengan panjang kunci yang sesuai
$super_cipher = hex2bin("2320556ee4c7b04a517bcf1a2932d2c761a94d7ceb5888ecc0599970c1b8a77d5a7773cc1f2db2b47d");
function dekripsi($super_cipher, $key){
  $vigenerePlaintext = rc4($super_cipher, $key);
  $plaintext = vigenereDecrypt($vigenerePlaintext, $key);

  return $plaintext;
  // echo "Plaintext: " . $plaintext . "<hr>";
}

$plaintext = dekripsi($super_cipher, 'debest');
echo $plaintext;
// echo hex2bin("2320556ee4c7b04a517bcf1a2932d2c761a94d7ceb5888ecc0599970c1b8a77d5a7773cc1f2db2b47d");
// echo "<hr>";
// $super_cipher = "4d463fc60dff3f03aa21f4a8fcc4c0ac097cb234c42140ddd1f7a48dbb76d0f1beaccc399d109c0ac5";

// Dekripsi
// $vigenerePlaintext = vigenereDecrypt($vigenereCiphertext, $key);
// $rc4Plaintext = rc4($vigenerePlaintext, $key);

// echo "Semi Plaintext: " . bin2hex($vigenerePlaintext) . "<hr>";

?>
